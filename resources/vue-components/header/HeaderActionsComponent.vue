<template>

    <div v-if="!token" class="d-flex">
        <div><router-link :to="{name: 'auth'}"><button class="btn btn-success ms-4">Sign In</button></router-link></div>
    </div>

    <div v-if="token">
        <div><button @click="signOut" class="btn btn-danger ms-4">Sign Out</button></div>
    </div>

</template>

<script>
import router from "../../js/router";

export default {
    name: "HeaderActionsComponent",

    data(){
        return{
            token: null
        }
    },

    mounted() {
        this.getToken()
    },

    updated() {
        this.getToken()
    },

    methods:{
        getToken() {

            this.token = localStorage.getItem('x_xsrf_token')
            console.log(this.token);

        },

        signOut(){
            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('x_xsrf_token')
                    router.push({name: 'auth'})
                    this.getToken()
                })
        },
    },


}
</script>

<style scoped>
     button router-link{
         text-decoration: none;
         color: white;
     }
</style>
