<template>
    <header class="modal-header">
        <h2>Register</h2>
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
                <label for="exampleInputLogin1" class="form-label">Login </label>
                <input v-model="name" type="text" class="form-control" id="exampleInputLogin1"
                       aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input v-model="email" type="email" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputConfirmPassword1" class="form-label">Confirm password</label>
                <input v-model="password_confirmation" type="password" class="form-control"
                       id="exampleInputConfirmPassword1">
            </div>

            <div class="mb-3"><span class="text-danger">*</span>All fields are required to be filled in</div>
            <div class="mb-3 form-check">

                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div v-if="errors.length >= 1" class="mb-3">
                <template v-for="error in errors">
                    <span class="text-danger">{{ error }}</span><br>
                </template>
            </div>
            <button @click="register" type="submit" class="btn btn-success">Sign Up</button>
        </div>

    </section>
</template>

<script>
import router from "../../../js/router";

export default {
    name: "SignupComponent",

    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            role_id: 1,

            checkMeOut: '',

            errors: []
        }
    },

    methods: {
        register() {
            if (this.checkMeOut != null) {
                if ((this.email.length !==null && this.password.length >= 8) && this.password === this.password_confirmation) {
                    axios.get('/sanctum/csrf-cookie')
                        .then(response => {

                            console.log(this.name, this.email, this.password, this.password_confirmation, this.role_id);
                            axios.post('/register', {
                                name: this.name,
                                email: this.email,
                                password: this.password,
                                password_confirmation: this.password_confirmation,
                                role_id: this.role_id
                            })
                                .then(response => {
                                    localStorage.setItem('x_xsrf_token', response.config.headers['X-XSRF-TOKEN'])
                                    router.push({name: 'books.index'})
                                })
                        }).catch(response => {
                        console.error('ERROR')
                        this.errors.push('An incorrectly entered email address or password.')

                    })
                } else this.validation()

            } else this.errors.push('Confirm by clicking on the "??heck me out" button')
        },

        validation() {
            if (this.email.length < 1 || this.password.length < 1) {
                this.errors.push('Fields should not be empty.')
            }
            if (this.password.length < 8) {
                this.errors.push('The password must be at least 8 characters long.')
            }
            if (this.password !== this.password_confirmation) {
                this.errors.push('Passwords don\'t match')
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

.modal-header-info {
    display: flex;
    flex-direction: column;
    text-align: left;
}

.modal-body {
    position: relative;
    padding: 20px 10px;
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
