<template>
   <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerTitle">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="registerLogin" class="form-label">Login пользователя (имя)</label>
                        <input v-model="name" type="email" class="form-control" id="registerLogin" aria-describedby="registerLogin">
                        <div class="form-text">Имя должно быть уникальным 6-15 символов.</div>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email адресс (почта)</label>
                        <input v-model="email" type="email" class="form-control" id="registerEmail" aria-describedby="registerEmail">
                        <div class="form-text">Обратите внимание. Мы никогда не передадим вашу электронную почту кому-либо еще.</div>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Пароль</label>
                        <input v-model="password" type="password" class="form-control" id="registerPassword">
                         <div class="form-text">Пароль должен быть 8-20 cимволов.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                    <button ref="closeButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name: "Register",
    data() {
        return {
            name: null,
            email: null,
            password: null,
        }
    },
    methods: {
        createUser() {
            axios.post('/register', {
                name: this.name,
                email: this.email,
                password: this.password,
            }).then(res => {
                if (res.status === 200) {
                    location.replace('/') 
                }
            }).catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>
<style>
    
</style>