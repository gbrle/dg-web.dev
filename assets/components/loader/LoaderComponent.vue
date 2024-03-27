<template>
    <div class="loader-container">
        <div class="loader"></div>
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

.loader {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: inline-block;
    border-top: 4px solid #1853e5;
    border-right: 4px solid transparent;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

.loader::after {
    content: '';
    box-sizing: border-box;
    position: absolute;
    left: 0;
    top: 0;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border-left: 4px solid #ff3d00;
    border-bottom: 4px solid transparent;
    animation: rotation 0.5s linear infinite reverse;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
