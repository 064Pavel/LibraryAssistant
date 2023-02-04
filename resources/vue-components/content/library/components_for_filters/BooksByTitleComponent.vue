<template>

    <div class="d-flex flex-sm-wrap justify-content-center">

        <div v-if="books.length > 0" class="d-flex flex-sm-wrap justify-content-center">
            <div v-for="book in books" class="card m-4" style="width: 18rem;">
                <img src="https://russiangoods.ee/upload/iblock/f12/f12985e72dd74042ea036768815796c9.jpg"
                     class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Title: {{ book.title }}</h5>
                    <h5 class="card-title">Author: {{ book.author.name }}</h5>
                    <h5 class="card-title">Year: {{ book.year }}</h5>

                    <h5 v-if="book.amount > 0" class="card-title mb-3">Amount: {{ book.amount }}</h5>
                    <h5 v-if="book.amount === 0" class="card-title mb-3">Amount: <span
                        class="text-danger">out of stock</span></h5>

                    <p class="card-text">{{ book.description.slice(0, 120) }}...</p>
                    <router-link :to="{ name: 'books.show', params: { id: book.id }}">
                        <span href="#" class="btn btn-primary">More</span>
                    </router-link>
                </div>
            </div>
        </div>

        <div v-if="books.length === 0" class="mt-5">
            <h3 class="text-danger">Unfortunately, we could not find a book with the title "{{title}}"</h3>
        </div>


    </div>
</template>

<script>
export default {
    name: "BooksByTitleComponent",

    props: ['title'],

    data() {
        return {
            books: []
        }
    },

    mounted() {
        if (this.title) {
            this.booksByTitle(this.title)

        }
    },

    methods: {
        booksByTitle(title) {
            axios.get(`/api/books/by/title/${title}`)
                .then(response => {
                    this.books = response.data.data
                })
        }
    }
}
</script>

<style scoped>

</style>
