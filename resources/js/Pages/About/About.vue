<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="About Us" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />


        <div class="relative min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 opacity-70"></div>
            
            <section class="relative flex flex-col justify-center items-center h-full text-white">
                <div class="mt-48 mb-48 py-12 px-6 mx-auto max-w-screen-lg text-center lg:py-20 space-y-8 z-10">
                    <h1 class="mb-6 text-5xl font-extrabold tracking-tight leading-tight lg:text-7xl drop-shadow-lg allura-font">
                        Welcome to Philippine <br>Lake-Wood Church
                    </h1>
                    <p class="mb-6 text-lg font-light lg:text-xl sm:px-8 lg:px-20">
                        Our church has been a beacon of hope and faith in this community for over 14 years. Join us as we share the love of God and strive to make a positive impact in the world.
                    </p>
                    <div class="flex justify-center space-x-4 mt-8">
                        <button class="px-6 py-3 rounded-full bg-blue-500 hover:bg-blue-600 text-white font-semibold shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                            <a href="#pastor-section">Learn More</a>
                        </button>
                        
                    </div>
                </div>
            </section>
        </div>

        <!-- Pastor Section -->
        <section class="py-20 bg-gray-100" id="pastor-section">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold mb-12 text-center allura-font">Meet Our Pastor</h2>
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/3 mb-8 md:mb-0">
                        <img src="/images/pastor_bg.jpg" alt="Pastor Kim-Young Jin" class="rounded-full w-64 h-64 object-cover mx-auto shadow-lg" />
                    </div>
                    <div class="md:w-2/3 md:pl-12">
                        <h3 class="text-2xl font-semibold mb-4">Pastor Kim Youngjin</h3>
                        <p class="text-lg mb-6">Pastor Kim Youngjin has been leading our church with compassion and vision for over a decade. His passion for spreading the word of God has touched the lives of many and continues to inspire our congregation to grow in faith and service.</p>
                        <blockquote class="italic text-xl mb-6">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"</blockquote>
                        <!-- <a href="#" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full font-semibold hover:bg-gray-900 transition duration-300">Pastor's Message</a> -->
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-blue-700 text-white text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold mb-8 allura-font">Join Our Community</h2>
                <p class="text-xl mb-12">Experience the warmth and fellowship of our church family. We welcome you with open arms!</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/#time-sched-section" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300">Service Times</a>
                    <a href="#footer-section" class="inline-block bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition duration-300">Contact Us</a>
                </div>
            </div>
        </section>

        <Footer id="footer-section"/>
    </div>
</template>

<style scoped>
.allura-font {
    font-family: 'Allura', cursive;
}

.bg-church-bg {
    background-image: url('/path-to-your-church-image.jpg');
    background-position: center;
    background-size: cover;
}

button {
    transition: all 0.3s ease-in-out;
}

</style>
