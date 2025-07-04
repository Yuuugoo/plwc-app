<script setup>
import { ref, computed, onMounted, onUnmounted, shallowRef } from 'vue';
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

const props = defineProps({
    canLogin: Boolean,
    events: {
        type: Array,
        required: true,
    },
});

// Use shallowRef for large datasets that don't need deep reactivity
const selectedEventType = shallowRef('All');
const selectedYear = shallowRef('All');
const showModal = ref(false);
const showImageViewer = ref(false);
const selectedEvent = shallowRef(null);
const currentImageIndex = ref(0);

// Memoize event processing
const processedEvents = computed(() => {
    return props.events.map(event => {
        const date = new Date(event.created_at);
        return {
            ...event,
            year: !isNaN(date.getTime()) ? date.getFullYear().toString() : null,
            processedImages: parseImageUrls(event.image_url),
        };
    });
});

// Optimize unique values computation
const eventTypes = computed(() => {
    const types = new Set();
    for (const event of props.events) {
        types.add(event.event_type);
    }
    return ['All', ...Array.from(types)];
});

const eventYears = computed(() => {
    const years = new Set();
    for (const event of processedEvents.value) {
        if (event.year) years.add(event.year);
    }
    return ['All', ...Array.from(years).sort((a, b) => b.localeCompare(a))];
});

// Optimize filtering with memoization
const filteredEvents = computed(() => {
    if (selectedEventType.value === 'All' && selectedYear.value === 'All') {
        return processedEvents.value;
    }
    
    return processedEvents.value.filter(event => {
        const matchesType = selectedEventType.value === 'All' || event.event_type === selectedEventType.value;
        const matchesYear = selectedYear.value === 'All' || event.year === selectedYear.value;
        return matchesType && matchesYear;
    });
});

// Optimize image URL parsing
function parseImageUrls(imageUrlString) {
    try {
        const cached = imageUrlsCache.get(imageUrlString);
        if (cached) return cached;
        
        const jsonPart = imageUrlString.match(/(?<=\/storage\/)(.*)/)[0];
        const result = JSON.parse(jsonPart.replace(/\\/g, ''));
        imageUrlsCache.set(imageUrlString, result);
        return result;
    } catch (e) {
        console.error("Error parsing image_url:", e);
        return [];
    }
}
const imageUrlsCache = new Map();

// Optimize display images calculation
const getDisplayImages = (event) => {
    return event.processedImages.slice(0, 4).map(src => `/storage/${src}`);
};

const getAdditionalImagesCount = (event) => {
    return Math.max(0, event.processedImages.length - 4);
};

// Modal handling with loading optimization
const openEventModal = (event) => {
    selectedEvent.value = event;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    selectedEvent.value = null;
};

const openImageViewer = (event, index) => {
    selectedEvent.value = event;
    currentImageIndex.value = index;
    showImageViewer.value = true;
};

const closeImageViewer = () => {
    showImageViewer.value = false;
    currentImageIndex.value = 0;
};

// Optimize image navigation
const nextImage = () => {
    if (!selectedEvent.value) return;
    const images = selectedEvent.value.processedImages;
    currentImageIndex.value = (currentImageIndex.value + 1) % images.length;
};

const previousImage = () => {
    if (!selectedEvent.value) return;
    const images = selectedEvent.value.processedImages;
    currentImageIndex.value = (currentImageIndex.value - 1 + images.length) % images.length;
};

// Optimize event listeners
let keydownHandler;
onMounted(() => {
    keydownHandler = (e) => {
        if (showImageViewer.value) {
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') previousImage();
            if (e.key === 'Escape') closeImageViewer();
        }
        if (showModal.value && e.key === 'Escape') {
            closeModal();
        }
    };
    window.addEventListener('keydown', keydownHandler);
});

onUnmounted(() => {
    if (keydownHandler) {
        window.removeEventListener('keydown', keydownHandler);
    }
});
</script>

<template>
    <Head title="Church Gallery" />
    
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        
        <!-- Hero Section -->
        <div class="relative h-[70vh] overflow-hidden">
            <div class="absolute inset-0 bg-cloud-bg bg-cover bg-center bg-fixed"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative flex items-center justify-center h-full text-center px-4">
                <div class="max-w-4xl lg:mt-48 mt-28">
                    <h1 class="mb-6 text-6xl font-extrabold text-white allura-font animate-fade-in">
                        {{ $t('gallery.hero-title') }}
                    </h1>
                    <p class="text-xl font-medium text-gray-200 max-w-2xl mx-auto leading-relaxed animate-fade-in-delayed">
                        {{ $t('gallery.hero-description') }}
                    </p>
                    <p class="text-lg font-medium text-gray-300 mt-2 animate-fade-in-delayed">
                        Hebrews 10:24-25
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 min-h-screen py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Filters -->
                <div class="flex flex-col items-center justify-center space-y-6 mb-12">
                    <div class="flex items-center justify-center space-x-2 overflow-x-auto pb-4 w-full">
                        <button 
                            v-for="type in eventTypes"
                            :key="type"
                            @click="selectedEventType = type" 
                            class="transition-all duration-300 ease-in-out px-6 py-2.5 rounded-full text-sm font-medium"
                            :class="[
                                selectedEventType === type 
                                    ? 'bg-blue-600 text-white shadow-lg scale-105' 
                                    : 'bg-white text-gray-700 hover:bg-gray-100 hover:scale-105'
                            ]"
                        >
                            {{ type }}
                        </button>
                    </div>

                    <div class="relative w-48">
                        <select
                            v-model="selectedYear"
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none cursor-pointer"
                        >
                            <option 
                                v-for="year in eventYears" 
                                :key="year"
                                :value="year"
                            >
                                {{ year === 'All' ? 'All Years' : year }}
                            </option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Optimized Gallery Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div 
                        v-for="event in filteredEvents" 
                        :key="event.id"
                        class="group relative bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden"
                    >
                        <div class="aspect-[4/3] overflow-hidden">
                            <div :class="{'grid grid-cols-2 gap-1': getDisplayImages(event).length > 1, 'w-full': getDisplayImages(event).length === 1}">
                                <div 
                                    v-for="(image, index) in getDisplayImages(event)" 
                                    :key="index"
                                    :class="{'col-span-2': getDisplayImages(event).length === 1}"
                                    class="relative overflow-hidden cursor-pointer"
                                    @click.stop="openEventModal(event)"
                                >
                                    <img 
                                        :src="image" 
                                        :alt="'Image from ' + event.event_name"
                                        loading="lazy"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        :style="getDisplayImages(event).length === 1 ? 'aspect-ratio: 4/3;' : 'aspect-ratio: 1/1;'"
                                    >
                                    <div class="absolute inset-0 bg-black/0 hover:bg-black/20 transition-colors duration-300"></div>
                                </div>
                            </div>
                        </div>

                        <div 
                            @click="openEventModal(event)"
                            class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-300 cursor-pointer"
                        >
                            <h3 class="text-xl font-semibold mb-1">{{ event.event_name }}</h3>
                            <div class="flex items-center space-x-2 text-sm opacity-80">
                                <span>{{ event.event_type }}</span>
                                <span>• {{ event.year }}</span>
                                <span v-if="getAdditionalImagesCount(event) > 0" class="ml-2">
                                    +{{ getAdditionalImagesCount(event) }} more photos
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Modal -->
        <div 
            v-if="showModal" 
            class="fixed inset-0 bg-black/50 flex items-center justify-center z-40"
            @click.self="closeModal"
        >
            <div class="bg-white p-6 rounded-lg max-w-4xl w-full mx-4 relative">
                <button 
                    @click="closeModal" 
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl"
                >
                    ×
                </button>
                
                <h3 class="text-2xl font-bold mb-2">{{ selectedEvent?.event_name }}</h3>
                <p class="text-sm text-gray-600 mb-6">{{ selectedEvent?.event_description }}</p>
                
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-4">
                    <div 
                        v-for="(image, index) in parseImageUrls(selectedEvent?.image_url)" 
                        :key="index"
                        class="relative aspect-square cursor-pointer group"
                        @click="openImageViewer(selectedEvent, index)"
                    >
                        <img 
                            :src="`/storage/${image}`" 
                            :alt="'Image from ' + selectedEvent?.event_name" 
                            class="w-full h-full object-cover rounded-lg transition-transform duration-300 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>

        <div 
            v-if="showImageViewer" 
            class="fixed inset-0 bg-black/90 flex items-center justify-center z-50"
            @click.self="closeImageViewer"
        >
            <div class="relative w-full h-full flex items-center justify-center">
                <button 
                    @click="closeImageViewer"
                    class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-50 text-4xl"
                >
                    ×
                </button>

                <button 
                    @click.stop="previousImage"
                    class="absolute left-4 text-white hover:text-gray-300 transition-colors text-6xl"
                >
                    ‹
                </button>
                <button 
                    @click.stop="nextImage"
                    class="absolute right-4 text-white hover:text-gray-300 transition-colors text-6xl"
                >
                    ›
                </button>

                <div class="w-full h-full p-8 flex items-center justify-center">
                    <img 
                        :src="`/storage/${parseImageUrls(selectedEvent?.image_url)[currentImageIndex]}`"
                        :alt="selectedEvent?.event_name"
                        class="max-h-full max-w-full object-contain"
                    >
                </div>

                <div class="absolute bottom-4 left-0 right-0 text-center text-white">
                    {{ currentImageIndex + 1 }} / {{ parseImageUrls(selectedEvent?.image_url).length }}
                </div>
            </div>
        </div>
        
        <Footer />
    </div>
</template>

<style scoped>
@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
}

.animate-fade-in-delayed {
    animation: fadeIn 0.8s ease-out 0.2s forwards;
    opacity: 0;
}

.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}

img {
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}
</style>