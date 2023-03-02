<template>
    <div class="content mx-3">
        <div class="d-flex justify-content-center">
            <div class="content-door">
                <h2>Конфигурация двери</h2>
                <div class="d-flex justify-content-between"> 
                    <div class="d-flex justify-content-around me-5">
                        <div>
                            <img src="img/door.png" width="230" height="480" wi alt="Вид снаружи">
                            <p class="text-center fs-5">Вид снаружи</p>
                        </div>
                        <div class="ms-3">
                            <img src="img/door.png" class="door-right" width="230" height="480" alt="Вид изнутри">
                            <p class="text-center fs-5">Вид изнутри</p>
                        </div>
                    </div>
                    <div class="content-config ms-5 ">
                        <h3 class="mb-3">Параметры:</h3>
                        <div class="config-content">
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Цвет покраски</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Цвет пленки</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Цвет ручки</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Ширина</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Высота</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Открывание</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-between">
                                <label  class="form-label">Выберите автора</label>
                                <select class="form-select ms-5" height="400px" >
                                    <option>Красный</option>
                                </select>
                            </div>                     
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
            first: false
        } 
    }
}
</script>

<style>
</style>