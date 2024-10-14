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
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center h-full">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl dark:text-white allura-font">
                        Moments of Faith and Fellowship
                    </h1>
                    <p class="mb-2 text-lg font-normal text-gray-650 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                        "not giving up meeting together, as some are in the habit of doing, but encouraging one another—and all the more as you see the Day approaching." <br>[Hebrews 10:25]
                    </p>
                </div>
            </section>
            <section class="flex justify-center items-center min-h-screen mt-2 mb-10">
                <div class="w-3/4 px-10 py-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                        <button 
                            v-for="type in eventTypes"
                            :key="type"
                            @click="selectedEventType = type" 
                            type="button" 
                            :class="[
                                'border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800',
                                selectedEventType === type 
                                    ? 'bg-blue-700 text-white' 
                                    : 'bg-white text-blue-700 hover:text-white dark:bg-gray-900 dark:text-blue-500 dark:hover:text-white'
                            ]"
                        >
                            {{ type }}
                        </button>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                        <div v-for="event in filteredEvents" :key="event.id" class="flex flex-col items-center">
                            <div :class="{'grid grid-cols-2 gap-2': getDisplayImages(event).length > 1, 'w-full': getDisplayImages(event).length === 1}">
                                <div v-for="(image, index) in getDisplayImages(event)" :key="index" 
                                    :class="{'col-span-2': getDisplayImages(event).length === 1}">
                                    <img class="h-auto w-full rounded-lg object-cover" 
                                         :src="image" 
                                         :alt="'Image from ' + event.event_name"
                                         :style="getDisplayImages(event).length === 1 ? 'height: 300px;' : 'height: 150px;'">
                                </div>
                            </div>
                            <div v-if="getAdditionalImagesCount(event) > 0" class="text-sm text-gray-500 mt-2">
                                +{{ getAdditionalImagesCount(event) }} more
                            </div>
                            <div class="mt-2 text-center font-semibold text-gray-900 dark:text-white">
                                {{ event.event_name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ event.event_type }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <Footer />
    </div>
</template>

<style scoped>
.allura-font {
    font-family: 'Allura', cursive;
}
</style>