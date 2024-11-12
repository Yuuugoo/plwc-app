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
    <Head title="Highschool - 1st Year Officers" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
            <section class="py-16 px-4">
                <div class="max-w-6xl mx-auto text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-8 mt-28">Highschool - 1st Year Officers</h1>
                    <div class="grid md:grid-cols-2 gap-8 mb-16">
                        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 animate-fadeInLeft">
                            <div class="h-16 w-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h2>
                            <p class="text-gray-600 leading-relaxed">
                                The High School to 1st year College is committed to creating a welcoming and inclusive church community where people from all walks of life feel comfortable gathering, sharing meals, and building lasting relationships. Our mission is to spread the gospel of Jesus Christ to students in a way that by building strong relationships and sharing our faith, we can help each other become more like Christ. We aim to have disciples of Christ and productive leaders who will then go out into the world and encourage people over to Christ. To glorify God's name, they must be brought to Christ-like maturity and prepared for their ministry in the church and their life's work in the world.
                            </p>
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
                                The High School to 1st year College envision our Group as a haven of warmth and welcome, where people from all walks of life can come together and feel at home. We aspire to a church where everyone is loved, where people find meaning, and where people's lives are transformed. We commit to being used by God to Rescue, Recover, and Restore those who have never known the Presence and Power of God, with one hand turned toward God and the other toward mankind. We believe that by living out this vision, we can fulfill the Great Commission of Jesus Christ and bring glory to God.
                            </p>
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
                                                <p class="text-white text-sm">Sophia's Descrition</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Sophia Ungab</h3>
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
                                                <p class="text-white text-sm">Norie's Descrition</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Norie Ann Timbal</h3>
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
                                                <p class="text-white text-sm">Rhea's Descrition</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Rhea Castro</h3>
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
                                                <p class="text-white text-sm">Caridel's Descrition</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <h3 class="text-xl font-bold text-gray-900">Caridel Magalang</h3>
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