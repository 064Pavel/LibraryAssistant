<template>
    <FilterComponent></FilterComponent>
    <BooksComponent></BooksComponent>
</template>

<script>
import FilterComponent from "./FilterComponent.vue";
import BooksComponent from "./BooksComponent.vue";


export default {
    name: "IndexComponent",

    components:{
        FilterComponent,
        BooksComponent
    }
}
</script>

<style scoped>

</style>
