<template>
    <Head title="Friend Introductions" />
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 bg-no-repeat bg-cover">
        <LandingPageNav :canLogin="canLogin" />
        
        <!-- Hero Header -->
        <div class="relative overflow-hidden py-16 sm:py-24">
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-2xl mt-10 text-center">
                    <!-- <div class="mb-8">
                        <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                            Making new connections every day
                        </div>
                    </div> -->
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                        Meet Newcomers for This Month
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Join us in welcoming our newest church members.
                    </p>
                </div>
            </div>
        </div>

        <main class="container mx-auto px-4 py-12 max-w-7xl">
            <!-- Month/Year Header -->
            <div class="text-center mb-12">
                <p class="mt-4 text-xl text-gray-600 animate-slide-up">
                    {{ currentMonthYear }} Newcomers
                </p>
            </div>

            <!-- Carousel Implementation -->
            <div class="relative w-full" id="friend-carousel">
                <!-- Carousel wrapper -->
                <div class="relative overflow-hidden rounded-lg">
                    <div class="flex transition-transform duration-700 ease-in-out" 
                         :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                        <div v-for="(friend, index) in friends" 
                             :key="friend.id"
                             class="w-full sm:w-1/2 lg:w-1/3 flex-none px-4">
                            <div class="friend-card bg-white rounded-2xl shadow-lg overflow-hidden hover:transform hover:scale-105 transition-all duration-300 h-full mx-auto max-w-sm">
                                <div class="p-6">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-20 h-20 rounded-full overflow-hidden shadow-md transform hover:scale-110 transition-transform duration-300">
                                                <img
                                                    v-if="friend.friend_avatar"
                                                    :src="friend.friend_avatar.startsWith('http')
                                                        ? friend.friend_avatar
                                                        : `/storage/${friend.friend_avatar}`"
                                                    :alt="friend.name"
                                                    class="w-full h-full object-cover"
                                                    @error="$event.target.src = '/images/default-avatar.jpg'"
                                                >
                                                <div
                                                    v-else
                                                    class="w-full h-full bg-gradient-to-br from-blue-300 to-purple-300 flex items-center justify-center"
                                                >
                                                    <span class="text-2xl font-bold text-white">
                                                        {{ friend.name.charAt(0) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-xl font-semibold text-gray-900 hover:text-blue-600 transition-colors duration-300">
                                                {{ friend.name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                Joined {{ formatDate(friend.created_at) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium transform hover:scale-105 transition-transform duration-300">
                                            {{ friend.grade_level }} Student
                                        </div>
                                    </div>
                                    <div class="mt-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 hover:shadow-md transition-all duration-300">
                                        <p class="text-gray-800 leading-relaxed">{{ friend.introduction_content }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button @click="prevSlide" 
                        class="absolute top-1/2 -translate-y-1/2 -left-4 z-30 flex items-center justify-center h-12 w-12 cursor-pointer group focus:outline-none">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 group-hover:bg-white group-focus:ring-4 group-focus:ring-blue-300 group-focus:outline-none shadow-lg">
                        <svg class="w-4 h-4 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </span>
                </button>
                <button @click="nextSlide" 
                        class="absolute top-1/2 -translate-y-1/2 -right-4 z-30 flex items-center justify-center h-12 w-12 cursor-pointer group focus:outline-none">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 group-hover:bg-white group-focus:ring-4 group-focus:ring-blue-300 group-focus:outline-none shadow-lg">
                        <svg class="w-4 h-4 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </span>
                </button>

                <!-- Carousel Indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button 
                        v-for="(_, index) in slideCount" 
                        :key="index"
                        @click="goToSlide(index)"
                        :class="[
                            'w-3 h-3 rounded-full transition-all duration-300',
                            currentSlide === index ? 'bg-blue-600' : 'bg-gray-300'
                        ]"
                        :aria-current="currentSlide === index"
                        :aria-label="'Slide ' + (index + 1)">
                    </button>
                </div>
            </div>
        </main>
        <Footer />
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    friends: {
        type: Array,
        required: true,
    },
});

// Carousel State
const currentSlide = ref(0);
const viewportWidth = ref(window.innerWidth);

// Responsive itemsPerSlide
const itemsPerSlide = computed(() => {
    if (viewportWidth.value < 640) return 1; // mobile
    if (viewportWidth.value < 1024) return 2; // tablet
    return 3; // desktop
});

const slideCount = computed(() => Math.ceil(props.friends.length / itemsPerSlide.value));

const currentMonthYear = computed(() => {
    const now = new Date();
    return new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(now);
});

// Methods
const nextSlide = () => {
    if (currentSlide.value < slideCount.value - 1) {
        currentSlide.value++;
    } else {
        currentSlide.value = 0;
    }
};

const prevSlide = () => {
    if (currentSlide.value > 0) {
        currentSlide.value--;
    } else {
        currentSlide.value = slideCount.value - 1;
    }
};

const goToSlide = (index) => {
    currentSlide.value = index;
};

const formatDate = (date) => {
    return new Intl.DateTimeFormat('en-US', { 
        month: 'short',
        day: 'numeric',
        year: 'numeric'
    }).format(new Date(date));
};

// Handle resize
const handleResize = () => {
    viewportWidth.value = window.innerWidth;
    // Ensure current slide is valid after resize
    if (currentSlide.value >= slideCount.value) {
        currentSlide.value = Math.max(0, slideCount.value - 1);
    }
};

onMounted(() => {
    window.addEventListener('resize', handleResize);
});
</script>

<style scoped>
/* Base Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideDown {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Animation Classes */
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-slide-down {
    animation: slideDown 0.8s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out;
}

/* Friend List Transitions */
.friend-list-enter-active,
.friend-list-leave-active {
    transition: all 0.5s ease;
}

.friend-list-enter-from,
.friend-list-leave-to {
    opacity: 0;
    transform: translateY(30px);
}

/* Card Hover Effects */
.friend-card {
    backface-visibility: hidden;
    transform: translateZ(0);
    -webkit-font-smoothing: subpixel-antialiased;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.carousel-slide-enter-active,
.carousel-slide-leave-active {
    transition: all 0.75s ease-in-out;
}

.carousel-slide-enter-from {
    opacity: 0;
    transform: translateX(50px);
}

.carousel-slide-leave-to {
    opacity: 0;
    transform: translateX(-50px);
}
</style>