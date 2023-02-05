<template>

    <div class="d-flex flex-sm-wrap justify-content-center">

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


    <div class="d-flex flex-sm-wrap justify-content-center mt-5 mb-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <li v-if="pagination.current_page !== 1" class="page-item">
                    <a @click="getBooks(pagination.current_page - 1)" class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <li v-for="link in pagination.links" class="page-item">
                    <template
                        v-if="Number(link.label)
                         && Number(link.label) >= pagination.current_page-2
                         && Number(link.label) <= pagination.current_page+2">
                        <a @click.prevent="getBooks(link.label)" class="page-link" href="#">{{ link.label }}</a>
                    </template>
                </li>

                <li v-if="pagination.current_page !== pagination.last_page" class="page-item">
                    <a @click="getBooks(pagination.current_page + 1)" class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</template>

<script>
export default {
    name: "BooksComponent",


    data() {
        return {
            books: [],
            page: 1,
            pagination: []
        }
    },

    mounted() {
        this.getBooks(this.page)
    },

    methods: {
        getBooks(page) {

            axios.get(`/api/books?page=${page}`)
                .then(response => {
                    this.books = response.data.data
                    this.pagination = response.data.meta
                })
        },

    },


}
</script>

<style scoped>

</style>
