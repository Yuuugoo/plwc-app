<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import CreateNewEvent from '@/Components/CreateNewEvent.vue';

const breadcrumbItems = [
  { text: 'CRUD', href: '#' },
  { text: 'Gallery', href: route('gallery.index') },
  { text: 'Create', href: route('gallery.create') },
];
</script>

<template>
    <Head title="Create New Event" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Event</h2>
        </template>
        <div class="flex justify-between">
            <Breadcrumb :items="breadcrumbItems" />
        </div>
        <div class="flex justify-end">
            <Link
                :href="route('gallery.index')"
                class="text-white bg-green-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Back
            </Link>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <CreateNewEvent />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>