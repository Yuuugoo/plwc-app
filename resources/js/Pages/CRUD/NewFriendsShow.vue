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
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center h-full">
                <div class="mt-48 mb-48 py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl allura-font">
                        New Burger Friend
                    </h1>
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="w-1/2 text-justify ">
                            <p class="mb-4 text-xl font-normal text-gray-700 allura-font">
                                {{ friend.name }} is a {{ friend.grade_level }} student who joined our community on {{ new Date(friend.created_at).toLocaleDateString() }}. 
                            </p>
                            <p class="mb-4 text-black">
                                {{ friend.introduction_content }}
                            </p>
                            <p class="mb-4 text-gray-800">
                                Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor.
                            </p>
                            <p class="mb-4  text-gray-800">
                                Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus tortor.
                            </p>
                        </div>
                        <div class="md:w-1/3 flex flex-col items-center">
                            <img 
                                v-if="!imageError"
                                :src="getImageUrl(friend.friend_avatar)" 
                                :alt="friend.name" 
                                class="w-48 h-48 object-cover rounded mb-4"
                                @error="handleImageError"
                            >
                            <div 
                                v-else 
                                class="w-48 h-48 bg-gray-200 rounded-full mb-4 flex items-center justify-center text-gray-500"
                            >
                                No Image
                            </div>
                            <p class="text-lg font-semibold text-gray-800">{{ friend.name }}</p>
                            <p class="text-sm text-gray-600">New Burger Friend</p>
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