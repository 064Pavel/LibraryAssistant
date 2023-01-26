<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal">

                <button v-if="!changeModalContent" @click="changeModalWindowContent" class="btn btn-primary">Register
                </button>

                <button v-if="changeModalContent" @click="changeModalWindowContent" class="btn btn-success">Log In
                </button>


                <div v-if="!changeModalContent">
                    <SignInComponent></SignInComponent>
                </div>

                <div v-if="changeModalContent">
                    <SignUpComponent></SignUpComponent>
                </div>

            </div>
        </div>
    </transition>
</template>

<script>

import SignInComponent from "./SignInComponent.vue";
import SignUpComponent from "./SignUpComponent.vue";

export default {
    name: "ModalWindow",

    components: {
        SignInComponent,
        SignUpComponent
    },

    data() {
        return {
            changeModalContent: false
        }
    },

    methods: {
        changeModalWindowContent() {
            this.changeModalContent = !this.changeModalContent
        }
    }

}
</script>

<style scoped>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 800px;
    height: 700px;
}


.link-edit button {
    background-color: lightseagreen;
    width: 120px;
    height: 30px;
    border: none;
    font-size: 24px;
}

.modal-fade-enter,
.modal-fade-leave-active {
    opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity .5s ease
}
</style>
