<template>
  <div class="w-full mx-auto">
    <div 
      class="relative group rounded-2xl overflow-hidden transform-gpu transition-all duration-300 hover:scale-[1.02]"
      :style="{
        background: 'linear-gradient(to bottom right, rgb(37, 99, 235), rgb(147, 51, 234))'
      }"
    >
      <div class="p-8">
        <!-- Card Content -->
        <div class="relative">
          <h2 class="text-2xl font-bold text-white text-center mb-4">
            {{ $t('landing.newcomers.title') }}
          </h2>
          
          <p class="text-white/90 text-center mb-6">
            {{ $t('landing.newcomers.description') }}
          </p>

          <Link
            :href="route('new-friends.show')"
            class="inline-flex items-center justify-center w-full px-4 py-3 bg-blue-700 hover:bg-white/20 border border-white/20 rounded-xl text-white font-medium transition-all duration-300 transform hover:-translate-y-0.5"
          >
            {{ $t('landing.newcomers.button') }}
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
