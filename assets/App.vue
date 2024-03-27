<script setup lang="ts">
import TopBarComponent from '@/components/topBar/TopBarComponent.vue'
import SideBarComponent from '@/components/sideBar/SideBarComponent.vue'
import LayoutContainer from '@/components/layout/LayoutContainer.vue'
</script>

<template>
    <body>
        <TopBarComponent />
            <div class="flex pt-2">
                <SideBarComponent />
                <LayoutContainer>
                    <RouterView></RouterView>
                </LayoutContainer>
            </div>
        <RouterView></RouterView>
    </body>
</template>
