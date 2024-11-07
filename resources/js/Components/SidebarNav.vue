<template>
    <aside
        id="logo-sidebar"
        class="fixed top-0 hidden sm:block left-0 z-40 w-64 h-screen pt-8 transition-transform bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar"
    >
        <!-- Logo -->
        <div class="px-6 pb-4">
            <Link :href="route('home')" class="flex justify-center items-center mb-6">
                <ApplicationLogo class="block h-10 lg:h-20 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </Link>
        </div>

        <!-- Navigation Links -->
        <div class="h-full px-6 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-4 font-medium">
                <!-- Dashboard -->
                <li>
                    <DashboardNavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                        class="flex items-center p-3 w-full text-gray-900 rounded-lg bg-blue-600 hover:bg-blue-700 hover:text-white dark:text-white dark:hover:bg-gray-700 group"
                    >
                    
                        <span class="ml-3">Dashboard</span>
                    </DashboardNavLink>
                </li>

                <!-- CRUD Dropdown -->
                <li>
                    <button
                        type="button"
                        class="flex items-center text-sm w-full p-2 text-white rounded-lg bg-blue-600 hover:bg-blue-700 group"
                        @click="showCrudDropdown = !showCrudDropdown"
                    >
                        <span class="ml-4">CRUD</span>
                        <svg
                            class="w-4 h-3 ml-auto transition-transform"
                            :class="{ 'rotate-180': showCrudDropdown }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <ul v-if="showCrudDropdown" class="pl-6 space-y-2 mt-2">
                        <li>
                            <DashboardNavLink
                                :href="route('gallery.index')"
                                :active="route().current('gallery.index')"
                                class="flex items-center p-2 w-full rounded-lg bg-blue-600 hover:bg-green-600 dark:text-white group"
                            >
                                <span class="ml-3">Gallery</span>
                            </DashboardNavLink>
                        </li>
                        <li>
                            <DashboardNavLink
                                :href="route('new-friends')"
                                :active="route().current('new-friends')"
                                class="flex items-center p-2 w-full text-white rounded-lg bg-blue-600 hover:bg-green-600 dark:text-white dark:hover:bg-gray-700 group"
                            >
                                <span class="ml-3">New Friends</span>
                            </DashboardNavLink>
                        </li>
                    </ul>
                </li>
                <li>
                    <DashboardNavLink
                        :href="route('settings')"
                        :active="route().current('settings')"
                        class="flex items-center p-3 w-full text-gray-900 rounded-lg bg-blue-600 hover:bg-blue-700 hover:text-white dark:text-white dark:hover:bg-gray-700 group"
                    >
                    
                        <span class="ml-3">Settings</span>
                    </DashboardNavLink>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import DashboardNavLink from '@/Components/DashboardNavLink.vue';

const showCrudDropdown = ref(false);
</script>
