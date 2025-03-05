<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
    <Head title="Welcome" />
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold text-center mb-6">QA Assessment Application</h1>
            <p class="text-gray-600 mb-6 text-center">
                Welcome to our application that showcases users, albums, and photos
                from JSONPlaceholder.
            </p>
            <div class="flex justify-center">
                <template v-if="user">
                    <Link
                        :href="route('dashboard')"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Dashboard
                    </Link>
                </template>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                    >
                        Login
                    </Link>
                    <Link
                        :href="route('register')"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                    >
                        Register
                    </Link>
                </template>
            </div>
        </div>
    </div>
</template>
