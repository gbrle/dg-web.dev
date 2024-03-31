<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import TopBarComponent from '@/components/topBar/TopBarComponent.vue'
import SideBarComponent from '@/components/sideBar/SideBarComponent.vue'
import LayoutContainer from '@/components/layout/LayoutContainer.vue'

const topBar = ref(null)
const reactiveHeightOfLayout = ref(0)
const isHoverMenu = ref(false);

const assignHeightOfSideBarAndLayout = () => {
    const widowHeight = window.innerHeight
    const topBarHeight = topBar.value.$el.clientHeight

    reactiveHeightOfLayout.value = widowHeight - topBarHeight;
}

onMounted(() => {
    assignHeightOfSideBarAndLayout()
    window.addEventListener('resize', () => {
        assignHeightOfSideBarAndLayout()
    });
})

onUnmounted(() => {
    window.removeEventListener('resize', assignHeightOfSideBarAndLayout)
})
</script>

<template>
    <div class="flex-row mh-100">
    <TopBarComponent ref="topBar" class="flex align-items-center h-[8rem]"/>
        <div class="flex">
            <SideBarComponent
                id="side-bar"
                @mouseover="isHoverMenu = true"
                @mouseleave="isHoverMenu = false"
                class="overflow-y-scroll pr-4 border-end"
                :style="{
                    transition: `${0.2}s`,
                    height: `${reactiveHeightOfLayout}px`,
                    width: `${isHoverMenu ? 262 : 38}px`
                }"
            />
            <LayoutContainer
                id="layout-container"
                class="overflow-y-scroll pl-10 pr-10 pl-7 pt-3 pb-3 w-100"
                :style="{
                    height: `${reactiveHeightOfLayout}px`,
                    opacity: `${isHoverMenu ? 0.3 : 1}`,
                    position: `${isHoverMenu ? 'fixed' : 'relative'}`
                }"
            >
                <RouterView></RouterView>
            </LayoutContainer>
        </div>
    </div>
</template>
