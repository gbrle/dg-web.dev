<script setup lang="ts">
import fullLogo from '@/images/dg-web-animated.svg'
</script>

<template>

    <nav class="border-b border-gray-200">
        <div class="p-2">
                <div class="flex items-center justify-content-between">
                    <div class="pl-7">
                        <router-link to="/home">
                            <img :src="fullLogo" class="h-[100px] mr-3" alt="DG WEB Logo" />
                        </router-link>
                    </div>
                </div>
        </div>
    </nav>
</template>
