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
    <Head title="4th Year Officers" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
            <!-- Mission/Vision Section -->
            <section class="py-16 px-4">
                <div class="max-w-6xl mx-auto text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-8 mt-28">4th Year College Officers</h1>
                    <div class="grid md:grid-cols-2 gap-8 mb-16">
                        <!-- Mission Card -->
                        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 animate-fadeInLeft">
                            <div class="h-16 w-16 bg-gradient-to-br from-blue-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                            <ul class="text-gray-600 leading-relaxed space-y-3 text-left">
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-blue-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    We aim to fulfill God’s will by bringing the message of salvation through Jesus Christ to schools and friends, encouraging them to grow in faith and live out the teachings of the Gospel.
                                </li>
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-blue-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    We seek to expand our membership through evangelism, guiding new members until they mature in faith.
                                </li>
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-blue-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    Our goal is to create a unified community with a shared purpose: to seek the kingdom of God and His righteousness in this world.
                                </li>
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-blue-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    We also strive to build friendships and strengthen each other through fellowship and holy communion.
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 animate-fadeInRight">
                            <div class="h-16 w-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h2>
                            <ul class="text-gray-600 leading-relaxed space-y-3 text-left">
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-indigo-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    We envision a world transformed by the power of God, where His kingdom and righteousness are evident.
                                </li>
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-indigo-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    Together, we strive to be a unified body of believers, reflecting God’s grace and dedicating our lives to glorify Him. 
                                </li>
                                <li class="flex items-start animate-fadeIn">
                                    <span class="text-indigo-500 mr-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m0-5a9 9 0 11-8 16.2 9 9 0 018-16.2z" />
                                        </svg>
                                    </span>
                                    We see a future with a growing community, where every member is committed to living a holy life as a living sacrifice for God.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Officers Section -->
            <section class="py-16 px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                        <div class="p-8">
                            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Meet Our Officers</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                                <!-- President -->
                                <div class="group">
                                    <div class="relative overflow-hidden rounded-lg">
                                        <img 
                                            src="/images/avatar_male3.jpg" 
                                            alt="President" 
                                            class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-300"
                                        />
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                                <p class="text-white text-sm">Jovi's Motto - Leading with vision and dedication</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Jovi Dela Cruz</h3>
                                        <p class="text-blue-600 font-medium">President</p>
                                    </div>
                                </div>

                                <!-- Vice President -->
                                <div class="group">
                                    <div class="relative overflow-hidden rounded-lg">
                                        <img 
                                            src="/images/avatar_female2.jpg" 
                                            alt="Vice President" 
                                            class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-300"
                                        />
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                                <p class="text-white text-sm">Aileen's Motto - Supporting progress and innovation</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Aileen Marfil</h3>
                                        <p class="text-blue-600 font-medium">Vice President</p>
                                    </div>
                                </div>

                                <!-- Secretary -->
                                <div class="group">
                                    <div class="relative overflow-hidden rounded-lg">
                                        <img 
                                            src="/images/avatar_female.jpg" 
                                            alt="Secretary" 
                                            class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-300"
                                        />
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                                <p class="text-white text-sm">Johann's Motto - Organizing with precision</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Johann Nicole Delanon</h3>
                                        <p class="text-blue-600 font-medium">Secretary</p>
                                    </div>
                                </div>

                                <!-- Treasurer -->
                                <div class="group">
                                    <div class="relative overflow-hidden rounded-lg">
                                        <img 
                                            src="/images/avatar_female1.jpg" 
                                            alt="Treasurer" 
                                            class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-300"
                                        />
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                                <p class="text-white text-sm">Crystal's Motto - Managing resources effectively</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Crystal Gabrielle Ungab</h3>
                                        <p class="text-blue-600 font-medium">Treasurer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <Footer />
    </div>
</template>