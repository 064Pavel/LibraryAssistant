<template>
    <div class="d-flex flex-sm-wrap justify-content-center">

        <div v-for="book in books" class="card m-4" style="width: 18rem;">
            <img src="https://russiangoods.ee/upload/iblock/f12/f12985e72dd74042ea036768815796c9.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Title: {{book.title}}</h5>
                <h5 class="card-title">Author: {{book.author.name}}</h5>
                <h5 class="card-title">Year: {{book.year}}</h5>

                <h5 v-if="book.amount > 0" class="card-title mb-3">Amount: {{book.amount}}</h5>
                <h5 v-if="book.amount === 0" class="card-title mb-3">Amount: <span class="text-danger">out of stock</span></h5>

                <p class="card-text">{{book.description.slice(0, 120) }}...</p>
                <router-link :to="{ name: 'books.show', params: { id: book.id }}">
                    <span href="#" class="btn btn-primary">More</span>
                </router-link>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "BooksComponent",

    data(){
        return{
            books: []
        }
    },

    mounted() {
        this.getBooks()
    },

    methods:{
        getBooks(){
            axios.get('/api/books')
                .then(response => {
                    this.books = response.data.data
                    console.log(response.data.data);
                })
        }
    },

    filters: {
        truncate: function (text, length, suffix) {
            if (text.length > length) {
                return text.substring(0, length) + suffix;
            } else {
                return text;
            }
        },
    }

}
</script>

<style scoped>

</style>
