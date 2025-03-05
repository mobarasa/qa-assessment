<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    photo: Object
});
</script>

<template>
    <Head title="Photo Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Photo Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-6">
                    <Link :href="route('photos.index')" class="text-blue-600 hover:underline">
                        &larr; Back to Photos
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/2">
                                <img :src="photo.url" :alt="photo.title" class="w-full rounded-lg shadow-md" />
                            </div>

                            <div class="w-full md:w-1/2">
                                <h3 class="text-xl font-bold mb-4">{{ photo.title }}</h3>

                                <div class="space-y-4">
                                    <div>
                                        <h4 class="font-semibold">Album ID:</h4>
                                        <p>{{ photo.albumId }}</p>
                                        <Link :href="route('albums.show', photo.albumId)" class="text-blue-600 hover:underline">
                                            View Album
                                        </Link>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold">Thumbnail:</h4>
                                        <img :src="photo.thumbnailUrl" :alt="photo.title" class="w-24 h-24 mt-2 rounded" />
                                    </div>

                                    <div>
                                        <h4 class="font-semibold">Photo ID:</h4>
                                        <p>{{ photo.id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
