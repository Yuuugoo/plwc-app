<template>
    <div class="relative">
        
        <button 
            @click="toggleDropdown" 
            class="text-black font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center"
            type="button"
        >
            {{ currentLocale === 'en' ? 'EN' : 'KR' }}
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>

        <div v-if="isDropdownOpen" class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute">
            <ul class="py-2 text-sm text-gray-700 font-medium" aria-labelledby="dropdownHoverButton">
                <li>
                    <a 
                        @click.prevent="switchLanguage('en')" 
                        href="#" 
                        :class="[
                            'block px-4 py-2 hover:text-indigo-600 hover:bg-gray-100',
                            currentLocale === 'en' ? 'text-indigo-600' : ''
                        ]"
                    >
                        {{ $t('languages.english') }}
                    </a>
                </li>
                <li>
                    <a 
                        @click.prevent="switchLanguage('kr')" 
                        href="#" 
                        :class="[
                            'block px-4 py-2 hover:text-indigo-600 hover:bg-gray-100',
                            currentLocale === 'kr' ? 'text-indigo-600' : ''
                        ]"
                    >
                        {{ $t('languages.korean') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const currentLocale = ref('en'); 
const isDropdownOpen = ref(false);

const switchLanguage = (lang) => {
    if (currentLocale.value !== lang) {
        currentLocale.value = lang;
        localStorage.setItem('locale', lang);
        window.location.reload();
    }
};

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

onMounted(() => {
    const storedLocale = localStorage.getItem('locale') || 'en';
    currentLocale.value = storedLocale;
});
</script>

