<script setup>
import { ref, onMounted, computed  } from 'vue';

const currentMonth = ref('')
const currentYear = ref('')

onMounted(() => {
    const date = new Date()
    currentMonth.value = date.toLocaleString('default', { 
        month: 'long',
        timeZone: 'Asia/Manila'
    })
    currentYear.value = date.toLocaleString('default', {
        year: 'numeric',
        timeZone: 'Asia/Manila'
    })
})

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
        date: 'November 24, 2024',
        time: '12:00 PM - 5:00 PM',
        location: 'Covered Court',
        description: 'Annual Sports Fest of PLWC',
        image: '/images/sfest_bg.jpg'
    },

]);

const currentEvents = computed(() => {
    return events.value.filter(event => {
        const eventDate = new Date(event.date);
        const eventMonth = eventDate.toLocaleString('default', { 
            month: 'long',
            timeZone: 'Asia/Manila'
        });
        return eventMonth === currentMonth.value;
    });
});

</script>

<template>
    <div class="bg-white rounded-lg shadow-xl p-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">
            {{ $t('landing.events.title') }} {{ currentMonth }} <span>{{ currentYear }}</span>
        </h2>
       
        <div class="relative">
            <div class="flex overflow-x-auto pb-6 gap-6 snap-x">
                <div v-for="event in currentEvents" :key="event.id" 
                     class="flex-none w-full sm:w-[calc(100%/2-12px)] lg:w-[calc(100%/3-16px)] snap-start">
                    <div class="bg-white border border-gray-200 rounded-lg shadow transform transition-all duration-300 hover:scale-105">
                        <img class="rounded-t-lg w-full h-48 object-cover" :src="event.image" :alt="event.title">
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ event.title }}</h5>
                            <div class="mb-3 space-y-2">
                                <p class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ event.date }}
                                </p>
                                <p class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ event.time }}
                                </p>
                                <p class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ event.location }}
                                </p>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">{{ event.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Custom scrollbar styling */
.overflow-x-auto {
    scrollbar-width: thin;
    scrollbar-color: #CBD5E0 transparent;
}

.overflow-x-auto::-webkit-scrollbar {
    height: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: transparent;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background-color: #CBD5E0;
    border-radius: 6px;
}
</style>