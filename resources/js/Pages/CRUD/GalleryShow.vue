<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    events: {
        type: Object,
        required: true,
    },
});

console.log(props.events);

const selectedCategory = ref('all');
const selectedGroup = ref('');

const groupNames = computed(() => {
    const groups = new Set();
    props.events.event_images.forEach(image => {
        if (image.group && image.group !== 'Main Event') {
            groups.add(image.group);
        }
    });
    return Array.from(groups);
});

const showAllPhotos = () => {
    selectedCategory.value = 'all';
    selectedGroup.value = '';
};

const showEventsPhotos = () => {
    selectedCategory.value = 'events';
    selectedGroup.value = '';
};

const showGroupButtons = () => {
    selectedCategory.value = 'churchGroups';
    selectedGroup.value = ''; 
};

const filterByGroup = (group) => {
    selectedGroup.value = group;
};

const filteredImages = computed(() => {
    if (selectedCategory.value === 'churchGroups' && selectedGroup.value) {
        return props.events.event_images.filter(image => image.group === selectedGroup.value);
    } else if (selectedCategory.value === 'events') {
        return props.events.event_images.filter(image => image.group === 'Main Event');
    }
    return props.events.event_images;
});
</script>

<template>
    <Head :title="props.events.event_name + ' Gallery'" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center h-full">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16"> 
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl dark:text-white allura-font">
                        {{ props.events.event_name }}
                    </h1>
                    <p class="mb-2 text-lg font-normal text-gray-650 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                        {{ props.events.event_description }}
                    </p>
                </div>
            </section>
            <section class="flex justify-center items-center min-h-screen mt-2 mb-10">
                <div class="w-3/4 px-10 py-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                        <button 
                            @click="showAllPhotos" 
                            type="button" 
                            :class="[
                                'border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800', 
                                selectedCategory === 'all' ? 'bg-blue-700 text-white' : 'bg-white text-blue-700 hover:text-white dark:bg-gray-900 dark:text-blue-500 dark:hover:text-white'
                            ]"
                        >
                            All Photos
                        </button>

                        <button 
                            @click="showEventsPhotos" 
                            type="button" 
                            :class="[
                                'border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800', 
                                selectedCategory === 'events' ? 'bg-blue-700 text-white' : 'bg-white text-blue-700 hover:text-white dark:bg-gray-900 dark:text-blue-500 dark:hover:text-white'
                            ]"
                        >
                            Main Events Photos
                        </button>

                        <button 
                            @click="showGroupButtons" 
                            type="button" 
                            :class="[
                                'border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800',  
                                selectedCategory === 'churchGroups' ? 'bg-blue-700 text-white' : 'bg-white text-blue-700 hover:text-white dark:bg-gray-900 dark:text-blue-500 dark:hover:text-white'
                            ]"
                        >
                            Per Groups Photos
                        </button>
                    </div>
                    <div v-if="selectedCategory === 'churchGroups'" class="flex flex-wrap justify-center mt-0">
                        <h3 class="w-full text-lg font-semibold text-gray-900 dark:text-white mb-2">Filters:</h3>
                        <div v-for="group in groupNames" :key="group" class="me-3 mb-3">
                            <button 
                                @click="filterByGroup(group)" 
                                type="button" 
                                :class="[
                                    'border hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center dark:hover:bg-blue-500 dark:focus:ring-blue-800',
                                    selectedGroup === group ? 'bg-blue-700 text-white border-blue-600' : 'bg-white text-gray-900 border-white hover:text-white dark:bg-gray-900 dark:text-white dark:border-gray-900 dark:hover:border-gray-700'
                                ]"
                            >
                                {{ group }} Photos
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                        <div v-for="image in filteredImages" :key="image.id">
                            <img class="h-auto max-w-full rounded-lg" :src="image.image_path" :alt="'Image from ' + image.group">
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