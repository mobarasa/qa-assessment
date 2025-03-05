<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    user: Object,
    albums: Array
});
</script>

<template>
    <Head title="User Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-6">
                    <Link :href="route('users.index')" class="text-blue-600 hover:underline">
                        &larr; Back to Users
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold mb-4">{{ user.name }}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold mb-2">Personal Information:</h4>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li><span class="font-medium">Username:</span> {{ user.username }}</li>
                                    <li><span class="font-medium">Email:</span> {{ user.email }}</li>
                                    <li><span class="font-medium">Phone:</span> {{ user.phone }}</li>
                                    <li><span class="font-medium">Website:</span> {{ user.website }}</li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="font-semibold mb-2">Company:</h4>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li><span class="font-medium">Name:</span> {{ user.company.name }}</li>
                                    <li><span class="font-medium">Catchphrase:</span> {{ user.company.catchPhrase }}</li>
                                    <li><span class="font-medium">Business:</span> {{ user.company.bs }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4 class="font-semibold mb-2">Address:</h4>
                            <ul class="list-disc pl-5 space-y-1">
                                <li><span class="font-medium">Street:</span> {{ user.address.street }}</li>
                                <li><span class="font-medium">Suite:</span> {{ user.address.suite }}</li>
                                <li><span class="font-medium">City:</span> {{ user.address.city }}</li>
                                <li><span class="font-medium">Zipcode:</span> {{ user.address.zipcode }}</li>
                                <li><span class="font-medium">Geo:</span> Lat: {{ user.address.geo.lat }}, Lng: {{ user.address.geo.lng }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-xl font-bold mb-4">User Albums ({{ albums.length }})</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div v-for="album in albums" :key="album.id" class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                                <h4 class="font-medium">{{ album.title }}</h4>
                                <Link :href="route('albums.show', album.id)" class="text-blue-600 hover:underline mt-2 inline-block">
                                    View Photos
                                </Link>
                            </div>
                            <div v-if="albums.length === 0" class="col-span-full text-center py-4 text-gray-500">
                                This user has no albums.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
