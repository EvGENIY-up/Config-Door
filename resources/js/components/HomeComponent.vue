<template>
    <div class="content mx-3">
        <div class="d-flex justify-content-center">
            <div class="content-door">
                <h2>Конфигурация двери</h2>
                <div class="d-flex justify-content-between"> 
                    <div class="d-flex justify-content-around me-5">
                        <div>
                            <img src="img/door.png" class="door-left"
                                :class="{'door-left-active': rightOpening, 'red': isRed, 'blue': isBlue, 'green': isGreen, 'yellow': isYellow}"
                                width="230" height="480" alt="Вид снаружи">
                            <p class="text-center fs-5">Вид снаружи</p>
                        </div>
                        <div class="ms-3">
                            <img src="img/door.png" class="door-right"
                                :class="{'door-right-active': rightOpening, 'red': isRed, 'blue': isBlue, 'green': isGreen, 'yellow': isYellow}"
                                width="230" height="480" alt="Вид изнутри">
                            <p class="text-center fs-5">Вид изнутри</p>
                        </div>
                    </div>
                    <div class="content-config ms-5 ">
                        <h3 class="mb-3">Параметры:</h3>
                        <div class="config-content">
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Цвет покраски</label>
                                <select @change="changeColorDoor" v-model="color_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" color in colors" :value = color.id>{{color.name}}</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Цвет пленки</label>
                                <select v-model="tape_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" tape in tapes" :value = tape.id>{{tape.name}}</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Цвет ручки</label>
                                <select v-model="handle_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" handle in handles" :value = handle.id>{{handle.name}}</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Ширина</label>
                                <select v-model="width_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" width in widths" :value = width.id>{{width.name}} мм</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Высота</label>
                                <select v-model="height_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" height in heights" :value = height.id>{{height.name}} мм</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Открывание</label>
                                <select @change="changeOpeningDoor" v-model="open_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" open in opens" :value = open.id>{{open.name}}</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Выберите аксессуар(ы)</label>
                                <select v-model="decoration_id" class="form-select ms-5" height="400px" >
                                    <option v-for=" decoration in decorations" :value = decoration.id>{{decoration.name}}</option>
                                </select>
                            </div>
                            <div v-if="chooseAllParams()" class="price-block mt-5 d-flex">
                                <h3 class="mt-2">Цена двери:</h3>
                                <p class="fs-5 ms-2 mt-2 price">{{showPrice()}}р.</p>
                                <button @click="createOrder()" type="button" class="btn btn-warning ms-4"><div v-if="loading" class="spinner-border" role="status"></div><template v-else> Отправить заказ</template></button>
                            </div>
                             <p class="fs-5 d-flex justify-content-center mt-2" :class="{'text-danger': hasError, 'text-success': noError}">{{message}}</p>                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomeComponent",
    props: [
        'colors',
        'tapes',
        'handles',
        'widths',
        'heights',
        'opens',
        'decorations',
    ],
    data() {
        return {
            color_id: false,
            tape_id: false,
            handle_id: false,
            width_id: false,
            height_id: false,
            open_id: false,
            decoration_id: false,
            blockSearch: false,
            price: '',
            message: '',
            noError: true,
            hasError: false,
            loading: false,
            rightOpening: true,
            isRed: false,
            isBlue: false,
            isGreen: false,
            isYellow: false,
        } 
    },
    methods: {
        chooseAllParams() {
            if(this.color_id && this.tape_id && this.handle_id && this.width_id && this.height_id && this.open_id && this.decoration_id) {
                return true
            }
        },
        showPrice() {
            this.price = this.colors[this.color_id - 1].price + this.tapes[this.tape_id - 1].price + 
            this.handles[this.handle_id - 1].price + this.widths[this.width_id - 1].price + 
            this.heights[this.height_id - 1].price + this.opens[this.open_id - 1].price + 
            this.decorations[this.decoration_id - 1].price

            return this.price
        },
        createOrder() {
            this.loading = true
            this.message = ''
            axios.post('/create', {
                color_id: this.color_id,
                tape_id: this.tape_id,
                handle_id: this.handle_id,
                width_id: this.width_id,
                height_id: this.height_id,
                open_id: this.open_id,
                decoration_id: this.decoration_id,
            }).then(res => {
                if (res.status === 200) {
                    this.noError = true
                    this.hasError = false
                    this.message = 'Вы успешно отправили заказ'
                }
            }).catch(error => {
                if (error.response) {
                    this.noError = false
                    this.hasError = true
                    this.message = error.response.data.message;
                    console.log(error.response.data.message);
                }
                else {
                    this.noError = false
                    this.hasError = true
                    this.message = 'Ошибка на стороне сервера';
                }
            }).finally(res => {
                this.loading = false
            })
        },
        changeOpeningDoor(event) {
            Number(event.target.value) == 2 ? this.rightOpening = false : this.rightOpening = true
        },
        changeColorDoor(event) {
            switch (event.target.value) {
                case '1':
                    this.isRed = true;
                    this.isBlue = false;
                    this.isGreen = false;
                    this.isYellow = false;
                    break;
                case '2':
                    this.isRed = false;
                    this.isBlue = true;
                    this.isGreen = false;
                    this.isYellow = false;
                    break;
                case '3':
                    this.isRed = false;
                    this.isBlue = false;
                    this.isGreen = true;
                    this.isYellow = false;
                    break;
                case '4':
                    this.isRed = false;
                    this.isBlue = false;
                    this.isGreen = false;
                    this.isYellow = true;
                    break;
                default:
                    break;
            }
        },
    },
}
</script>

<style>
</style>