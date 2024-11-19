<script setup>
import { ref, onMounted, computed, onUnmounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';
import FriendsCard from '@/Components/FriendsCard.vue';
import LandingEvents from '@/Components/LandingEvents.vue';
import { useParallax, useScroll } from '@vueuse/core';
import TimeSched from '@/Components/TimeSched.vue';

const container = ref(null);
const timeSchedContainer = ref(null);
const eventsContainer = ref(null);
const { tilt: cardTilt, roll: cardRoll } = useParallax(container);
const { tilt: schedTilt, roll: schedRoll } = useParallax(timeSchedContainer);
const { tilt: eventsTilt, roll: eventsRoll } = useParallax(eventsContainer);
const scaleConstant = 10;

const props = defineProps({
    canLogin: Boolean,
    friends: {
        type: Array,
        required: true
    },
});

const isVisibleCard = ref(false);
const isVisibleTimeSched = ref(false);
const isVisibleEvents = ref(false);
const cardRef = ref(null);
const timeSchedRef = ref(null);
const eventsRef = ref(null);
const sections = ref([]);
const currentSectionIndex = ref(0);
// Initialize isLargeScreen with null for SSR
const isLargeScreen = ref(null);

const isCurrentSection = computed(() => (index) => index === currentSectionIndex.value);
const isNextSection = computed(() => (index) => index === currentSectionIndex.value + 1);

// Client-side only code
if (typeof window !== 'undefined') {
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

    const handleResize = () => {
        isLargeScreen.value = window.innerWidth >= 1024;
    };

    onMounted(() => {
        // Set initial value
        isLargeScreen.value = window.innerWidth >= 1024;

        window.addEventListener('resize', handleResize);
        window.addEventListener('scroll', updateCurrentSection);
        
        sections.value = document.querySelectorAll('section');
        updateCurrentSection();

        const createObserver = (elementRef, visibilityRef) => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    visibilityRef.value = entry.isIntersecting;
                });
            });
            
            if (elementRef.value) {
                observer.observe(elementRef.value);
            }
            
            return observer;
        };

        const cardObserver = createObserver(cardRef, isVisibleCard);
        const timeSchedObserver = createObserver(timeSchedRef, isVisibleTimeSched);
        const eventsObserver = createObserver(eventsRef, isVisibleEvents);

        // Clean up on component unmount
        onUnmounted(() => {
            window.removeEventListener('resize', handleResize);
            window.removeEventListener('scroll', updateCurrentSection);
            cardObserver.disconnect();
            timeSchedObserver.disconnect();
            eventsObserver.disconnect();
        });
    });
}
</script>


<template>
    <Head>
        <title>Philippine Lake-Wood Church | Welcome to Our Community</title>
        <meta
            name="description"
            content="Join us for worship, fellowship & growth."
            head-key="description"
        />
    </Head>
    <div class="flex-grow flex-col overflow-hidden">
        <LandingPageNav :canLogin="canLogin" />
        <main class="bg-cloud-bg bg-no-repeat bg-cover">
            <section 
            class="relative flex justify-center items-center min-h-[calc(87vh-4rem)] lg:min-h-screen transition-all duration-500"
            :class="{ 'scale-100 opacity-100': isCurrentSection(0), 'scale-95 opacity-70': !isCurrentSection(0) }"
            >
            <div class="px-6 max-w-screen-2xl text-center py-16 md:mt-48 md:mb-36">
                <h1 class="mb-3 sm:mb-4 text-5xl sm:text-4xl md:text-6xl lg:text-9xl font-semibold tracking-tight leading-none text-gray-900 allura-font">
                {{ $t('landing.title') }}
                </h1>
                <h1 class="mb-4 sm:mb-6 text-4xl sm:text-3xl md:text-5xl lg:text-9xl font-semibold tracking-tight leading-none text-gray-750 allura-font">
                {{ $t('landing.subtitle') }}
                </h1>
                <p class="text-lg sm:text-base md:text-xl lg:text-2xl font-medium text-gray-650">
                {{ $t('landing.quote') }}<br class="sm:hidden">
                "{{ $t('landing.quote_continued') }}"<br>
                {{ $t('landing.verse') }}
                </p>
            </div>
            <div 
                v-if="isNextSection(1)" 
                class="absolute bottom-4 sm:bottom-20 left-1/2 transform -translate-x-1/2 animate-bounce"
            >
                <svg 
                class="w-4 h-4 sm:w-6 sm:h-6 text-gray-700" 
                fill="none" 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2" 
                viewBox="0 0 24 24" 
                stroke="currentColor"
                >
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
            </section>
        </main>

        <div>
            <section class="relative flex flex-col sm:flex-row md:flex-row justify-between items-center px-4 md:px-10 lg:py-24 lg:mb-10 transition-all duration-500"
                     :class="{ 'scale-100 opacity-100': isCurrentSection(1), 'scale-95 opacity-70': !isCurrentSection(1) }">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <div
                        ref="timeSchedContainer"
                        class="transition-transform duration-200 ease-out"
                        :style="{
                            transform: `perspective(5000px) rotateX(${schedRoll * scaleConstant}deg) rotateY(${schedTilt * scaleConstant}deg)`,
                        }"
                    >
                        <div
                            ref="timeSchedRef"
                            class="transition-all duration-1000 ease-out shadow-lg rounded-lg overflow-hidden"
                            :class="{
                                'lg:translate-x-20 translate-x-0 opacity-100': isVisibleTimeSched,
                                'lg:-translate-x-0 -translate-x-full opacity-0': !isVisibleTimeSched
                            }"
                        >
                            <TimeSched id="time-sched-section" />
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="w-full md:w-72 mx-auto md:ml-auto">
                        <div
                            ref="container"
                            class="transition-transform duration-200 ease-out w-full"
                            :style="{
                                transform: `perspective(2000px) rotateX(${cardRoll * scaleConstant}deg) rotateY(${cardTilt * scaleConstant}deg)`,
                            }"
                        >
                            <div
                                ref="cardRef"
                                class="transition-all duration-1000 ease-out shadow-lg rounded-lg overflow-hidden"
                                :class="{ 'translate-x-0 opacity-100': isVisibleCard, 'translate-x-full opacity-0': !isVisibleCard }"
                            >
                                <FriendsCard :friends="friends" />
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="isNextSection(2)" class="absolute bottom-0 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </section>

            
            <section class="relative min-h-screen py-16 px-4 transition-all duration-500"
                :class="{ 'scale-100 opacity-100': isCurrentSection(2), 'scale-95 opacity-70': !isCurrentSection(2) }">
                <div
                    ref="eventsContainer"
                    class="max-w-7xl mx-auto"
                    :class="{ 'transition-transform duration-200 ease-out': isLargeScreen }"
                    :style="isLargeScreen 
                        ? {
                            transform: `perspective(5000px) rotateX(${eventsRoll * scaleConstant}deg) rotateY(${eventsTilt * scaleConstant}deg)`
                        }
                        : {}"
                >
                    <div
                        ref="eventsRef"
                        class="transition-all duration-1000 ease-out"
                        :class="{ 'translate-y-0 opacity-100': isVisibleEvents, 'translate-y-20 opacity-0': !isVisibleEvents }"
                    >
                        <LandingEvents />
                    </div>
                </div>
            </section>
            
            <Footer />
        </div>
    </div>
</template>

<style scoped>

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