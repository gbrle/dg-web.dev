<script setup lang="ts">
import SideBarContainerComponent from '@/components/sideBar/SideBarContainerComponent.vue'
import SideBarItemComponent from '@/components/sideBar/SideBarItemComponent.vue'
import SideBarDropdownComponent from '@/components/sideBar/SideBarDropdownComponent.vue'
</script>

<template>
    <custom-scrollbar>
        <SideBarContainerComponent>
            <SideBarDropdownComponent libelle="Daily stand up notes" icon="book">
                <SideBarItemComponent
                    routeName="daily-stand-up-note-creation"
                    libelle="Créer une note"
                    icon="chevron-right"
                />
            </SideBarDropdownComponent>
        </SideBarContainerComponent>
    </custom-scrollbar>
</template>
