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
    <Head title="Parents Group" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center min-h-screen">
                <div class="w-3/4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                        <li class="me-2">
                            <button id="officers-tab" data-tabs-target="#officers" type="button" role="tab" aria-controls="officers" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Officers</button>
                        </li>
                        <li class="me-2">
                            <button id="members-tab" data-tabs-target="#members" type="button" role="tab" aria-controls="members" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Members</button>
                        </li>
                    </ul>
                    <div id="defaultTabContent">
                        <!-- Officers Tab -->
                        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="officers" role="tabpanel" aria-labelledby="officers-tab">
                            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Parents Officers</h2>
                            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                                <!-- President -->
                                <div class="text-center">
                                    <img src="/images/avatar_male3.jpg" alt="President" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">President</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Ma. Nora  E. Mahinay</p>
                                </div>
                                <!-- Vice President -->
                                <div class="text-center">
                                    <img src="/images/avatar_female2.jpg" alt="Vice President" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Vice President</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Adelia Magalang</p>
                                </div>
                                <!-- Secretary -->
                                <div class="text-center">
                                    <img src="/images/avatar_female.jpg" alt="Secretary" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Secretary</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Vilma Micabalo Maboloc</p>
                                </div>
                                <!-- Treasurer -->
                                <div class="text-center">
                                    <img src="/images/avatar_female1.jpg" alt="Treasurer" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Treasurer</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Lanie Demos Catabay</p>
                                </div>
                            </div>
                        </div>

                        <!-- Members Tab -->
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="members" role="tabpanel" aria-labelledby="members-tab">
                            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Parents Members</h2>
                            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                                <!-- Member 1 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Mark Daniel Cristoles</p>
                                </div>
                                <!-- Member 2 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male1.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">John Jowell Bayran</p>
                                </div>
                                <!-- Member 3 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male2.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Frederick Catabay</p>
                                </div>
                                <!-- Member 4 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male3.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">John Rianiel Remigio </p>
                                </div>

                                <div class="text-center">
                                    <img src="/images/avatar_male3.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">AJ Delan</p>
                                </div>
                                <!-- Member 2 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male2.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">IJ Rose Sarabia</p>
                                </div>
                                <!-- Member 3 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male1.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Charlene Ubat</p>
                                </div>
                                <!-- Member 4 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Jane Anonas</p>
                                </div>
                                <div class="text-center">
                                    <img src="/images/avatar_male1.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Patrick Fiala</p>
                                </div>
                                <!-- Member 2 -->
                                <div class="text-center">
                                    <img src="/images/avatar_male.jpg" alt="Member" class="w-24 h-24 mx-auto mb-2 rounded-full">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Member</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Lenard Tenefrancia</p>
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