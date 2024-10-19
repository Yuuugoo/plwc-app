<script setup>
import { ref, computed } from 'vue';
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

const selectedEventType = ref('All');


const eventTypes = computed(() => {
    const types = new Set(props.events.map(event => event.event_type));
    return ['All', ...Array.from(types)];
});

const filteredEvents = computed(() => {
    if (selectedEventType.value === 'All') {
        return props.events;
    }
    return props.events.filter(event => event.event_type === selectedEventType.value);
});

const parseImageUrls = (imageUrlString) => {
    try {
        const jsonPart = imageUrlString.match(/(?<=\/storage\/)(.*)/)[0];
        return JSON.parse(jsonPart.replace(/\\/g, ''));
    } catch (e) {
        console.error("Error parsing image_url:", e);
        return [];
    }
};

const getDisplayImages = (event) => {
    const images = parseImageUrls(event.image_url);
    return images.slice(0, 4).map(src => `/storage/${src}`);
};

const getAdditionalImagesCount = (event) => {
    const images = parseImageUrls(event.image_url);
    return Math.max(0, images.length - 4);
};
</script>

<template>
    <Head title="Church Gallery" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        
        <!-- Hero Section with Parallax Effect -->
        <div class="relative h-[70vh] overflow-hidden">
            <div class="absolute inset-0 bg-cloud-bg bg-cover bg-center bg-fixed"></div>
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative flex items-center justify-center h-full text-center px-4">
                <div class="max-w-4xl">
                    <h1 class="mb-6 text-6xl font-extrabold text-white allura-font animate-fade-in">
                        Moments of Faith and Fellowship
                    </h1>
                    <p class="text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed animate-fade-in-delayed">
                        "not giving up meeting together, as some are in the habit of doing, but encouraging one another—and all the more as you see the Day approaching."
                    </p>
                    <p class="text-lg text-gray-300 mt-2 animate-fade-in-delayed">
                        [Hebrews 10:25]
                    </p>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="bg-gray-50 min-h-screen py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Filter Buttons -->
                <div class="flex items-center justify-center space-x-2 mb-12 overflow-x-auto pb-4">
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

                <!-- Gallery Grid -->
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
                                    class="relative overflow-hidden"
                                >
                                    <img 
                                        :src="image" 
                                        :alt="'Image from ' + event.event_name"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        :style="getDisplayImages(event).length === 1 ? 'aspect-ratio: 4/3;' : 'aspect-ratio: 1/1;'"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Event Info Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-xl font-semibold mb-1">{{ event.event_name }}</h3>
                            <div class="flex items-center space-x-2 text-sm opacity-80">
                                <Camera class="w-4 h-4" />
                                <span>{{ event.event_type }}</span>
                                <span v-if="getAdditionalImagesCount(event) > 0" class="ml-2">
                                    +{{ getAdditionalImagesCount(event) }} more
                                </span>
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
.allura-font {
    font-family: 'Allura', cursive;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
}

.animate-fade-in-delayed {
    animation: fadeIn 0.8s ease-out 0.2s forwards;
    opacity: 0;
}
</style>