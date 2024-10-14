<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import { Head } from '@inertiajs/vue3';

const breadcrumbItems = [
  { text: 'CRUD', href: '#' },
  { text: 'Gallery', href: '#' },
];
</script>

<template>
    <Head title="Gallery Crud" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <Breadcrumb :items="breadcrumbItems" />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
