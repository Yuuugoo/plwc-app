<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';
import { ref, onMounted } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});

const activeTab = ref('timeline');
const selectedEra = ref(null);
const activeImage = ref(null);

const galleryImages = ref([
    {
        era: '2010',
        images: [
            { url: '/api/placeholder/800/600', caption: 'First Church Building, 2010', alt: 'Historical church building' },
            { url: '/api/placeholder/800/600', caption: 'Sample Milestone Event, 2010', alt: 'Sample Milestone Event' },
            { url: '/api/placeholder/800/600', caption: 'First Choir Group, 2010', alt: 'Church choir' },
        ]
    },
    {
        era: 'Pandemic',
        images: [
            { url: '/api/placeholder/800/600', caption: 'New Sanctuary Construction, 2020', alt: 'Online Worship' },
            { url: '/api/placeholder/800/600', caption: 'Youth Group Formation, 2021', alt: 'Youth group' },
            { url: '/api/placeholder/800/600', caption: 'First Mission Trip, 2020', alt: 'Mission trip' },
        ]
    },
    {
        era: 'Current',
        images: [
            { url: '/api/placeholder/800/600', caption: 'Community Center Opening, 2010', alt: 'Community center' },
            { url: '/api/placeholder/800/600', caption: 'Modern Worship Service, 2020', alt: 'Modern worship' },
            { url: '/api/placeholder/800/600', caption: 'Church Today, 2024', alt: 'Current church' },
        ]
    }
]);

const milestones = ref([
    {
        era: '2010',
        title: 'Sample Timeline 1',
        period: '2010',
        description: 'Sample Description 1',
        details: [
            { year: 2010, event: 'Sample ASDASD' },
            { year: 2011, event: 'Sample dADad' },
            { year: 2012, event: 'Sample ASDASD' }
        ]
    },

    {
        era: '2015',
        title: 'Sample Title 2',
        period: '2020-2022',
        description: 'Sample Description 2.',
        details: [
            { year: 2020, event: 'ASDASDzxcasd' },
            { year: 2021, event: 'Casdasd asdas' },
            { year: 2022, event: 'sasdasd n' }
        ]
    },

]);

const showEraDetails = (era) => {
    selectedEra.value = selectedEra.value === era ? null : era;
};

const openImage = (image) => {
    activeImage.value = image;
};

const closeImage = () => {
    activeImage.value = null;
};
</script>

<template>
    <Head title="Our Church History" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center h-full">
                <div class="mt-24 mb-8 py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl 
                             animate-fade-in">
                        A Legacy of Faith Since 2010
                    </h1>
                    <p class="mb-8 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 lg:px-48 
                             animate-slide-up">
                        From humble beginnings to a thriving community of believers, our journey spans over six decades of God's faithfulness and grace.
                    </p>
                    
                    <!-- Interactive Navigation Tabs -->
                    <div class="flex justify-center space-x-4 mb-8">
                        <button 
                            @click="activeTab = 'timeline'"
                            :class="['px-6 py-2 rounded-full transition-all duration-300 transform hover:scale-105',
                                activeTab === 'timeline' 
                                    ? 'bg-blue-600 text-white' 
                                    : 'bg-gray-200 text-gray-700 hover:bg-gray-300']">
                            Timeline
                        </button>
                        <button 
                            @click="activeTab = 'gallery'"
                            :class="['px-6 py-2 rounded-full transition-all duration-300 transform hover:scale-105',
                                activeTab === 'gallery' 
                                    ? 'bg-blue-600 text-white' 
                                    : 'bg-gray-200 text-gray-700 hover:bg-gray-300']">
                            Photo Gallery
                        </button>
                    </div>
                </div>
            </section>

            <!-- Main Content Section -->
            <section class="py-16 px-4">
                <div class="max-w-6xl mx-auto">
                    <!-- Timeline View -->
                    <div v-if="activeTab === 'timeline'" 
                         class="space-y-8 animate-fade-in">
                        <div v-for="milestone in milestones" :key="milestone.era" 
                            class="bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-500 hover:shadow-xl
                                   transform hover:-translate-y-1">
                            <div @click="showEraDetails(milestone.era)" 
                                class="p-8 cursor-pointer">
                                <div class="flex flex-col md:flex-row gap-8">
                                    <div class="md:w-1/3">
                                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ milestone.title }}</h3>
                                        <p class="text-xl font-semibold text-blue-600">{{ milestone.period }}</p>
                                    </div>
                                    <div class="md:w-2/3">
                                        <p class="text-gray-600 mb-4">{{ milestone.description }}</p>
                                    </div>
                                </div>
                                
                                <!-- Expandable Details with Animation -->
                                <div v-if="selectedEra === milestone.era" 
                                    class="mt-6 border-t pt-6 animate-slide-down">
                                    <h4 class="text-lg font-semibold mb-4">Key Events:</h4>
                                    <div class="space-y-4">
                                        <div v-for="detail in milestone.details" :key="detail.year"
                                            class="flex items-center space-x-4 p-2 hover:bg-gray-50 rounded
                                                   transition-all duration-300 transform hover:translate-x-2">
                                            <span class="text-blue-600 font-semibold">{{ detail.year }}</span>
                                            <span class="text-gray-700">{{ detail.event }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Gallery View -->
                    <div v-else class="animate-fade-in">
                        <div v-for="era in galleryImages" :key="era.era" class="mb-12">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">{{ era.era }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div v-for="image in era.images" :key="image.caption"
                                     @click="openImage(image)"
                                     class="group relative overflow-hidden rounded-lg shadow-lg cursor-pointer
                                            transform transition-all duration-300 hover:scale-105">
                                    <img :src="image.url" :alt="image.alt" 
                                         class="w-full h-64 object-cover" />
                                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4
                                                opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-sm">{{ image.caption }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Modal -->
                    <div v-if="activeImage" 
                         class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center
                                animate-fade-in"
                         @click="closeImage">
                        <div class="max-w-4xl mx-auto p-4">
                            <img :src="activeImage.url" :alt="activeImage.alt" 
                                 class="max-h-[80vh] w-auto" />
                            <p class="text-white text-center mt-4">{{ activeImage.caption }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <Footer />
    </div>
</template>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in;
}

.animate-slide-up {
    animation: slideUp 0.5s ease-out;
}

.animate-slide-down {
    animation: slideDown 0.3s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes slideDown {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
</style>