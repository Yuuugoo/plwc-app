<template>
    <div class="max-w-xl mx-auto">
        <div class="overflow-hidden bg-white rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300 dark:bg-gray-800">
            <div class="flex flex-col md:flex-row">
                <div class="relative w-full md:w-72">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <img 
                        src="images/worship1_bg.jpg" 
                        alt="Worship Service" 
                        class="h-full w-full object-cover"
                    />
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-6">
                        <div class="text-white text-center">
                            <span class="text-sm font-medium">{{ $t('landing.sched.image-span') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-10 md:p-6 ">
                    <div class="flex items-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $t('landing.sched.title') }}</h2>
                    </div>

                    <!-- Schedule Items -->
                    <div class="space-y-6">
                        <div class="schedule-item">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $t('landing.sched.item1') }}</h3>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 space-x-4">
                                <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $t('landing.sched.item1.time') }}
                                </span>
                                <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $t('landing.sched.item1.place') }}
                                </span>
                            </div>
                        </div>

                        <div class="schedule-item">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $t('landing.sched.item2') }}</h3>
                            <div class="flex items-center text-gray-600 dark:text-gray-300 space-x-4">
                                <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $t('landing.sched.item2.time') }}
                                </span>
                                <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $t('landing.sched.item2.place') }}
                                </span>
                            </div>
                        </div>
                    </div>


                    <button class="mt-8 w-full bg-blue-700 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                        {{ $t('landing.sched.button') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.schedule-item {
@apply relative pl-4 border-l-2 border-indigo-200 dark:border-indigo-800;
}

.schedule-item::before {
content: '';
@apply absolute w-3 h-3 bg-indigo-600 rounded-full -left-[7px] top-2;
}
</style>

