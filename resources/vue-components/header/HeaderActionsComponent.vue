<template>

    <div v-if="!token" class="d-flex">
        <div><router-link :to="{name: 'auth'}"><button class="btn btn-success ms-4">Sign In</button></router-link></div>
    </div>

    <div v-if="token" class="d-flex">

        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu">
                <router-link :to="{name: 'books.by.user', params: {id: user_id}}"><li><button class="dropdown-item" type="button">My books</button></li></router-link>
            </ul>
        </div>

        <div><button @click="signOut" class="btn btn-danger ms-4">Sign Out</button></div>
    </div>

</template>

<script>
import router from "../../js/router";
import axios from "axios";
import data from "bootstrap/js/src/dom/data";

export default {
    name: "HeaderActionsComponent",

    data(){
        return{
            token: null,
            user_id: null
        }
    },

    mounted() {
        this.getToken()
        this.getUser()
    },

    updated() {
        this.getToken()
        this.getUser()

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

        getUser(){
            axios.get('/api/user')
                .then(response => {
                    this.user_id = response.data.id
                    console.log(response.data.id);
                })
        }
    },
}
</script>

<style scoped>
     button router-link{
         text-decoration: none;
         color: white;
     }
</style>
