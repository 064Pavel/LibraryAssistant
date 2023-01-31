<template>
    <div class="d-flex flex-sm-wrap justify-content-start">

        <div class="card m-4" style="width: 30rem;">
            <img src="https://russiangoods.ee/upload/iblock/f12/f12985e72dd74042ea036768815796c9.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Title: {{title}}</h5>
                <h5 class="card-title">Author: {{author}}</h5>
                <h5 class="card-title mb-5">Year: {{year}}</h5>
                <p class="card-text">{{description}}</p>
                <router-link :to="{ name: 'books.index'}">
                    <span href="#" class="btn btn-primary">Back</span>
                </router-link>
            </div>
        </div>

    </div>


</template>

<script>
export default {
    name: "ShowComponent",

    data(){
        return{
            title: '',
            author: '',
            year: '',
            description: ''
        }
    },

    props:['id'],

    mounted() {
        this.getBook(this.id)
    },

    methods:{
        getBook(id){
            console.log('working');
            console.log(id);
            axios.get(`/api/books/${id}`)
                .then(response => {
                    let data = response.data.data
                    this.title = data.title
                    this.author = data.author.name
                    this.year = data.year
                    this.description = data.description
                })
        }
    }
}
</script>

<style scoped>

</style>
