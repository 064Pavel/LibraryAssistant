<template>
    <div>
        <HeaderComponent></HeaderComponent>
        <ContentComponent></ContentComponent>
    </div>
</template>

<script>

import HeaderComponent from "./header/HeaderComponent.vue";
import ContentComponent from "./content/ContentComponent.vue";
export default {
    name: "App",

    components:{
        HeaderComponent,
        ContentComponent
    }
}
</script>

<style scoped>

</style>
