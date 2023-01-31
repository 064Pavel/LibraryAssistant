<template>
    <FilterComponent></FilterComponent>
    <IndexComponent></IndexComponent>
</template>

<script>
import FilterComponent from "./FilterComponent.vue";
import IndexComponent from "./IndexComponent.vue";

export default {
    name: "BooksComponent",

    components:{
        FilterComponent,
        IndexComponent
    }
}
</script>

<style scoped>

</style>
