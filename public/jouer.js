const { createApp, defineComponent } = Vue;

// Définir le composant UserComponent
const UserComponent = defineComponent({
    props: ['userid'],
    template: `{{ userid }}`,
    
    mounted() {
        // console.log('User ID:', this.userid);
        this.$emit('userid-update', this.userid); // Émet l'événement pour mettre à jour userid dans le composant parent
    }
});

// Créer l'application Vue et enregistrer le composant UserComponent
const vm = createApp({
    components: {
        'user-component': UserComponent
    },
    data() {
        return {
            motUtilisateur: '',
            motDecomposes: [],
            motATrouver: 'TESTE',
            motATrouverDecomposes: [],
            listeMots: [],
            essai: 0,
            level: 1,
            grilleJoueur: [],
            score: '0',
            userid: null,
            showUserComponent:false,
            resultat: {
                titre:'aucun',
                message:'aucun'
            }
        };
    },
    mounted() {
        this.chargerListeMots();
    },
    methods: {
        updateUserid(newUserid) {
            this.userid = newUserid;
            this.chargerScore();
        },
        chargerListeMots() {
            axios
                .get("/api/liste?level=" + this.level + "&user=" + this.userid)
                .then((res) => {
                    this.essai = 0;
                    this.motATrouver = res.data[(Math.floor(Math.random() * res.data.length))].name_word;
                    this.decoupeMotATrouver();
                    this.initGrilleJoueur();
                })
                .catch((err) => {
                    console.error(err);
                });
        },

        chargerScore() {
            axios
                .get("/api/score?user=" + this.userid)
                .then((res) => {
                    this.score = res.data[0].score;

                })
                .catch((err) => {
                    console.error(err);
                });
        },

        enregistrerMot() {
            axios
                .get("/api/enregistrer?word="+ this.motATrouver+ "&user=" + this.userid)
                .then((res) => {
                    this.chargerScore();

                })
                .catch((err) => {
                    console.error(err);
                });
        },

        initGrilleJoueur() {
            this.grilleJoueur = [];
            // Représentation de la grille avec le nombre d'essais (vertical)
            for (let i = 0; i < 6; i++) {
                let nombreDeLettres = parseInt(this.level) + 5;
                // Représentation du nombre de lettres
                for (let j = 0; j < nombreDeLettres; j++) {
                    let obj = {};
                    obj.id = i.toString() + j.toString();
                    if (i == 0) {
                        obj.lettre = '.';
                    } else {
                        obj.lettre = ' ';
                    }
                    if (i == 0 && j == 0) {
                        obj.lettre = this.motATrouverDecomposes[0];
                    }
                    obj.place = 'Aucun';
                    this.grilleJoueur.push(obj);
                }
            }
        },

        decoupeMot() {
            this.motDecomposes = [];
            for (let i = 0; i < this.motUtilisateur.length; i++) {
                this.motDecomposes.push(this.motUtilisateur.substring(i, i + 1).toUpperCase());
            }
        },

        decoupeMotATrouver() {
            this.motATrouverDecomposes = [];
            for (let i = 0; i < this.motATrouver.length; i++) {
                this.motATrouverDecomposes.push(this.motATrouver.substring(i, i + 1));
            }
        },

        ajouterMot() {
            this.decoupeMotATrouver();
            this.verifieMot();
            this.essai++;
            this.motUtilisateur = '';
        },

        chargerGrille() {
            this.chargerListeMots();
        },

        messagePartie() {
            var modal = new bootstrap.Modal(document.getElementById('resultat-partie'));
            
            modal.show();
        },

        verifieMot() {
            this.decoupeMot();
            let stringEssai = this.essai.toString();
            let nbOk = 0;
            let indexDansFiltered = '';
            let filteredLettres = Array.from(this.motATrouverDecomposes); // Crée une copie distincte
            let objVerif = {};
            for (let i = 0; i < this.motUtilisateur.length; i++) {
                let stringI = i.toString();
                objVerif.id = stringEssai + stringI;
                objVerif.lettre = this.motDecomposes[i];
                objVerif.place = 'Aucun';
                if (this.motDecomposes[i] === this.motATrouverDecomposes[i]) {
                    objVerif.place = 'Ok';
                    nbOk++;
                    indexDansFiltered = filteredLettres.indexOf(this.motDecomposes[i]);
                    filteredLettres.splice(indexDansFiltered, 1);
                }
                this.elementExist(objVerif);
            }
            for (let i = 0; i < this.motUtilisateur.length; i++) {
                objVerif.lettre = this.motDecomposes[i];
                objVerif.id = stringEssai + i.toString();
                this.getElement(objVerif);
                if (objVerif.place !== "Ok") {
                    if (filteredLettres.includes(objVerif.lettre)) {
                        indexDansFiltered = filteredLettres.indexOf(this.motDecomposes[i]);
                        filteredLettres.splice(indexDansFiltered, 1);
                        objVerif.place = "Erreur";
                        this.elementExist(objVerif);
                    } else {
                        objVerif.place = "No";
                        this.elementExist(objVerif);
                    }
                }
            }
            this.motDecomposes = [];
            if (nbOk == parseInt(this.level) + 5) {
                this.resultat.titre = 'Félicitation!',
                this.resultat.message = 'Vous avez trouvé le mot ' + this.motATrouver;
                this.messagePartie();
                this.chargerListeMots();
                this.enregistrerMot();
            } else if (this.essai == 5) {
                this.resultat.titre = 'Perdu!',
                this.resultat.message = 'Vous n\'avez pas réussi à trouver le mot ' + this.motATrouver;
                this.messagePartie();
                this.chargerListeMots();
            }
        },

        elementExist(objVerif) {
            const existingElement = this.grilleJoueur.find(el => el.id === objVerif.id);
            if (existingElement) {
                existingElement.lettre = objVerif.lettre;
                existingElement.place = objVerif.place;
            }
        },

        getElement(objVerif) {
            const existingElement = this.grilleJoueur.find(el => el.id === objVerif.id);
            if (existingElement) {
                objVerif.place = existingElement.place;
                objVerif.lettre = existingElement.lettre;
                return objVerif;
            }
        }
    }
}).mount('#app');
