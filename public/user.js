const { createApp, defineComponent } = Vue;

const UserComponent = defineComponent({
    props: ['userid'],
    template: `<div>User ID: {{ userid }}</div>`,
    mounted() {
        console.log('User ID:', this.userid);
    }
});

createApp({
    components: {
        'user': UserComponent
    }
}).mount('#app');
