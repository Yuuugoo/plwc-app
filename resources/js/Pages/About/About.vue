<script setup>
import { Head } from '@inertiajs/vue3';
import LandingPageNav from '@/Components/LandingPageNav.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="About Us" />
    <div class="flex flex-col min-h-screen">
        <LandingPageNav :canLogin="canLogin" />

        <div class="relative min-h-screen bg-cloud-bg bg-no-repeat bg-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900 opacity-70"></div>
            
            <section class="relative flex flex-col justify-center items-center h-full text-white">
                <div class="mt-48 mb-48 py-12 px-6 mx-auto max-w-screen-lg text-center lg:py-20 space-y-8 z-10">
                    <h1 class="animate-fade-in-down mb-6 text-5xl font-extrabold tracking-tight leading-tight lg:text-7xl drop-shadow-lg allura-font">
                        Welcome to Philippine <br>Lake-Wood Church
                    </h1>
                    <p class="animate-fade-in-up mb-6 text-lg font-light lg:text-xl sm:px-8 lg:px-20">
                        Our church has been a beacon of hope and faith in this community for over 14 years. Join us as we share the love of God and strive to make a positive impact in the world.
                    </p>
                </div>
            </section>
        </div>

        <!-- Pastor Section -->
        <section class="py-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="animate-on-scroll text-4xl font-bold mb-12 text-center allura-font">Meet Our Pastor</h2>
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="animate-on-scroll md:w-1/3 mb-8 md:mb-0">
                        <img src="/images/pastor_bg.jpg" alt="Pastor Kim-Young Jin" class="hover-rotate rounded-full w-64 h-64 object-cover mx-auto shadow-lg" />
                    </div>
                    <div class="animate-on-scroll md:w-2/3 md:pl-12">
                        <h3 class="text-2xl font-semibold mb-4">Pastor Kim Youngjin</h3>
                        <p class="text-lg mb-6">Pastor Kim Youngjin has been leading our church with compassion and vision for over a decade. His passion for spreading the word of God has touched the lives of many and continues to inspire our congregation to grow in faith and service.</p>
                        <blockquote class="italic text-xl mb-6">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"</blockquote>
                    </div>
                </div>
            </div>
        </section>

        <section class="animate-on-scroll py-20 bg-blue-700 text-white text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold mb-8 allura-font">Join Our Community</h2>
                <p class="text-xl mb-12">Experience the warmth and fellowship of our church family. We welcome you with open arms!</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/#time-sched-section" class="animate-bounce-slow inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300">Service Times</a>
                    <a href="#footer-section" class="animate-bounce-slow inline-block bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition duration-300">Contact Us</a>
                </div>
            </div>
        </section>

        <Footer id="footer-section"/>
    </div>
</template>

<style scoped>
.allura-font {
    font-family: 'Allura', cursive;
}

/* Fade in animations */
.animate-fade-in-down {
    animation: fadeInDown 1s ease-out;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out 0.5s;
    opacity: 0;
    animation-fill-mode: forwards;
}

.animate-fade-in {
    animation: fadeIn 1s ease-out 1s;
    opacity: 0;
    animation-fill-mode: forwards;
}

/* Scroll animations */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.animate-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Hover animations */
.hover-rotate {
    transition: transform 0.5s ease-in-out;
}

.hover-rotate:hover {
    transform: rotate(5deg) scale(1.05);
}

/* Slow pulse animation for buttons */
.animate-pulse-slow {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* Slow bounce animation */
.animate-bounce-slow {
    animation: bounce 2s infinite;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
}
</style>

<script>

export default {
    mounted() {
        this.handleScrollAnimations();
        window.addEventListener('scroll', this.handleScrollAnimations);
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.handleScrollAnimations);
    },
    methods: {
        handleScrollAnimations() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const isVisible = rect.top <= window.innerHeight * 0.8;
                if (isVisible) {
                    element.classList.add('visible');
                }
            });
        }
    }
};
</script>