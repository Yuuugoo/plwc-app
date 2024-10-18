<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';
import { Link } from '@inertiajs/vue3';
import FriendsCard from '@/Components/FriendsCard.vue';
import { ref, onMounted, computed } from 'vue';
import { useParallax, useScroll } from '@vueuse/core';
import TimeSched from '@/Components/TimeSched.vue';

const container = ref(null);
const timeSchedContainer = ref(null);
const { tilt: cardTilt, roll: cardRoll } = useParallax(container);
const { tilt: schedTilt, roll: schedRoll } = useParallax(timeSchedContainer);
const scaleConstant = 10;

const props = defineProps({
    canLogin: Boolean,
    friends: {
        type: Array,
        required: true
    },
});

const isVisible = ref(false);
const cardRef = ref(null);
const timeSchedRef = ref(null);

const sections = ref([]);
const currentSectionIndex = ref(0);

const { y: scrollY } = useScroll(window);

const updateCurrentSection = () => {
    const scrollPosition = scrollY.value + window.innerHeight / 2;
    for (let i = 0; i < sections.value.length; i++) {
        const section = sections.value[i];
        if (scrollPosition >= section.offsetTop && scrollPosition < section.offsetTop + section.offsetHeight) {
            currentSectionIndex.value = i;
            break;
        }
    }
};

const isCurrentSection = computed(() => (index) => index === currentSectionIndex.value);
const isNextSection = computed(() => (index) => index === currentSectionIndex.value + 1);

onMounted(() => {
    sections.value = document.querySelectorAll('section');
    window.addEventListener('scroll', updateCurrentSection);
    updateCurrentSection();

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                isVisible.value = true;
            } else {
                isVisible.value = false;
            }
        });
    });
    if (cardRef.value) {
        observer.observe(cardRef.value);
    }
    if (timeSchedRef.value) {
        observer.observe(timeSchedRef.value);
    }
});
</script>

<template>
    <Head title="Home" />
    <div class="flex-grow flex-col min-h-screen overflow-hidden">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="relative flex justify-center items-center h-full transition-all duration-500"
                     :class="{ 'scale-100 opacity-100': isCurrentSection(0), 'scale-95 opacity-70': !isCurrentSection(0) }">
                <div class="mt-32 mb-36 py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16"> 
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl dark:text-white allura-font">
                        REVIVAL 30-200
                    </h1>
                    <h1 class="mb-8 text-3xl font-semibold tracking-tight leading-none text-gray-750 md:text-2xl lg:text-4xl dark:text-white allura-font">
                        30 Groups, 200 Disciples
                    </h1>
                    <p class="mb-8 text-lg font-normal text-gray-650 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                        "'If you can'?" said Jesus. "Everything is possible for one who believes.".<br>[Mark 9:23]
                    </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                        <Link :href="route('about')" :active="route().current('about')" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Learn More
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </Link>
                    </div>
                </div>
                <div v-if="isNextSection(1)" class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </section>

            <section class="relative flex flex-col md:flex-row justify-between items-center px-4 md:px-10 py-16 transition-all duration-500"
                     :class="{ 'scale-100 opacity-100': isCurrentSection(1), 'scale-95 opacity-70': !isCurrentSection(1) }">
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <div
                        ref="timeSchedContainer"
                        class="transition-transform duration-200 ease-out"
                        :style="{
                            transform: `perspective(1000px) rotateX(${schedRoll * scaleConstant}deg) rotateY(${schedTilt * scaleConstant}deg)`,
                        }"
                    >
                        <div
                            ref="timeSchedRef"
                            class="transition-all duration-1000 ease-out shadow-lg rounded-lg overflow-hidden"
                            :class="{ 'translate-x-0 opacity-100': isVisible, '-translate-x-full opacity-0': !isVisible }"
                        >
                            <TimeSched />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full md:w-72 mx-auto md:ml-auto">
                        <div
                            ref="container"
                            class="transition-transform duration-200 ease-out w-full"
                            :style="{
                                transform: `perspective(1000px) rotateX(${cardRoll * scaleConstant}deg) rotateY(${cardTilt * scaleConstant}deg)`,
                            }"
                        >
                            <div
                                ref="cardRef"
                                class="transition-all duration-1000 ease-out shadow-lg rounded-lg overflow-hidden"
                                :class="{ 'translate-x-0 opacity-100': isVisible, 'translate-x-full opacity-0': !isVisible }"
                            >
                                <FriendsCard :friends="friends" />
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="isNextSection(2)" class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </section>
            
            <section class="relative h-screen transition-all duration-500"
                     :class="{ 'scale-100 opacity-100': isCurrentSection(2), 'scale-95 opacity-70': !isCurrentSection(2) }">
                <!-- Content for the third section -->
            </section>
            
            <Footer />
        </div>
    </div>
</template>

<style scoped>
.allura-font {
    font-family: 'Allura', cursive;
}

.animate-bounce {
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(-25%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
    }
    50% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
}
</style>