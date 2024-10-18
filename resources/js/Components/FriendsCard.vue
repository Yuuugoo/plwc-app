<!-- FriendCard.vue -->
<template>
  <div class="w-full max-w-md mx-auto">
    <div 
      class="relative group rounded-2xl overflow-hidden transform-gpu transition-all duration-300 hover:scale-[1.02]"
      :style="{
        background: 'rgba(255, 255, 255, 0.1)',
        backdropFilter: 'blur(12px)',
        WebkitBackdropFilter: 'blur(12px)',
      }"
    >
      <!-- Card Content -->
      <div class="relative">
        <!-- Gradient Overlay for Title -->
        <div class="absolute top-0 left-0 right-0 h-24 z-10 bg-gradient-to-b from-black/60 to-transparent">
          <h2 class="text-2xl font-bold text-white text-center pt-6">
            New Burger Friends
          </h2>
        </div>

        <!-- Image Carousel -->
        <div class="relative aspect-[4/5] overflow-hidden">
          <TransitionGroup name="slide">
            <div
              v-for="(friend, index) in friends"
              :key="friend.id"
              v-show="index === activeIndex"
              class="absolute inset-0"
            >
              <img
                :src="friend.avatar || '/images/default-avatar.jpg'"
                :alt="friend.name"
                @error="handleImageError"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              >
              <!-- Bottom Gradient -->
              <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/80 via-black/50 to-transparent">
                <div class="absolute bottom-0 left-0 right-0 p-6">
                  <h3 class="text-xl font-semibold text-white mb-4">
                    {{ friend.name }}
                  </h3>
                  <Link
                    :href="route('new-friends.show', { newFriend: friend.id })"
                    class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-white/10 hover:bg-blue-700 border border-white/20 rounded-xl text-white font-medium transition-all duration-300 transform hover:-translate-y-0.5"
                  >
                    View Introduction
                  </Link>
                </div>
              </div>
            </div>
          </TransitionGroup>

          <!-- Navigation Buttons -->
          <button 
            @click="prevFriend" 
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-black/20 backdrop-blur-md hover:hover:bg-blue-700 transition-all duration-300 group-hover:translate-x-1"
          >
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          
          <button 
            @click="nextFriend" 
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-black/20 backdrop-blur-md hover:hover:bg-blue-700 transition-all duration-300 group-hover:-translate-x-1"
          >
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
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

<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease;
}

.slide-enter-from {
  opacity: 0;
  transform: translateX(100%);
}

.slide-leave-to {
  opacity: 0;
  transform: translateX(-100%);
}

.slide-enter-to,
.slide-leave-from {
  opacity: 1;
  transform: translateX(0);
}
</style>