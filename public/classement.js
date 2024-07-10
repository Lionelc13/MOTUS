const { createApp } = Vue;

const vm = createApp({
    data() {
        return {
            classement: []
        };
    },

    mounted() {
        this.chargerClassement();
    },

    methods: {
        chargerClassement() {
            axios
                .get("/api/classement")
                .then((res) => {
                    this.classement = res.data;
                    console.log('Résultats de la requete');
                    console.log(this.classement);
                    
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    }
}).mount('#app');
