<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import { Head, Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

const props = defineProps({
    friends: Array
});

const breadcrumbItems = [
    { text: 'CRUD', href: '#' },
    { text: 'New Friends', href: route('new-friends') },
];

const deleteFriend = (id) => {
    if (confirm('Are you sure you want to delete this friend?')) {
        router.delete(route('new-friends.destroy', id));
    }
};
</script>

<template>
    <Head title="New Friends" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Friends CRUD</h2>
        </template>
        <div class="flex justify-between">
            <Breadcrumb :items="breadcrumbItems" />
        </div>
        <div class="flex justify-end">
            <Link
                :href="route('new-friends.create')"
                :active="route().current('new-friends.create')"
                class="text-white bg-green-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center"
            >
                Add New Friend
            </Link>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Introduction Content</th>
                                    <th scope="col" class="px-6 py-3">Uploaded Image</th>
                                    <th scope="col" class="px-6 py-3">Grade Lvl</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="friend in friends" :key="friend.id" class="bg-white border-b hover:bg-gray-50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input :id="'checkbox-table-search-' + friend.id" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label :for="'checkbox-table-search-' + friend.id" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ friend.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ friend.introduction_content }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img v-if="friend.friend_avatar" :src="'/storage/' + friend.friend_avatar" alt="Friend Avatar" class="w-10 h-10 rounded-full">
                                        <span v-else>No Image</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ friend.grade_level }}
                                    </td>
                                    <td class="flex items-center px-6 py-4">
                                        <Link :href="route('new-friends.edit', friend.id)" class="font-medium text-blue-600 hover:underline">Edit</Link>
                                        <button @click="deleteFriend(friend.id)" class="font-medium text-red-600 hover:underline ms-3">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>