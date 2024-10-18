<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { initFlowbite } from 'flowbite';
import NavLink from '@/Components/NavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

onMounted(() => {
    initFlowbite();
});

defineProps({
    canLogin: {
        type: Boolean,
    },
});

const showAboutSubnav = ref(false);
const showGroupSubnav = ref(false);

let aboutSubnavTimeout, groupSubnavTimeout;

const openAboutSubnav = () => {
    clearTimeout(aboutSubnavTimeout);
    aboutSubnavTimeout = setTimeout(() => {
        showAboutSubnav.value = true;
    }, 300);
};

const closeAboutSubnav = () => {
    clearTimeout(aboutSubnavTimeout);
    aboutSubnavTimeout = setTimeout(() => {
        showAboutSubnav.value = false;
    }, 300); 
};

const openGroupSubnav = () => {
    clearTimeout(groupSubnavTimeout);
    groupSubnavTimeout = setTimeout(() => {
        showGroupSubnav.value = true;
    }, 300); 
};

const closeGroupSubnav = () => {
    clearTimeout(groupSubnavTimeout); 
    groupSubnavTimeout = setTimeout(() => {
        showGroupSubnav.value = false;
    }, 300); 
};

const isMobileMenuOpen = ref(false);
</script>

<template>
    <!-- Navbar -->
    <nav class="bg-gradient-to-t from-indigo-600 to-sky-500 relative dark:bg-gray-900 w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
                <ApplicationLogo class="h-18 fill-current text-gray-500" />
                <img src="/images/plwc_logo_white (1).png" class="h-14 w-80" alt="PLWC LOGO">
            </a>

            <!-- Mobile button to show drawer -->
            <button 
                class="md:hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5" 
                type="button" 
                @click="isMobileMenuOpen = !isMobileMenuOpen" 
                data-drawer-target="drawer-right-example" 
                data-drawer-show="drawer-right-example"
                data-drawer-placement="right" 
                aria-controls="drawer-right-example"
            >
                <!-- Burger Icon -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <span class="sr-only">Open menu</span>
            </button>

            <!-- Desktop Navbar -->
            <div class="hidden md:flex items-center space-x-4">
                <ul class="flex space-x-8">
                    <li>
                        <NavLink :href="route('home')" :active="route().current('home')">
                            Home
                        </NavLink>
                    </li>
                    <li class="relative" @mouseenter="openAboutSubnav" @mouseleave="closeAboutSubnav">
                        <NavLink :href="route('about')" :active="route().current('about')">About</NavLink>
                        <ul v-if="showAboutSubnav" class="absolute left-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                            <li><Link :href="route('about.news')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Content 1</Link></li>
                            <li><Link :href="route('about.contacts')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Content 2</Link></li>
                        </ul>
                    </li>
                    <li 
                        class="relative" 
                        @mouseenter="openGroupSubnav" 
                        @mouseleave="closeGroupSubnav"
                    >
                        <NavLink :href="route('group')" :active="route().current('group')">
                            Church Groupings
                        </NavLink>
                        <ul 
                            v-if="showGroupSubnav" 
                            class="absolute left-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20"
                        >
                            <!-- <li>
                                <Link :href="route('group.elementary')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Elementary
                                </Link>
                            </li> -->
                            <li>
                                <Link :href="route('group.highschool.1styear')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    High School - 1st Year College
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('group.2ndyear.3rdyear')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    2nd Year College - 3rd Year College
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('group.4thyear')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    4th Year College
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('group.youth')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Youth
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('group.parents')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Parents
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <NavLink :href="route('event')" :active="route().current('event')">
                            Events
                        </NavLink>
                    </li>
                    <li>
                        <NavLink :href="route('gallery')" :active="route().current('gallery')">
                            Church Gallery
                        </NavLink>
                    </li>
                </ul>

                <div v-if="canLogin">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >Dashboard</Link>
                    <Link
                        v-else
                        :href="route('login')"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Log in
                    </Link>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Drawer -->
    <div v-if="isMobileMenuOpen" id="drawer-right-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform bg-gray-800 w-80 dark:bg-gray-800">
        <button @click="isMobileMenuOpen = false" class="absolute top-2 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8">
            <svg class="w-3 h-3 ml-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <ul class="space-y-2">
            <li><NavLink :href="route('home')" :active="route().current('home')">Home</NavLink></li>
            <li>
                <NavLink :href="route('about')" :active="route().current('about')">About</NavLink>
                <ul class="pl-4 mt-2 space-y-2">
                    <li><Link :href="route('about.news')" class="block text-sm text-gray-300 hover:text-white">Content 1</Link></li>
                    <li><Link :href="route('about.contacts')" class="block text-sm text-gray-300 hover:text-white">Content 2</Link></li>
                </ul>
            </li>
            <li>
                <NavLink :href="route('group')" :active="route().current('group')">Church Groupings</NavLink>
                <ul class="pl-4 mt-2 space-y-2">
                    <li><Link :href="route('group.elementary')" class="block text-sm text-gray-300 hover:text-white">Elementary</Link></li>
                    <li><Link :href="route('group.highschool.1styear')" class="block text-sm text-gray-300 hover:text-white">High School - 1st Year College</Link></li>
                    <li><Link :href="route('group.2ndyear.3rdyear')" class="block text-sm text-gray-300 hover:text-white">2nd Year College - 3rd Year College</Link></li>
                    <li><Link :href="route('group.4thyear')" class="block text-sm text-gray-300 hover:text-white">4th Year College</Link></li>
                    <li><Link :href="route('group.youth')" class="block text-sm text-gray-300 hover:text-white">Youth</Link></li>
                    <li><Link :href="route('group.parents')" class="block text-sm text-gray-300 hover:text-white">Parents</Link></li>
                </ul>
            </li>
            <li><NavLink :href="route('event')" :active="route().current('event')">Events</NavLink></li>
            <li><NavLink :href="route('gallery')" :active="route().current('gallery')">Church Gallery</NavLink></li>
        </ul>
        <div v-if="canLogin" class="mt-4">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="block w-full text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >Dashboard</Link>
            <Link
                v-else
                :href="route('login')"
                class="block w-full text-center text-white bg-green-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Log in
            </Link>
        </div>
    </div>
</template>

