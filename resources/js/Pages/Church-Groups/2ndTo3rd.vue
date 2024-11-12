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
    <Head title="2nd - 3rd Year Officers" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
            <!-- Mission/Vision Section -->
            <section class="py-16 px-4">
                <div class="max-w-6xl mx-auto text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-8 mt-28">2nd to 3rd Year Officers</h1>
                    <div class="grid md:grid-cols-2 gap-8 mb-16">

                        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 animate-fadeInLeft">
                            <div class="h-16 w-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                            <p class="text-gray-600 leading-relaxed">
                                To shed the Light of God's Word upon every corner of the community, motivating hearts to live a life full of faith, love, and hope in Christ. We seek to encourage people to trek down the road of holiness by offering optimism and direction to those in need.
                            </p>
                            <blockquote class="bg-gray-100 p-4 rounded-lg mt-4">
                                <p class="text-gray-600 font-medium">
                                    "You are the light of the world. A town built on a hill cannot be hidden. 15 Neither do people light a lamp and put it under a bowl. Instead they put it on its stand, and it gives light to everyone in the house. 16 In the same way, let your light shine before others, that they may see your good deeds and glorify your Father in heaven."
                                </p>
                                <cite class="text-gray-500 text-sm">— Matthew 5:14-16</cite>
                            </blockquote>
                        </div>

                        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 animate-fadeInRight">
                            <div class="h-16 w-16 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h2>
                            <p class="text-gray-600 leading-relaxed">
                                To be a vibrant community that loves and supports one another while being unified in faith, fervently proclaiming the gospel, honoring and worshiping God, and demonstrating His love for everyone. Not merely members, but disciples who actively engage in the propagation of God's Kingdom. We seek to see a congregation that is radiant with vitality, affection, and solidarity, shining as a light in the world and changing the lives of those whom we reach.
                            </p>
                            <blockquote class="bg-gray-100 p-4 rounded-lg mt-4">
                                <p class="text-gray-600 font-medium">
                                    "Go into all the world and preach the gospel to all creation."
                                </p>
                                <cite class="text-gray-500 text-sm">— Mark 16:15</cite>
                            </blockquote>
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
                                                <p class="text-white text-sm">Angelica's Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Angelica Asanion</h3>
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
                                                <p class="text-white text-sm">Charmae's Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Charmae Pagayanan</h3>
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
                                                <p class="text-white text-sm">Angeline's Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Angeline Ballesteros</h3>
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
                                                <p class="text-white text-sm">Jed's Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Noriel Jed Legaspi</h3>
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