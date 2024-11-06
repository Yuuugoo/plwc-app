<script setup>
import { ref } from 'vue';

const events = ref([
    {
        id: 1,
        title: 'Dance Competition',
        date: 'October 27, 2024',
        time: '1:00 PM - 2:00 PM',
        location: 'Covered Court',
        description: 'Sample Event 1',
        image: '/images/dc_bg.jpg'
    },
    {
        id: 2,
        title: 'Church Anniversary',
        date: 'October 27, 2024',
        time: '2:00 PM - 4:00 PM',
        location: 'Sanctuary',
        description: 'Sample Event 2',
        image: '/images/ronniel.jpg'
    },
    {
        id: 3,
        title: 'Sports Fest',
        date: 'November 10, 2024',
        time: '12:00 PM - 5:00 PM',
        location: 'Covered Court',
        description: 'Sample Event 3',
        image: '/images/sfest_bg.jpg'
    },

]);

</script>

<template>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Upcoming Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="event in events" :key="event.id" 
                 class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700 transform transition-all duration-300 hover:scale-105">
                <img class="rounded-t-lg w-full h-48 object-cover" :src ="event.image" :alt="event.title">
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ event.title }}</h5>
                    <div class="mb-3 space-y-2">
                        <p class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ event.date }}
                        </p>
                        <p class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ event.time }}
                        </p>
                        <p class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ event.location }}
                        </p>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ event.description }}</p>
                    <!-- <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Learn more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</template>