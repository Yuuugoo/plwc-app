<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    events: {
        type: Array,
        default: () => [
            {
                id: 1,
                title: 'Dance Competition',
                date: 'October 27, 2024',
                time: '1:00 PM - 2:00 PM',
                location: 'Covered Court',
                description: 'Sample Event 1',
                image: '/images/dc_bg.jpg'
            },
            {
                id: 2,
                title: 'Church Anniversary',
                date: 'October 27, 2024',
                time: '2:00 PM - 4:00 PM',
                location: 'Sanctuary',
                description: 'Sample Event 2',
                image: '/images/anniv_bg.jpg'
            },
            {
                id: 3,
                title: 'Sports Fest',
                date: 'November 10, 2024',
                time: '12:00 PM - 5:00 PM',
                location: 'Covered Court',
                description: 'Sample Event 3',
                image: '/images/sfest_bg.jpg'
            },
        ]
    }
});
</script>

<template>
    <Head title="Events" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-t from-blue-600 to-blue-400 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mt-20">
                    <h1 class="text-4xl font-bold text-white sm:text-5xl lg:text-6xl animate-fade-in">
                        {{ $t('events.hero-title') }}
                    </h1>
                    <p class="mt-4 text-xl text-blue-100 animate-fade-in-delayed">
                        {{ $t('events.hero-description') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Events Grid Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-2">
                    <div v-for="event in events" :key="event.id" 
                        class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden animate-fade-up">
                        <div class="flex flex-col md:flex-row h-full">
                            <!-- Image Container -->
                            <div class="relative md:w-2/5 overflow-hidden">
                                <img :src="event.image" 
                                     :alt="event.title"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                     style="min-height: 300px;">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent md:hidden"></div>
                            </div>

                            <!-- Content Container -->
                            <div class="flex-1 p-6 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                                        {{ event.title }}
                                    </h3>
                                    <p class="mt-3 text-gray-600">
                                        {{ event.description }}
                                    </p>
                                </div>

                                <!-- Event Details with SVG icons -->
                                <div class="mt-6 space-y-3">
                                    <div class="flex items-center text-gray-500">
                                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>{{ event.date }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ event.time }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-500">
                                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>{{ event.location }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Footer />
    </div>
</template>

<style scoped>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
}

.animate-fade-in-delayed {
    animation: fadeIn 0.8s ease-out 0.2s forwards;
    opacity: 0;
}

.animate-fade-up {
    animation: fadeUp 0.8s ease-out forwards;
    opacity: 0;
}

/* Stagger the animations for events */
.animate-fade-up:nth-child(1) { animation-delay: 0.1s; }
.animate-fade-up:nth-child(2) { animation-delay: 0.2s; }
.animate-fade-up:nth-child(3) { animation-delay: 0.3s; }
</style>