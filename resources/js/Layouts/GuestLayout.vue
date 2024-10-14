<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cloud-bg bg-no-repeat bg-cover">
        <div>
            <Link href="/">
                <ApplicationLogo class="h-18 fill-current text-gray-500 mb-5" />
            </Link>
        </div>

        <slot />
        
    </div>
</template>