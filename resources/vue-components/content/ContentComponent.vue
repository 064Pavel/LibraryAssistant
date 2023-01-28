<template>
    <div class="container-sm">
        <router-view :key="$route.fullPath"></router-view>
    </div>
</template>

<script>
export default {
    name: "HeaderComponent"
}
</script>

<style scoped>

</style>
