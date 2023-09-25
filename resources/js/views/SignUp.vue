<template>
    <div class="registration-form">
        <h2>Регистрация</h2>
        <form @submit.prevent="registerUser">
            <div class="form-group">
                <label for="name">Логин</label>
                <input type="text" id="login" v-model="formData.name" required>
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" id="email" v-model="formData.email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" v-model="formData.password" required>
            </div>
            <button type="submit">Регистрация</button>
        </form>
        <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
    </div>
</template>

<script>
export default {
    name: "SignUp",
    data() {
        return {
            formData: {
                name: "",
                email: "",
                password: ""
            },
            errorMessage: ""
        };
    },
    methods: {
        registerUser() {
            // Отправка данных на Laravel контроллер
            axios
                .post("/api/register", this.formData)
                .then(response => {
                    // Обработка успешного ответа от сервера
                    console.log("Пользователь успешно зарегистрирован!");
                    // Очистка формы
                    this.formData.name = "";
                    this.formData.email = "";
                    this.formData.password = "";
                })
                .catch(error => {
                    // Обработка ошибок и установка сообщения об ошибке
                    if (error.response && error.response.data && error.response.data.error) {
                        this.errorMessage = error.response.data.error;
                    } else {
                        this.errorMessage = "Произошла ошибка при регистрации.";
                    }
                });
        }
    }
}
</script>

<style scoped>
.error-message {
    color: red;
    margin-top: 10px;
}
.registration-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Чтобы форма занимала всю высоту экрана */
}

form {
    width: 300px; /* Ширина формы */
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Эффект тени */
    padding: 20px;
    border-radius: 8px; /* Закругленные углы */
    background-color: #fff; /* Фон формы */
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: box-shadow 0.2s; /* Анимация тени при фокусе */
}

input:focus {
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.2); /* Тень при фокусе */
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
</style>
