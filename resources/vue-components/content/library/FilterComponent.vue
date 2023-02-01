<template>
    <nav class="navbar bg-success">
        <div class="container-fluid justify-content-around">

            <div class="d-flex w-25" role="search">
                <select v-model="author_id" class="form-select me-2" type="search" aria-label="Search" id="input-author">
                    <option value="" disabled>Author</option>
                    <option :value="author.author_id" v-for="author in authors">{{author.author.name}}</option>
                </select>

                <router-link :to="{name: 'books.by.author', params:{author: author_id}}" class="btn btn-light">Search</router-link>


            </div>


            <div class="d-flex w-25" role="search">
                <input class="form-control me-2" type="search" placeholder="Title" aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </div>
        </div>
    </nav>
</template>

<script>

export default {
    name: "FilterComponent",

    data() {
        return {
            author_id: '',
            authors: []
        }
    },

    mounted() {
        this.get_authors()
    },

    methods:{
        get_authors(){
            axios.get('/api/get_authors')
                .then(response => {
                    this.authors = response.data.data
                    console.log(this.author_id);

                    // response.data.data.forEach(el => console.log(el.author.name))
                    // console.log('res:'+ response.data.data.id);
                    // console.log('res:'+response.data.data.author);
                })
        },

    }
}
</script>

<style scoped>

</style>
