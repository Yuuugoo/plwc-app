<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <div class="grid md:grid-cols-2 items-center gap-6 bg-white max-w-7xl max-md:max-w-2xl mx-auto p-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
            <div class="w-full px-6 py-4">
                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <InputLabel for="email" value="Email" />
                        <div class="relative flex items-center">
                            <TextInput
                                name="email"
                                id="email"
                                type="email"
                                v-model="form.email"
                                required
                                autofocus
                                class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                placeholder="Enter email"
                            />
                        </div>
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-6">
                        <InputLabel for="password" value="Password" />
                        <div class="relative flex items-center">
                            <TextInput
                                id="password"
                                name="password"
                                v-model="form.password"
                                type="password"
                                required
                                class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                placeholder="Enter password"
                            />
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                        <div class="flex items-center">
                            <Checkbox id="remember-me" v-model="form.remember" />
                            <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                                Remember me
                            </label>
                        </div>
                        <div v-if="canResetPassword">
                            <a href="route('password.request')" class="text-blue-600 font-semibold text-sm hover:underline">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="mt-8">
                        <PrimaryButton type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wide rounded-md place-content-center text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Log in
                        </PrimaryButton>
                    </div>
                </form>
            </div>

            <div class="rounded-xl lg:p-12 p-8">
                <img src="/images/bg1.jpg" class="rounded-xl w-full h-full object-cover" alt="plwc-sample-bg">
            </div>
        </div>

    </GuestLayout>
</template>
