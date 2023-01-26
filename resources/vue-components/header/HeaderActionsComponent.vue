<template>
    <div v-if="!token" class="d-flex">
        <div><router-link :to="{name: 'auth'}"><button class="btn btn-success ms-4">Sign In</button></router-link></div>
    </div>
    <div v-if="token">
        <div><button class="btn btn-danger ms-4">Sign Out</button></div>
    </div>
</template>

<script>
export default {
    name: "HeaderActionsComponent",

    data(){
        return{
            token: false
        }
    }
}
</script>

<style scoped>
     button router-link{
         text-decoration: none;
         color: white;
     }
</style>
