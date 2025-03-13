<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" data-testid="dashboard-header">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Welcome to your dashboard!</h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <h4 class="font-bold text-lg">Users</h4>
                                <p class="text-3xl font-bold">{{ stats.users }}</p>
                                <Link :href="route('users.index')" class="text-blue-600 hover:underline">
                                    View all users
                                </Link>
                            </div>

                            <div class="bg-green-100 p-4 rounded-lg">
                                <h4 class="font-bold text-lg">Albums</h4>
                                <p class="text-3xl font-bold">{{ stats.albums }}</p>
                                <Link :href="route('albums.index')" class="text-green-600 hover:underline">
                                    View all albums
                                </Link>
                            </div>

                            <div class="bg-purple-100 p-4 rounded-lg">
                                <h4 class="font-bold text-lg">Photos</h4>
                                <p class="text-3xl font-bold">{{ stats.photos }}</p>
                                <Link :href="route('photos.index')" class="text-purple-600 hover:underline">
                                    View all photos
                                </Link>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">Quick Links</h4>
                            <div class="flex flex-wrap gap-2">
                                <Link :href="route('users.index')" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                    Users
                                </Link>
                                <Link :href="route('albums.index')" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                    Albums
                                </Link>
                                <Link :href="route('photos.index')" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded">
                                    Photos
                                </Link>
                                <Link :href="route('profile.edit')" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded">
                                    Profile
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
