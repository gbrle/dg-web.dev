<script>
export default {
    data() {
        return {
            name: '',
            hello: ''
        }
    },
    methods: {
        refreshHello() {
            if (this.name) {
                fetch("/api/helloword/" + this.name, {"method": "GET"})
                    .then(response => response.json())
                    .then(result => this.hello = result);
            }
        }
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