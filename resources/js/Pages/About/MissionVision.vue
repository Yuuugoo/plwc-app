<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';
import { onMounted } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});

// Optional: Add animation on scroll
onMounted(() => {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach((el) => observer.observe(el));
});
</script>

<template>
    <Head title="Mission & Vision" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        
        <!-- Hero Section -->
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="relative flex justify-center items-center min-h-screen text-black" id="mission-vision-section">
                <div class="px-4 mx-auto max-w-screen-xl text-center">
                    <h1 class="mb-6 text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight leading-none allura-font">
                        Transforming Lives Through Christ
                    </h1>
                    <p class="mb-8 text-lg md:text-xl font-medium max-w-3xl mx-auto">
                        Join us in our journey of faith, fellowship, and spiritual growth
                    </p>
                </div>
            </section>
        </div>

        <!-- Mission & Vision Sections -->
        <div class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4">
                <!-- Mission Section -->
                <div class="max-w-4xl mx-auto mb-24 fade-in">
                    <div class="text-center mb-16">
                        <span class="text-blue-600 font-semibold tracking-wider uppercase">Our Mission</span>
                        <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                            Empowering Faith, Building Community
                        </h2>
                        <div class="mt-4 h-1 w-24 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8 text-center">
                        <div class="p-6 rounded-lg bg-gray-50 hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 mx-auto mb-4 text-blue-600">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Spread God's Love</h3>
                            <p class="text-gray-600">Share the message of Christ's love through worship, fellowship, and service.</p>
                        </div>
                        <div class="p-6 rounded-lg bg-gray-50 hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 mx-auto mb-4 text-blue-600">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Build Community</h3>
                            <p class="text-gray-600">Create a welcoming environment where people can grow together in faith.</p>
                        </div>
                        <div class="p-6 rounded-lg bg-gray-50 hover:shadow-xl transition-all duration-300">
                            <div class="w-12 h-12 mx-auto mb-4 text-blue-600">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Serve Others</h3>
                            <p class="text-gray-600">Reach out to those in need through meaningful service and support.</p>
                        </div>
                    </div>
                </div>

                <!-- Vision Section -->
                <div class="max-w-4xl mx-auto fade-in">
                    <div class="text-center mb-16">
                        <span class="text-blue-600 font-semibold tracking-wider uppercase">Our Vision</span>
                        <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                            Looking Towards Tomorrow
                        </h2>
                        <div class="mt-4 h-1 w-24 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-8 md:p-12 text-white text-center">
                        <p class="text-xl md:text-2xl font-medium leading-relaxed">
                            "To be a beacon of hope and transformation, nurturing disciples who impact their communities through Christ's love, building a world where faith, love, and service create lasting positive change."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto fade-in">
                    <div class="text-center mb-16">
                        <span class="text-blue-600 font-semibold tracking-wider uppercase">Our Core Values</span>
                        <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                            What We Stand For
                        </h2>
                        <div class="mt-4 h-1 w-24 bg-blue-600 mx-auto rounded-full"></div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="flex gap-4 items-start p-6 rounded-lg bg-white hover:shadow-xl transition-all duration-300">
                            <div class="flex-none w-12 h-12 text-blue-600">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">God-Centered</h3>
                                <p class="text-gray-600">Grounding all we do in Biblical truth and spiritual growth.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start p-6 rounded-lg bg-white hover:shadow-xl transition-all duration-300">
                            <div class="flex-none w-12 h-12 text-blue-600">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Bible-Centered</h3>
                                <p class="text-gray-600">Grounding all we do in Biblical truth and spiritual growth.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start p-6 rounded-lg bg-white hover:shadow-xl transition-all duration-300">
                            <div class="flex-none w-12 h-12 text-blue-600">
                                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Church-Centered</h3>
                                <p class="text-gray-600">Grounding all we do in Biblical truth and spiritual growth.</p>
                            </div>
                        </div>
                        <!-- Add more core values here -->
                    </div>
                </div>
            </div>
        </div>

        <Footer />
    </div>
</template>

<style scoped>
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.fade-in.show {
    opacity: 1;
    transform: translateY(0);
}

/* Optional: Add custom font for hero text */
@import url('https://fonts.googleapis.com/css2?family=Allura&display=swap');
.allura-font {
    font-family: 'Allura', cursive;
}
</style>