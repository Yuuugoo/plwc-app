<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import CreateNewFriend from '@/Components/CreateNewFriend.vue';

const breadcrumbItems = [
  { text: 'CRUD', href: '#' },
  { text: 'New Friends', href: route('new-friends') },
  { text: 'Create', href: route('new-friends.create') },
];
</script>

<template>
    <Head title="Create New Friend" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Friend</h2>
        </template>
        <div class="flex justify-between">
            <Breadcrumb :items="breadcrumbItems" />
        </div>
        <div class="flex justify-end">
            <Link
                :href="route('new-friends')"
                class="text-white bg-green-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center"
            >
                Back
            </Link>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <CreateNewFriend />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>