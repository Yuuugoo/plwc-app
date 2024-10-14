<template>
    <nav
        class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb"
    >
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center" v-for="(item, index) in items" :key="index">
            <a
            :href="item.href"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
            >
            <span v-if="index > 0" class="mx-2"> &gt; </span>
            {{ item.text }}
            </a>
        </li>
        </ol>
    </nav>
</template>
  
<script setup>
    const props = defineProps({
    items: {
        type: Array,
        required: true,
    },
    });
</script>