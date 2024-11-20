<script setup>
import { ref, computed, watch } from 'vue';
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

const selectedCategory = ref('all');
const selectedGroup = ref('');
const currentPage = ref(1);
const imagesPerPage = 12; 
const loadingImages = ref(new Set());
const imageObserver = ref(null);

onMounted(() => {
    imageObserver.value = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (!loadingImages.value.has(img.dataset.src)) {
                    img.src = img.dataset.src;
                    loadingImages.value.add(img.dataset.src);
                }
                imageObserver.value.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px',
        threshold: 0.1
    });
});

onUnmounted(() => {
    if (imageObserver.value) {
        imageObserver.value.disconnect();
    }
});

const groupNames = computed(() => {
    const groups = new Set();
    props.events.event_images.forEach(image => {
        if (image.group && !['SportsFest', 'Dance Competition'].includes(image.group)) {
            groups.add(image.group);
        }
    });
    return Array.from(groups);
});

// Memoized filtering function
const filteredImages = computed(() => {
    let images = [];
    if (selectedCategory.value === 'churchGroups' && selectedGroup.value) {
        images = props.events.event_images.filter(image => image.group === selectedGroup.value);
    } else if (selectedCategory.value === 'sportsFest') {
        images = props.events.event_images.filter(image => image.group === 'Sports Fest');
    } else if (selectedCategory.value === 'danceCompetition') {
        images = props.events.event_images.filter(image => image.group === 'Dance Competition');
    } else {
        images = props.events.event_images;
    }
    return images;
});

// Optimized pagination
const paginatedImages = computed(() => {
    const start = (currentPage.value - 1) * imagesPerPage;
    const end = start + imagesPerPage;
    return filteredImages.value.slice(start, end);
});

const totalPages = computed(() => Math.ceil(filteredImages.value.length / imagesPerPage));

const pageNumbers = computed(() => {
    const pages = [];
    for (let i = 1; i <= totalPages.value; i++) {
        pages.push(i);
    }
    return pages;
});

// Event handlers with debouncing
const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
};

const handleImageLoad = (imagePath) => {
    loadingImages.value.add(imagePath);
};

// Reset pagination on filter change
watch([selectedCategory, selectedGroup], () => {
    currentPage.value = 1;
});
</script>

<template>
    <Head :title="props.events.event_name + ' Gallery'" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="relative min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <!-- Hero Section -->
            <section class="flex justify-center items-center h-full">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl allura-font">
                        {{ props.events.event_name }}
                    </h1>
                    <p class="mb-2 text-lg font-normal text-gray-650 lg:text-xl sm:px-16 lg:px-48">
                        {{ props.events.event_description }}
                    </p>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="flex justify-center items-center min-h-screen mt-2 mb-10">
                <div class="w-3/4 px-10 py-10 bg-white border border-gray-200 rounded-lg shadow">
                    <!-- Filter Buttons -->
                    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                        <button 
                            v-for="(label, category) in {
                                all: 'All Photos',
                                sportsFest: 'Sports Fest Photos',
                                danceCompetition: 'Dance Competition Photos',
                                churchGroups: 'Per Groups Photos'
                            }"
                            :key="category"
                            @click="() => {
                                selectedCategory = category;
                                selectedGroup = '';
                            }"
                            :class="[
                                'border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3',
                                selectedCategory === category ? 'bg-blue-700 text-white' : 'bg-white text-blue-700 hover:text-white'
                            ]"
                        >
                            {{ label }}
                        </button>
                    </div>

                    <!-- Group Filters -->
                    <div v-if="selectedCategory === 'churchGroups'" class="flex flex-wrap justify-center mt-0">
                        <h3 class="w-full text-lg font-semibold text-gray-900 mb-2">Filters:</h3>
                        <div v-for="group in groupNames" :key="group" class="me-3 mb-3">
                            <button 
                                @click="() => filterByGroup(group)"
                                :class="[
                                    'border hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center',
                                    selectedGroup === group ? 'bg-blue-700 text-white border-blue-600' : 'bg-white text-gray-900 border-white hover:text-white'
                                ]"
                            >
                                {{ group }} Photos
                            </button>
                        </div>
                    </div>

                    <!-- Image Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                        <div v-for="image in paginatedImages" :key="image.id" class="aspect-w-1 aspect-h-1">
                            <img 
                                :data-src="image.image_path"
                                :alt="'Image from ' + image.group"
                                class="h-auto max-w-full rounded-lg object-cover w-full transition-opacity duration-300"
                                loading="lazy"
                                :class="{ 'opacity-0': !loadingImages.has(image.image_path) }"
                                @load="handleImageLoad(image.image_path)"
                            >
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav v-if="totalPages > 1" aria-label="Page navigation" class="flex justify-center mt-6">
                        <ul class="inline-flex -space-x-px text-sm">
                            <li>
                                <button
                                    @click="changePage(currentPage - 1)"
                                    :disabled="currentPage === 1"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Previous
                                </button>
                            </li>
                            <li v-for="page in pageNumbers" :key="page">
                                <button
                                    @click="changePage(page)"
                                    class="flex items-center justify-center px-3 h-8 leading-tight border"
                                    :class="[
                                        currentPage === page
                                            ? 'text-blue-600 border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'
                                            : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700'
                                    ]"
                                >
                                    {{ page }}
                                </button>
                            </li>
                            <li>
                                <button
                                    @click="changePage(currentPage + 1)"
                                    :disabled="currentPage === totalPages"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Next
                                </button>
                            </li>
                        </ul>
                    </nav>
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

/* Performance optimizations */
img {
    will-change: transform, opacity;
    backface-visibility: hidden;
}

.aspect-w-1 {
    position: relative;
    padding-bottom: 100%;
}

.aspect-w-1 img {
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    object-fit: cover;
}
</style>