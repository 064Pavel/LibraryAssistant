<template>
    <nav class="navbar bg-success">
        <div class="container-fluid justify-content-around">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Author" aria-label="Search" id="input-author">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Title" aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
        </div>
    </nav>
</template>

<script>
export default {
    name: "FilterComponent"
}
</script>

<style scoped>

</style>
