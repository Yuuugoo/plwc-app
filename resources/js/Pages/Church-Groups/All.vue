<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});

const activeTab = ref('Elementary');
const itemsPerPage = 5;
const currentPage = ref(1);

const groupData = {
    Elementary: [
        { name: 'Samonim', role: 'Elementary President' },
        { name: 'Vanessa', role: 'Grade 5-6 Teacher' },
        { name: 'Angela', role: 'Grade 3-4 Teacher' },
        { name: 'Feonah', role: 'Grade 1-2 Teacher' },
        { name: 'Juvilyn', role: 'Assistant Teacher' },
        { name: 'Patricia Wilson', role: 'Member' },
        { name: 'Daniel Jones', role: 'Member' },
        { name: 'Sophia Davis', role: 'Member' },
        { name: 'Andrew Garcia', role: 'Member' },
        { name: 'Emily Martinez', role: 'Member' },
    ],
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

const tabs = [
    { id: 'Elementary', label: 'Elementary' },
    { id: 'Highschool', label: 'Highschool - 1st Year College' },
    { id: 'College2nd', label: '2nd Year - 3rd Year College' },
    { id: 'College4th', label: '4th Year College' },
    { id: 'Youth', label: 'Youth' },
    { id: 'Parents', label: 'Parents' }
];


const paginatedData = computed(() => {
    const startIndex = (currentPage.value - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    return groupData[activeTab.value].slice(startIndex, endIndex);
});

const totalPages = computed(() => {
    return Math.ceil(groupData[activeTab.value].length / itemsPerPage);
});

const pageNumbers = computed(() => {
    const pages = [];
    for (let i = 1; i <= totalPages.value; i++) {
        pages.push(i);
    }
    return pages;
});

// Methods
const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

const getRoleColor = (role) => {
    switch (role) {
        case 'President':
            return 'bg-blue-100 text-blue-800';
        case 'Vice President':
            return 'bg-purple-100 text-purple-800';
        case 'Secretary':
            return 'bg-green-100 text-green-800';
        case 'Treasurer':
            return 'bg-orange-100 text-orange-800';
        case 'Elementary President':
            return 'bg-blue-100 text-blue-800';
        case 'Grade 5-6 Teacher':
            return 'bg-purple-100 text-purple-800';
        case 'Grade 3-4 Teacher':
            return 'bg-green-100 text-green-800';
        case 'Grade 1-2 Teacher':
            return 'bg-orange-100 text-orange-800';
        case 'Assistant Teacher':
            return 'bg-indigo-100 text-indigo-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
};

// Reset pagination when changing tabs
const handleTabChange = (tabId) => {
    activeTab.value = tabId;
    currentPage.value = 1;
};
</script>

<template>
    <Head title="All Members" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />
        
        <main class="flex-grow bg-gradient-to-br from-blue-50 to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mt-20 mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $t('groups.main-title') }}</h1>
                    <p class="text-lg text-gray-600">{{ $t('groups.main-description' )}}</p>
                </div>

                <div class="backdrop-blur-sm bg-white/90 rounded-xl shadow-xl p-6">
                    <div class="flex flex-col lg:flex-row gap-8">
                        <div class="lg:w-1/4">
                            <div class="flex flex-col space-y-2">
                                <button
                                    v-for="tab in tabs"
                                    :key="tab.id"
                                    @click="handleTabChange(tab.id)"
                                    class="px-4 py-3 rounded-lg text-left transition-all duration-200"
                                    :class="[
                                        activeTab === tab.id
                                            ? 'bg-blue-600 text-white shadow-lg transform scale-105'
                                            : 'bg-gray-50 text-gray-700 hover:bg-gray-100'
                                    ]"
                                >
                                    {{ tab.label }}
                                </button>
                            </div>
                        </div>

                        <div class="lg:w-3/4">
                            <div class="bg-white rounded-xl shadow-sm">
                                <div class="p-6">
                                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">
                                        {{ tabs.find(tab => tab.id === activeTab)?.label }}
                                    </h2>
                                    
                                    <TransitionGroup 
                                        name="list" 
                                        tag="div" 
                                        class="grid gap-4 mb-6"
                                    >
                                        <div
                                            v-for="person in paginatedData"
                                            :key="person.name"
                                            class="flex items-center justify-between p-4 rounded-lg bg-white border border-gray-100 hover:border-blue-200 transition-all duration-200"
                                        >
                                            <div class="flex items-center gap-4">
                                                <div 
                                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center text-white font-medium"
                                                >
                                                    {{ person.name.charAt(0) }}
                                                </div>
                                                <span class="font-medium text-gray-900">{{ person.name }}</span>
                                            </div>
                                            <span 
                                                :class="[
                                                    'px-3 py-1 rounded-full text-sm font-medium',
                                                    getRoleColor(person.role)
                                                ]"
                                            >
                                                {{ person.role }}
                                            </span>
                                        </div>
                                    </TransitionGroup>

                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation" class="flex justify-center mt-6">
                                        <ul class="inline-flex -space-x-px text-sm">
                                            <li>
                                                <button
                                                    @click="changePage(currentPage - 1)"
                                                    :disabled="currentPage === 1"
                                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                                    :class="{ 'opacity-50 cursor-not-allowed': currentPage === 1 }"
                                                >
                                                    Previous
                                                </button>
                                            </li>
                                            <li v-for="page in pageNumbers" :key="page">
                                                <button
                                                    @click="changePage(page)"
                                                    class="flex items-center justify-center px-3 h-8 leading-tight border"
                                                    :class="[
                                                        currentPage === page
                                                            ? 'text-blue-600 border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700'
                                                            : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700'
                                                    ]"
                                                >
                                                    {{ page }}
                                                </button>
                                            </li>
                                            <li>
                                                <button
                                                    @click="changePage(currentPage + 1)"
                                                    :disabled="currentPage === totalPages"
                                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                                    :class="{ 'opacity-50 cursor-not-allowed': currentPage === totalPages }"
                                                >
                                                    Next
                                                </button>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <Footer />
    </div>
</template>

<style scoped>
.list-enter-active,
.list-leave-active {
    transition: all 0.3s ease;
}

.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}

.list-move {
    transition: transform 0.3s ease;
}
</style>