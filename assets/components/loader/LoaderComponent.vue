<template>
    <div class="loader-container">
        <v-progress-circular model-value="20" :size="93" :width="6" indeterminate></v-progress-circular>
    </div>
</template>

<style scoped>
.loader-container {
    position: fixed;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 100;
}
</style>
