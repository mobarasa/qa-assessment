<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    photos: Array,
    albumId: Number
});

const search = ref('');
const filteredPhotos = computed(() => {
    if (!search.value) return props.photos;
    const searchLower = search.value.toLowerCase();
    return props.photos.filter(photo => photo.title.toLowerCase().includes(searchLower));
});
</script>

<template>
    <Head title="Album Photos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" data-testid="album-photos-header">Album Photos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-6">
                    <Link :href="route('albums.index')" class="text-blue-600 hover:underline">
                        &larr; Back to Albums
                    </Link>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-4">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search photos..."
                                class="border-gray-300 rounded-md shadow-sm w-full md:w-1/3"
                            />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <div v-for="photo in filteredPhotos" :key="photo.id"
                                class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md">
                                <Link :href="route('photos.show', photo.id)">
                                    <img :src="photo.thumbnailUrl" :alt="photo.title" class="w-full h-32 object-cover" />
                                    <div class="p-2">
                                        <p class="text-sm truncate" :title="photo.title">{{ photo.title }}</p>
                                    </div>
                                </Link>
                            </div>
                            <div v-if="filteredPhotos.length === 0"
                                class="col-span-full text-center py-4 text-gray-500">
                                No photos found.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
