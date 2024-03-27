<script setup lang="ts">
import SideBarContainerComponent from '@/components/sideBar/SideBarContainerComponent.vue'
import SideBarItemComponent from '@/components/sideBar/SideBarItemComponent.vue'
import SideBarDropdownComponent from '@/components/sideBar/SideBarDropdownComponent.vue'
</script>

<template>
    <SideBarContainerComponent>
        <SideBarDropdownComponent libelle="Notes" icon="gear">
            <SideBarItemComponent
                routeName="notes"
                libelle="Notes"
                icon="users-gear"
                class="ml-3"
            />
        </SideBarDropdownComponent>
    </SideBarContainerComponent>
</template>
