<template>
    <div class="d-flex mb-5 justify-content-center">
        <div>
            <div><h1>Library Assistant</h1></div>
        </div>
        <div class="ms-4 mt-1">
            <HeaderActionsComponent></HeaderActionsComponent>
        </div>
    </div>

</template>

<script>

import HeaderActionsComponent from "./HeaderActionsComponent.vue";
export default {
    name: "HeaderComponent",

    components: {HeaderActionsComponent},

}
</script>

<style scoped>

</style>
