<script setup lang="ts">
import SideBarContainerComponent from '@/components/sideBar/SideBarContainerComponent.vue'
import SideBarItemComponent from '@/components/sideBar/SideBarItemComponent.vue'
import SideBarDropdownComponent from '@/components/sideBar/SideBarDropdownComponent.vue'
</script>

<template>
    <custom-scrollbar>
        <SideBarContainerComponent>
            <SideBarDropdownComponent libelle="Notes" icon="gear">
                <SideBarItemComponent
                    routeName="notes"
                    libelle="Notes"
                    icon="users-gear"
                />
            </SideBarDropdownComponent>
        </SideBarContainerComponent>
    </custom-scrollbar>
</template>
