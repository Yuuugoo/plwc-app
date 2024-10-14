<template>
  <div>
    <div id="gallery" class="relative w-full h-64 md:h-72 overflow-hidden rounded-lg" data-carousel="static">
      <div class="relative h-full w-full">
        <div v-for="(friend, index) in friends" :key="friend.id"
             class="absolute top-0 left-0 w-full h-full transition-opacity duration-300 ease-in-out"
             :class="{ 'opacity-0': index !== activeIndex, 'opacity-100': index === activeIndex }">
          <img :src="friend.avatar || '/images/default-avatar.jpg'"
               @error="handleImageError"
               class="w-full h-full object-cover"
               :alt="friend.name">
        </div>
      </div>
      <button @click="prevFriend" type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button @click="nextFriend" type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
      <div class="absolute bottom-0 left-0 right-0 text-center bg-white bg-opacity-75 p-2 rounded-md">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-900">
          {{ friends[activeIndex]?.name || 'Unknown Friend' }}
        </h4>
      </div>
    </div>
    <div class="mt-4 text-center">
      <Link
        :href="route('new-friends.show', { newFriend: friends[activeIndex]?.id })"
        class="bg-green-600 text-white px-4 py-2 rounded-lg inline-block"
      >
        View Introduction
      </Link>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  friends: {
    type: Array,
    required: true
  }
});

const activeIndex = ref(0);

const nextFriend = () => {
  activeIndex.value = (activeIndex.value + 1) % props.friends.length;
};

const prevFriend = () => {
  activeIndex.value = (activeIndex.value - 1 + props.friends.length) % props.friends.length;
};

const handleImageError = (e) => {
  e.target.src = '/images/default-avatar.jpg';
};
</script>