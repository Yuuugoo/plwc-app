<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import { Head, Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    events: Array
});


const breadcrumbItems = [
    { text: 'CRUD', href: '#' },
    { text: 'Gallery', href: route('gallery.index') },
];

const deleteEvent = (id) => {
    if (typeof window !== 'undefined') {
        if (confirm('Are you sure you want to delete this event?')) {
            console.log(id,"deleted succesfully");
            router.delete(route('gallery.destroy', id));
        }
    }
};
</script>

<template>
    <Head title="Gallery" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gallery CRUD</h2>
        </template>
        <div class="flex justify-between">
            <Breadcrumb :items="breadcrumbItems" />
        </div>
        <div class="flex justify-end">
            <Link
                :href="route('gallery.create')"
                :active="route().current('gallery.create')"
                class="text-white bg-green-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center"
            >
                Add New Event
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
                                    <th scope="col" class="px-6 py-3">Event Name</th>
                                    <th scope="col" class="px-6 py-3">Type</th>
                                    <th scope="col" class="px-6 py-3">Images</th>
                                    <th scope="col" class="px-6 py-3">Description</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="event in events" :key="event.id" class="bg-white border-b hover:bg-gray-50">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input :id="'checkbox-table-search-' + event.id" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label :for="'checkbox-table-search-' + event.id" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ event.event_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ event.event_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap space-x-2">
                                            <span v-if="event.event_images">
                                                <div class="flex space-x-2">
                                                    <img
                                                        v-if="JSON.parse(event.event_images).length > 0"
                                                        v-for="(image, index) in JSON.parse(event.event_images).slice(0, 2)"
                                                        :key="index"
                                                        :src="'/storage/' + image"
                                                        alt="Event Image"
                                                        class="w-20 h-20 object-cover rounded"
                                                    />
                                                    <span v-if="JSON.parse(event.event_images).length > 2" class="flex items-center justify-center w-20 h-20 bg-gray-200 rounded">
                                                        +{{ JSON.parse(event.event_images).length - 2 }}
                                                    </span>
                                                </div>
                                            </span>
                                            <span v-else>No Image</span>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ event.event_description }}
                                    </td>
                                    <td class="flex items-center px-6 py-4">
                                        <Link :href="route('gallery.edit', event.id)" class="font-medium text-blue-600 hover:underline">Edit</Link>
                                        <button @click="deleteEvent(event.id)" class="font-medium text-red-600 hover:underline ms-3">Remove</button>
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

