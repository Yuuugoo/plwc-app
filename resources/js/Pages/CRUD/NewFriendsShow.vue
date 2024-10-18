<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    friend: {
        type: Object,
        required: true,
    },
});

const imageError = ref(false);

function handleImageError() {
    imageError.value = true;
}

function getImageUrl(path) {
    if (path.startsWith('http://') || path.startsWith('https://')) {
        return path;
    }
    return `/storage/${path}`;
}
</script>

<template>
    <Head title="Friend Introduction" />
    <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
        <LandingPageNav :canLogin="canLogin" />
        <main class="container mx-auto px-4 py-32 max-w-6xl">
            <div class="relative">
                <div class="relative bg-white rounded-2xl shadow-xl p-8 backdrop-blur-sm backdrop-filter">
                    <div class="flex flex-col lg:flex-row gap-12 items-center">
                        <!-- Profile Section -->
                        <div class="lg:w-1/3 flex flex-col items-center space-y-4">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-200 to-purple-200 rounded-full blur-md"></div>
                                <img
                                    v-if="!imageError"
                                    :src="getImageUrl(friend.friend_avatar)"
                                    :alt="friend.name"
                                    class="relative w-64 h-64 object-cover rounded-full ring-4 ring-white shadow-lg"
                                    @error="handleImageError"
                                >
                                <div
                                    v-else
                                    class="relative w-64 h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full ring-4 ring-white shadow-lg flex items-center justify-center"
                                >
                                    <span class="text-gray-400 text-lg font-medium">No Image</span>
                                </div>
                            </div>
                            <div class="text-center">
                                <h2 class="text-2xl font-bold text-gray-800">{{ friend.name }}</h2>
                                <span class="inline-block px-4 py-1 mt-2 bg-blue-50 text-blue-600 rounded-full text-sm font-medium">
                                    New Burger Friend
                                </span>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="lg:w-2/3 space-y-6">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold allura-font text-gray-900 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                    Welcome to PLWC!
                                </h1>
                                <p class="text-lg text-gray-00">
                                    Joined {{ new Date(friend.created_at).toLocaleDateString() }} • {{ friend.grade_level }} Student
                                </p>
                            </div>

                            <div class="prose prose-lg max-w-none">
                                <div class="bg-blue-50 rounded-lg p-6 mb-6">
                                    <p class="text-gray-800">{{ friend.introduction_content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <Footer />
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

:root {
    font-family: 'Inter', sans-serif;
}

.prose {
    max-width: 65ch;
}
.allura-font {
    font-family: 'Allura', cursive;
}

</style>