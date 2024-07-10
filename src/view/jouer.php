<?php
$myTitle = 'jeu motus';
$myDescription='Jeu Motus';
$myEntete = 'MOTUS';
require "header.php";
?>
        <div class="affichage" id="app">
            <div v-show="showUserComponent">
                <user-component :userid="<?php echo $_SESSION['id_user']; ?>"  @userid-update="updateUserid"></user-component>
            </div>
            <div class="menuGrille">
                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold" id="mot-utilisateur">Entrez un mot : </span>
                    <input id="mot-utilisateur" type="text" class="form-control" @change="ajouterMot()" v-model="motUtilisateur" pattern="[a-zA-Z]" placeholder="Mot sans accent uniquement!"  style="font-style:italic" aria-label="mot-utilisateur" aria-describedby="mot-utilisateur">
                </div>
                <div class="btn-level">
                    <label for="level">Difficulté : </label>
                    <select id="level" v-model="level" @change="chargerListeMots()" class="form-select">
                        <option value="1">Facile</option>
                        <option value="2">Intermédiaire</option>
                        <option value="3">Difficile</option>
                    </select>
                    <div class="boule">
                        <p class="score">Score:</p>
                    </div>
                    <div class="boule">
                        <p class="score">{{ score }}</p>
                    </div>
                </div>  
            </div>
            <div class="btnNouveau">
                <button class="btn btnNouveau  btn-primary" v-on:click="chargerGrille()">Charger un nouvelle grille!</button>
            </div>
            <div>
                <table class="grille">
                    <tbody>
                        <tr >
                            <td  v-for="obj in grilleJoueur.filter(obj => (obj.id < 10))" :id="obj.id" :class="obj.place">{{ obj.lettre }}</td>
                        </tr>
                        <tr >
                            <td v-for="obj in grilleJoueur.filter(obj => (obj.id > 9) && (obj.id < 20))" :id="obj.id" :class="obj.place">{{ obj.lettre }}</td>
                        </tr>
                        <tr >
                            <td v-for="obj in grilleJoueur.filter(obj => (obj.id > 19) && (obj.id < 30))" :id="obj.id" :class="obj.place">{{ obj.lettre }}</td>
                        </tr>
                        <tr >
                            <td v-for="obj in grilleJoueur.filter(obj => (obj.id > 29) && (obj.id < 40))" :id="obj.id" :class="obj.place">{{ obj.lettre }}</td>
                        </tr>
                        <tr >
                            <td v-for="obj in grilleJoueur.filter(obj => (obj.id > 39) && (obj.id < 50))" :id="obj.id" :class="obj.place">{{ obj.lettre }}</td>
                        </tr>
                        <tr >
                            <td v-for="obj in grilleJoueur.filter(obj => (obj.id > 49) && (obj.id < 60))" :id="obj.id" :class="obj.place">{{ obj.lettre }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        


            <!-- Button trigger modal
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
                Launch demo modal 
                </button>-->
            <!-- Popup de réussite ou de défaite -->
            <div class="modal" tabindex="-1" id="resultat-partie">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ resultat.titre }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ resultat.message }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

        <script this.$session.start()></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../../public/jouer.js"></script>
    </body>
</html>
