<script setup lang="ts">
import TopBarContainerComponent from '@/components/topBar/TopBarContainerComponent.vue'
import TopBarLogoComponent from '@/components/topBar/TopBarLogoComponent.vue'
import TopBarLeftItemComponent from '@/components/topBar/TopBarLeftItemComponent.vue'
import TopBarRightItemComponent from '@/components/topBar/TopBarRightItemComponent.vue'
</script>

<template>
    <TopBarContainerComponent>
        <TopBarLeftItemComponent>
            <TopBarLogoComponent />
        </TopBarLeftItemComponent>
        <TopBarRightItemComponent>
        </TopBarRightItemComponent>
    </TopBarContainerComponent>
</template>
