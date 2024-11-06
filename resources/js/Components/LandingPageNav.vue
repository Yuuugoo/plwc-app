<template>
<nav 
        class="fixed w-full z-50 transition-all duration-300 lg:p-6 p-1"
        :class="[
            isScrolled 
                ? 'bg-white/90 backdrop-blur-md shadow-lg dark:bg-gray-900/90' 
                : 'bg-transparent hover:bg-white/90 hover:backdrop-blur-md hover:shadow-lg'
        ]"
    >
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <Link href="/" class="flex items-center space-x-2">
                        <ApplicationLogo class="h-10 lg:h-20 w-auto"/>
                        <img src="/images/plwc_logo_black.png" class="h-12 w-auto hidden lg:block md:hidden" alt="PLWC LOGO" />
                    </Link>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <Link
                        :href="route('home')"
                        :active="route().current('home')"
                        class="nav-link"
                        :class="{ 'text-indigo-600': route().current('home') }"
                    >
                        Home
                    </Link>

                    <div 
                        class="relative"
                        @mouseenter="openAboutSubnav"
                        @mouseleave="closeAboutSubnav"
                    >
                        <Link :href="route('about')" :active="route().current('about')" class="flex text-lg font-semibold items-center space-x-1" :class="{ 'text-indigo-600': route().current('about') || route().current('about.news') || route().current('about.contacts') }">
                            <span>About</span>
                            <svg 
                                class="w-4 h-4 transition-transform duration-200"
                                :class="{ 'rotate-180': showAboutSubnav }"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </Link>
                        <Transition
                            enter-active-class="transition duration-200 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-200 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                            <div v-show="showAboutSubnav" class="absolute left-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                <Link 
                                    :href="route('about.news')" 
                                    class="block px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-gray-100 hover:text-indigo-600"
                                >
                                    Content 1
                                </Link>
                                <Link 
                                    :href="route('about.contacts')" 
                                    class="block px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-gray-100 hover:text-indigo-600"
                                >
                                    Content 2
                                </Link>
                            </div>
                        </Transition>
                    </div>

                    <div 
                        class="relative"
                        @mouseenter="openGroupSubnav"
                        @mouseleave="closeGroupSubnav"
                    >
                        <Link :href="route('group')" 
                            :active="route().current('group')" 
                            class="flex items-center space-x-1 text-lg font-semibold"
                            :class="{ 
                                'text-indigo-600': 
                                    route().current('group') || 
                                    route().current('group.highschool.1styear') || 
                                    route().current('group.2ndyear.3rdyear') || 
                                    route().current('group.4thyear') || 
                                    route().current('group.youth') || 
                                    route().current('group.parents')
                            }"
                        >
                            <span>Church Groupings</span>
                            <svg 
                                class="w-4 h-4 transition-transform duration-200"
                                :class="{ 'rotate-180': showGroupSubnav }"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </Link>
                        <Transition
                            enter-active-class="transition duration-200 ease-out"
                            enter-from-class="transform scale-95 opacity-0"
                            enter-to-class="transform scale-100 opacity-100"
                            leave-active-class="transition duration-200 ease-in"
                            leave-from-class="transform scale-100 opacity-100"
                            leave-to-class="transform scale-95 opacity-0"
                        >
                            <div v-show="showGroupSubnav" class="absolute left-0 mt-2 py-2 w-64 bg-white rounded-md shadow-xl z-20">
                                <Link 
                                    v-for="link in groupLinks"
                                    :key="link.route"
                                    :href="route(link.route)"
                                    class="block px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-gray-100 hover:text-indigo-600"
                                >
                                    {{ link.text }}
                                </Link>
                            </div>
                        </Transition>
                    </div>

                    <Link 
                        :href="route('event')" 
                        :active="route().current('event')"
                        class="nav-link"
                        :class="{ 'text-indigo-600': route().current('event') }"
                    >
                        Events
                    </Link>

                    <Link 
                        :href="route('gallery')" 
                        :active="route().current('gallery')"
                        class="nav-link"
                        :class="{ 'text-indigo-600': route().current('gallery') }"
                    >
                        Gallery
                    </Link>

                    <!-- Auth Buttons -->
                    <div v-if="canLogin" class="flex items-center space-x-4">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="btn-primary"
                        >
                            Dashboard
                        </Link>
                        <Link
                            v-else
                            :href="route('login')"
                            class="btn-primary"
                        >
                            Log in
                        </Link>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button 
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="md:hidden rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none"
                >
                    <svg 
                        class="h-6 w-6" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path 
                            v-if="!isMobileMenuOpen" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path 
                            v-else 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div 
            v-show="isMobileMenuOpen"
            class="md:hidden bg-white dark:bg-gray-800 shadow-lg rounded-lg"
        >
            <div class="px-2 pt-2 pb-3 space-y-1">
                <NavLink 
                    :href="route('home')"
                    :active="route().current('home')"
                    class="mobile-nav-link"
                >
                    Home
                </NavLink>

                <div class="space-y-2">
                    <button 
                        @click="toggleDropdown('mobileAbout')"
                        class="mobile-nav-link w-full text-left flex justify-between items-center"
                    >
                        <span>About</span>
                        <svg 
                            class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': activeDropdown === 'mobileAbout' }"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div 
                        v-show="activeDropdown === 'mobileAbout'"
                        class="pl-4 space-y-2"
                    >
                        <Link 
                            :href="route('about.news')"
                            class="mobile-nav-link"
                        >
                            Content 1
                        </Link>
                        <Link 
                            :href="route('about.contacts')"
                            class="mobile-nav-link"
                        >
                            Content 2
                        </Link>
                    </div>
                </div>

                <!-- Mobile Groups Menu -->
                <div class="space-y-2">
                    <button 
                        @click="toggleDropdown('mobileGroups')"
                        class="mobile-nav-link w-full text-left flex justify-between items-center"
                    >
                        <span>Church Groupings</span>
                        <svg 
                            class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': activeDropdown === 'mobileGroups' }"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div 
                        v-show="activeDropdown === 'mobileGroups'"
                        class="pl-4 space-y-2"
                    >
                        <Link 
                            v-for="link in groupLinks"
                            :key="link.route"
                            :href="route(link.route)"
                            class="mobile-nav-link"
                        >
                            {{ link.text }}
                        </Link>
                    </div>
                </div>

                <NavLink 
                    :href="route('event')"
                    :active="route().current('event')"
                    class="mobile-nav-link"
                >
                    Events
                </NavLink>

                <NavLink 
                    :href="route('gallery')"
                    :active="route().current('gallery')"
                    class="mobile-nav-link"
                >
                    Gallery
                </NavLink>
                <div v-if="canLogin" class="flex ml-2 texl-lg font-semibold items-center space-x-4">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="btn-primary"
                    >
                        Dashboard
                    </Link>
                    <Link
                        v-else
                        :href="route('login')"
                        class="btn-primary"
                    >
                        Log in
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { initFlowbite } from 'flowbite';
import NavLink from '@/Components/NavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});

// State
const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);
const activeDropdown = ref(null);
const showAboutSubnav = ref(false);
const showGroupSubnav = ref(false);

let aboutSubnavTimeout, groupSubnavTimeout;

// Methods
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

const toggleDropdown = (name) => {
    activeDropdown.value = activeDropdown.value === name ? null : name;
};

// Group links data
const groupLinks = [
    { route: 'group.highschool.1styear', text: 'High School - 1st Year College' },
    { route: 'group.2ndyear.3rdyear', text: '2nd Year - 3rd Year College' },
    { route: 'group.4thyear', text: '4th Year College' },
    { route: 'group.youth', text: 'Youth' },
    { route: 'group.parents', text: 'Parents' }
];

// Lifecycle hooks
onMounted(() => {
    initFlowbite();
    
    window.addEventListener('scroll', () => {
        isScrolled.value = window.scrollY > 20;
    });
});
</script>

<style scoped>
.nav-link {
    @apply hover:text-indigo-600 text-lg font-semibold transition-colors duration-200
    dark:text-gray-200 dark:hover:text-indigo-400;
}

.mobile-nav-link {
    @apply block px-3 py-2 rounded-md text-lg font-semibold text-gray-700 hover:text-indigo-600 
    hover:bg-gray-50 transition-colors duration-200
    dark:text-gray-200 dark:hover:text-indigo-400 dark:hover:bg-gray-700;
}

.btn-primary {
    @apply px-4 py-2 rounded-lg bg-indigo-600 text-white text-lg font-semibold hover:bg-indigo-700 
    transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 
    focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600;
}
</style>