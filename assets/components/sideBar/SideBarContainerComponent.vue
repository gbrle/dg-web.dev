<script setup lang="ts">
</script>

<template>
    <aside class="flex flex-col flex-shrink-0 w-64 h-full lg:flex">
        <div class="flex pt-3">
            <i class="fa-solid fa-arrows-to-eye"></i>
            <div class="flex-1">
                <ul class="pl-0 pb-2">
                    <slot></slot>
                </ul>
            </div>
        </div>
    </aside>
</template>