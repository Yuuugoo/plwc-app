<template>
    <footer class="bg-gray-100 dark:bg-gray-900">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="mx-auto max-w-screen-xl w-full p-3 mt-5 -mb-5 lg:py-3">
            <div class="flex flex-col space-y-8 md:flex-row md:justify-between md:space-y-0">
                <!-- Footer Logo -->
                <div class="flex justify-center md:justify-start">
                    <a href="/" class="flex items-center">
                        <img src="/images/plwc-logo.png" class="h-16 w-24 lg:h-36 lg:w-full" alt="PLWC LOGO">
                    </a>
                </div>
                <!-- Contacts -->
                <div class="text-center md:text-left">
                    <h2 class="mb-6 text-l font-bold text-gray-900 uppercase dark:text-white">{{ $t('footer.contact') }}</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <div class="flex items-center justify-center md:justify-start gap-2">
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fillRule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clipRule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Contact Number</span>
                                </a>
                                <p>(+63)-123456789</p>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="flex items-center justify-center md:justify-start gap-2">
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                                        <path d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                                    </svg>
                                    <span class="sr-only">Email Address</span>
                                </a>
                                <p>plwc-sample-mail@gmail.com</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Location -->
                <div class="w-full md:w-auto">
                    <h2 class="mb-4 text-l font-bold text-gray-900 uppercase dark:text-white text-center md:text-left">{{ $t('footer.location') }}</h2>
                    <div class="flex justify-center md:justify-start">
                        <iframe
                        width="500"
                        height="300"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB7_O5viX6-eTise2y8B8DtAcIGJe6VjhE
                            &q=Hope+Integrated+School">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Bottom-->
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="px-5 pb-5">
                <span class="block text-sm text-gray-500 text-center dark:text-gray-400">© 2024 <a href="/" class="hover:underline">Philippine Lake-Wood Church</a>. All Rights Reserved.
                </span>
            </div>
    </footer>
</template>
