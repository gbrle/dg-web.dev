<script setup lang="ts">
import { ref } from 'vue'
import SideBarContainerComponent from '@/components/sideBar/SideBarContainerComponent.vue'
import SideBarItemComponent from '@/components/sideBar/SideBarItemComponent.vue'
import SideBarDropdownComponent from '@/components/sideBar/SideBarDropdownComponent.vue'
import { logout } from '@/http/request/utilisateur'

const dropdownStates = {
    dailyStandUp: ref(false),
    utilisateur: ref(false),
}

const closeOtherDropdowns = (selectedDropdown) => {
    for (const key in dropdownStates) {
        dropdownStates[key].value = key === selectedDropdown;

    }
}
</script>

<template>
    <custom-scrollbar>
        <SideBarContainerComponent>
            <SideBarDropdownComponent
                libelle="Daily stand up notes"
                icon="book"
                :is-open-prop="dropdownStates.dailyStandUp.value"
                @closeOtherDropdowns="() => closeOtherDropdowns('dailyStandUp')"
            >
                <SideBarItemComponent
                    routeName="daily-stand-up-note-creation"
                    libelle="Créer une note"
                    icon="fa-plus"
                />
            </SideBarDropdownComponent>
            <SideBarDropdownComponent
                libelle="utilisateur"
                icon="user"
                :is-open-prop="dropdownStates.utilisateur.value"
                @closeOtherDropdowns="() => closeOtherDropdowns('utilisateur')"
            >
                <SideBarItemComponent
                    routeName="utilisateurs-creation"
                    libelle="Créer un utilisateur"
                    icon="fa-plus"
                />
                <SideBarItemComponent
                    routeName="utilisateurs-liste"
                    libelle="Liste des utilisateurs"
                    icon="fa-list"
                />
                <a class="no-underline" href="/api/logout" @click="logout">
                    <SideBarItemComponent
                        libelle="Se déconnecter"
                        icon="fa-right-from-bracket"
                    />
                </a>
            </SideBarDropdownComponent>
        </SideBarContainerComponent>
    </custom-scrollbar>
</template>
