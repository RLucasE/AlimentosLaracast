<script setup>



import { ref } from 'vue';
import axios from "@/lib/Axios"

const form = ref({
    email: null,
    password: null
});

async function handleSubmit() {


    await axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie");


    // try {
    //     await axios.post("/login", {
    //         "email": "testsanctum3@gmail.com",
    //         "password": 12345567
    //     })
    // } catch (error) {

    // }

}


</script>

<template>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form @submit.prevent="handleSubmit">
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" v-model="form.email" required />
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" v-model="password" required />
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p v-if="error" class="error">{{ error }}</p>
    </div>
</template>