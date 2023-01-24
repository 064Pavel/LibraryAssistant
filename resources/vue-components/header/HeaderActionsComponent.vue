<template>
    <div v-if="!token" class="d-flex">
        <div><button class="btn btn-primary ms-4">Sign In</button></div>
        <div><button class="btn btn-success ms-4">Sign Up</button></div>
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

</style>
