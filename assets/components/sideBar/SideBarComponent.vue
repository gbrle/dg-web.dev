<script setup lang="ts">
import SideBarContainerComponent from '@/components/sideBar/SideBarContainerComponent.vue'
import SideBarItemComponent from '@/components/sideBar/SideBarItemComponent.vue'
import SideBarDropdownComponent from '@/components/sideBar/SideBarDropdownComponent.vue'
import { logout } from '@/http/request/utilisateur'
</script>

<template>
    <custom-scrollbar>
        <SideBarContainerComponent>
            <SideBarDropdownComponent libelle="Daily stand up notes" icon="book">
                <SideBarItemComponent
                    routeName="daily-stand-up-note-creation"
                    libelle="Créer une note"
                    icon="fa-plus"
                />
            </SideBarDropdownComponent>
            <SideBarDropdownComponent libelle="utilisateur" icon="user">
                <SideBarItemComponent
                    routeName="utilisateurs-creation"
                    libelle="Créer un utilisateur"
                    icon="fa-plus"
                />
                <a href="/api/logout" @click="logout">
                    <SideBarItemComponent
                        libelle="Se déconnecter"
                        icon="fa-right-from-bracket"
                    />
                </a>
            </SideBarDropdownComponent>
        </SideBarContainerComponent>
    </custom-scrollbar>
</template>
