<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});

const activeTab = ref('Highschool');

const groupData = {
    // Elementary: [
    //     { name: 'John Doe', role: 'President' },
    //     { name: 'Jane Smith', role: 'Vice President' },
    //     { name: 'Sam Brown', role: 'Secretary' },
    //     { name: 'Emily Johnson', role: 'Treasurer' },
    //     { name: 'Michael Davis', role: 'Member' },
    //     { name: 'Sarah Wilson', role: 'Member' },
    //     { name: 'David Garcia', role: 'Member' },
    //     { name: 'Laura Martinez', role: 'Member' },
    //     { name: 'Chris Anderson', role: 'Member' },
    //     { name: 'Jessica Thompson', role: 'Member' },
    // ],
    Highschool: [
        { name: 'Sophia Elaine J. Ungab', role: 'President' },
        { name: 'Norie Ann C. Timbal', role: 'Vice President' },
        { name: 'Rhea Mae M. Castro', role: 'Secretary' },
        { name: 'Caridel S. Magalang', role: 'Treasurer' },
        { name: 'James Miller', role: 'Member' },
        { name: 'Patricia Wilson', role: 'Member' },
        { name: 'Daniel Jones', role: 'Member' },
        { name: 'Sophia Davis', role: 'Member' },
        { name: 'Andrew Garcia', role: 'Member' },
        { name: 'Emily Martinez', role: 'Member' },
    ],
    College2nd: [
        { name: 'Angelica Asanion', role: 'President' },
        { name: 'Charmae Pagayanan', role: 'Vice President' },
        { name: 'Angeline Ballesteros', role: 'Secretary' },
        { name: 'Noriel Jed Legaspi', role: 'Treasurer' },
        { name: 'Liam Hernandez', role: 'Member' },
        { name: 'Mia Young', role: 'Member' },
        { name: 'Lucas Allen', role: 'Member' },
        { name: 'Ava King', role: 'Member' },
        { name: 'Ethan Wright', role: 'Member' },
        { name: 'Isabella Scott', role: 'Member' },
    ],
    College4th: [
        { name: 'Jovi Dela Cruz', role: 'President' },
        { name: 'Aileen Marfil', role: 'Vice President' },
        { name: 'Johann Nicole Dalanon', role: 'Secretary' },
         { name: 'Crystal Gabrielle Ungab', role: 'Treasurer' },
        { name: 'Liam Hernandez', role: 'Member' },
        { name: 'Mia Young', role: 'Member' },
        { name: 'Lucas Allen', role: 'Member' },
        { name: 'Ava King', role: 'Member' },
        { name: 'Ethan Wright', role: 'Member' },
        { name: 'Isabella Scott', role: 'Member' },
    ],
    Youth: [
        { name: 'Christopher S. Magalang', role: 'President' },
        { name: 'Angelo A. Asanion', role: 'Vice President' },
        { name: 'Jeanette B. Ubat', role: 'Secretary' },
        { name: 'Izzykiel M. Dela Cruz', role: 'Treasurer' },
        { name: 'Liam Hernandez', role: 'Member' },
        { name: 'Mia Young', role: 'Member' },
        { name: 'Lucas Allen', role: 'Member' },
        { name: 'Ava King', role: 'Member' },
        { name: 'Ethan Wright', role: 'Member' },
        { name: 'Isabella Scott', role: 'Member' },
    ],
    Parents: [
        { name: 'Ma. Nora  E. Mahinay', role: 'President' },
        { name: 'Adelia Magalang', role: 'Vice President' },
        { name: 'Lanie Demos Catabay', role: 'Secretary' },
        { name: 'Vilma Micabalo Maboloc', role: 'Treasurer' },
        { name: 'Liam Hernandez', role: 'Member' },
        { name: 'Mia Young', role: 'Member' },
        { name: 'Lucas Allen', role: 'Member' },
        { name: 'Ava King', role: 'Member' },
        { name: 'Ethan Wright', role: 'Member' },
        { name: 'Isabella Scott', role: 'Member' },
    ]
};

</script>

<template>
    <Head title="All Groups" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        <div class="min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <section class="flex justify-center items-center min-h-screen md:mt-10 md:mb-10 lg:mt-10 lg:mb-10">
                <div class="w-3/4 py-10 px-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="lg:flex">
                        <!-- Tabs -->
                        <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-5 mb-4 md:mb-0">
                            <!-- <li>
                                <a @click.prevent="activeTab = 'Elementary'" href="#" :class="activeTab === 'Elementary' ? 'bg-blue-700 text-white' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700'" class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                                    Elementary
                                </a>
                            </li> -->
                            <li>
                                <a @click.prevent="activeTab = 'Highschool'" href="#" :class="activeTab === 'Highschool' ? 'bg-blue-700 text-white' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700'" class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                                    Highschool - 1st Year College
                                </a>
                            </li>
                            <li>
                                <a @click.prevent="activeTab = 'College2nd'" href="#" :class="activeTab === 'College2nd' ? 'bg-blue-700 text-white' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700'" class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                                    2nd Year - 3rd Year College
                                </a>
                            </li>
                            <li>
                                <a @click.prevent="activeTab = 'College4th'" href="#" :class="activeTab === 'College4th' ? 'bg-blue-700 text-white' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700'" class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                                    4th Year College
                                </a>
                            </li>
                            <li>
                                <a @click.prevent="activeTab = 'Youth'" href="#" :class="activeTab === 'Youth' ? 'bg-blue-700 text-white' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700'" class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                                    Youth
                                </a>
                            </li>
                            <li>
                                <a @click.prevent="activeTab = 'Parents'" href="#" :class="activeTab === 'Parents' ? 'bg-blue-700 text-white' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700'" class="inline-flex items-center px-4 py-3 rounded-lg w-full">
                                    Parents
                                </a>
                            </li>
                        </ul>

                        <!-- Table -->
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <caption class="p-5 text-lg font-semibold text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ activeTab }} Officers and Members List
                                </caption>
                                <thead class="text-xs text-white uppercase bg-blue-700 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Full Name</th>
                                        <th scope="col" class="px-6 py-3">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(person, index) in groupData[activeTab]" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ person.name }}</th>
                                        <td class="px-6 py-4">{{ person.role }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <Footer />
    </div>
</template>
