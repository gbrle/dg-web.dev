<script setup lang="ts">
import { ref } from 'vue';

const name = ref('');
const hello = ref('');

const refreshHello = () => {
    if (name.value) {
        fetch(`/api/helloword/${name.value}`)
            .then(response => response.json())
            .then(result => hello.value = result);
    }
}
</script>

<template>
    <h1>Je suis le home</h1>
    <input type="text" v-model="name">
    <router-link to="/page/ascas">Go to About</router-link>
    <button @click="refreshHello">Demander un bonjour !</button>
    <h1 v-show="!!hello">{{ hello }}</h1>
</template>