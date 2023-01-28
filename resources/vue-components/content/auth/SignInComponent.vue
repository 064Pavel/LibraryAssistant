<template>
    <header class="modal-header">
        <h2>Log In</h2>
        <router-link :to="{name: 'homepage'}">
            <button class="btn-close text-black">
                <span>x</span>
            </button>
        </router-link>

    </header>

    <section class="d-flex">
        <div class="img"><img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                              class="img-fluid" alt="Phone image"></div>
        <div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input v-model="checkMeOut" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button @click="login" type="submit" class="btn btn-primary">Sign In</button>
        </div>
    </section>
</template>

<script>
import router from "../../../js/router";

export default {
    name: "SignInComponent",

    data() {
        return {
            email: '',
            password: '',
            checkMeOut: null,
        }
    },


    methods: {
        login() {
            if (this.checkMeOut !== null) {
                axios.get('/sanctum/csrf-cookie')
                    .then(response => {
                        console.log(this.email, this.password);
                        axios.post('/login', {email: this.email, password: this.password})
                            .then(response => {
                                localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
                                router.push({name: 'library'})

                            })
                            .catch(response => {
                                console.log(response.response);
                            })

                    })
            }
        }
    }
}
</script>

<style scoped>
.modal-header {
    padding: 15px;
    display: flex;
}

.modal-header {
    border-bottom: 1px solid #eeeeee;
    justify-content: space-between;
}

.btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
}

.img {
    margin: 20px;
    width: 400px;
    height: 300px;
}
</style>
