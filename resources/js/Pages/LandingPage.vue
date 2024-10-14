<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';
import { Link } from '@inertiajs/vue3';
import FriendsCard from '@/Components/FriendsCard.vue';
import { ref, onMounted } from 'vue';

const props = defineProps({
    canLogin: Boolean,
    friends: {
        type: Array,
        required: true
    },
});


const isVisible = ref(false);
const cardRef = ref(null);

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                isVisible.value = true;
            } else {
                isVisible.value = false;
            }
        });
    });
    if (cardRef.value) {
        observer.observe(cardRef.value);
    }
});
</script>


<template>
    <Head title="Home" />
    <div class="flex-grow flex-col min-h-screen overflow-hidden">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center h-full">
                <div class="mt-32 mb-36 py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16"> 
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-7xl dark:text-white allura-font">
                        REVIVAL 30-200
                    </h1>
                    <h1 class="mb-8 text-3xl font-semibold tracking-tight leading-none text-gray-750 md:text-2xl lg:text-4xl dark:text-white allura-font">
                        30 Groups, 200 Disciples
                    </h1>
                    <p class="mb-8 text-lg font-normal text-gray-650 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                        “‘If you can’?” said Jesus. “Everything is possible for one who believes.”.<br>[Mark 9:23]
                    </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                        <Link :href="route('about')" :active="route().current('about')" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Learn More
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </Link>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex justify-end mr-10 h-full">
                    <div
                        ref="cardRef"
                        class="max-w-sm p-10 w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 transition-transform duration-1000 ease-out"
                        :class="{ 'translate-x-0 opacity-100': isVisible, 'translate-x-full opacity-0': !isVisible }"
                    >
                        <h5 class="text-center mb-5 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">New Burger Friends</h5>
                        <FriendsCard :friends="friends" />
                        
                    </div>
                </div>
            </section>
            
            <section>
                <div class="h-screen">

                </div>
            </section>
            
            <Footer />
        </div>
    </div>
</template>

<style scoped>
.allura-font {
    font-family: 'Allura', cursive;
}
</style>