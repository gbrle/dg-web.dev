<script setup lang="ts">
import {ref} from "vue";
import SideBarComponent from "@/components/sideBar/SideBarComponent.vue";
import LayoutContainer from "@/components/layout/LayoutContainer.vue";
import TopBarComponent from "@/components/topBar/TopBarComponent.vue";
import {onMounted, onUnmounted} from "vue";

const topBar = ref(null)
const sideBar = ref(null)
const layout = ref(null)

const reactiveHeightOfLayout = ref(0)
const reactiveWidthOfLayout = ref(0)
const isHoverMenu = ref(false);

const assignHeightOfSideBarAndLayout = () => {
    const widowHeight = window.innerHeight
    const topBarHeight = topBar.value.$el.clientHeight

    reactiveHeightOfLayout.value = widowHeight - topBarHeight;
}

const assignMinWidthOfLayout = () => {
    const widowWidth = window.innerWidth
    reactiveWidthOfLayout.value = (widowWidth - 51);
}

onMounted(() => {
    assignHeightOfSideBarAndLayout()
    assignMinWidthOfLayout()
    window.addEventListener('resize', () => {
        assignHeightOfSideBarAndLayout()
        assignMinWidthOfLayout()
    });
})

onUnmounted(() => {
    window.removeEventListener('resize', assignHeightOfSideBarAndLayout)
})
</script>

<template>
    <TopBarComponent ref="topBar" class="flex align-items-center h-[8rem]"/>
    <div class="flex">
        <SideBarComponent
            ref="sideBar"
            id="side-bar"
            @mouseover="() => {
                isHoverMenu = true
                assignMinWidthOfLayout()
            }"
            @mouseleave="() => {
                isHoverMenu = false
                assignMinWidthOfLayout()
            }"
            class="overflow-y-scroll pr-4 border-end"
            :style="{
                transition: `${0.2}s`,
                height: `${reactiveHeightOfLayout}px`,
                width: `${isHoverMenu ? 262 : 51}px`
            }"
        />
        <LayoutContainer
            ref="layout"
            id="layout-container"
            class="overflow-y-scroll pl-10 pr-[30px] pl-7 pt-3"
            :style="{
                height: `${reactiveHeightOfLayout}px`,
                width: `${reactiveWidthOfLayout}px`,
                opacity: `${isHoverMenu ? 0.3 : 1}`,
                position: `${isHoverMenu ? 'fixed' : 'relative'}`,
            }"
        >
            <RouterView></RouterView>
        </LayoutContainer>
    </div>
</template>
