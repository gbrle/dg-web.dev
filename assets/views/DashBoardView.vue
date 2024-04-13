<script setup lang="ts">
import { inject } from "vue";

const $isMobile = inject('$isMobile');

import TopBarComponent from "@/components/topBar/TopBarComponent.vue";
import SideBarItemsComponent from "@/components/sideBar/SideBarItemsComponent.vue";
import { logout } from "@/http/request/utilisateur";

</script>

<template>
    <v-card>
        <v-layout>
            <div v-if="$isMobile">
                <v-navigation-drawer
                    width="100%"
                    navigation-drawer
                >
                    <SideBarItemsComponent />
                </v-navigation-drawer>
            </div>
            <div v-else>
                <v-navigation-drawer
                    width="100%"
                    expand-on-hover
                    navigation-drawer
                    rail
                >
                    <SideBarItemsComponent />
                    <template v-slot:append>
                        <v-list-item
                            class="mb-2"
                            @click="logout"
                            prepend-icon="mdi-logout-variant"
                            title="Se déconnecter"
                        ></v-list-item>
                    </template>
                </v-navigation-drawer>
            </div>
            <v-main>
                <div class="mt-16">
                    <TopBarComponent/>
                    <div class="pl-7 pr-7 pt-4 pb-4">
                        <router-view></router-view>
                    </div>
                </div>
            </v-main>
        </v-layout>
    </v-card>
</template>
