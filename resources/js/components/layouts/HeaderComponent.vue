<template>
<div class="header-content d-flex justify-content-between m-4 border-bottom">
    <div @click="goToLink" class="left-content d-flex cu-p">
        <img src="img/door-icon.svg" alt="Иконка двери" class="left-content__img cu-p">
        <div class="name-content">
            <h2 class="site-title">Сonfig Doors</h2>
            <p class="site-decription">Лучший конфигуратор дверей</p>
        </div>
    </div> 
    <div class="right-content d-flex">
        <p v-if="user" class="login-name">{{user}}</p>
        <template v-else>
            <button type="button" class="btn btn-primary mt-2 in-button" data-bs-toggle="modal" data-bs-target="#login">Вход</button>
            <button type="button" class="btn btn-secondary mt-2 reg-button" data-bs-toggle="modal" data-bs-target="#register">Регистрация</button>
        </template>
        <button v-if="user" type="button" class="btn btn-warning mt-2 out-button" data-bs-toggle="modal" data-bs-target="#logout">Выход</button>
    </div>
    <Login/>
    <Logout />
    <Register/>
</div>
</template>

<script>
import Login from '../auth/Login.vue'
import Logout from '../auth/Logout.vue'
import Register from '../auth/Register.vue'
export default {
    name: "HeaderComponent",
    props: [
        'user',
    ],
    components: {
        Login,
        Logout,
        Register,
    },
    methods: {
        goToLink(){
            location.replace('/')
        },
    },
}
</script>

<style scoped>
</style>