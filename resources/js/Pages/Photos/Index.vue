<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    photos: Array,
    albums: Array
});

const search = ref('');
const selectedAlbum = ref('');
const page = ref(1);
const perPage = 20;

const albumOptions = computed(() => {
    return props.albums.map(album => ({
        value: album.id.toString(),
        label: `Album ${album.id}: ${album.title.slice(0, 30)}${album.title.length > 30 ? '...' : ''}`
    }));
});

const filteredPhotos = computed(() => {
    let filtered = props.photos;

    if (selectedAlbum.value) {
        filtered = filtered.filter(photo => photo.albumId.toString() === selectedAlbum.value);
    }

    if (search.value) {
        const searchLower = search.value.toLowerCase();
        filtered = filtered.filter(photo => photo.title.toLowerCase().includes(searchLower));
    }

    return filtered;
});

const paginatedPhotos = computed(() => {
    const start = (page.value - 1) * perPage;
    const end = start + perPage;
    return filteredPhotos.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredPhotos.value.length / perPage);
});

function nextPage() {
    if (page.value < totalPages.value) {
        page.value++;
    }
}

function prevPage() {
    if (page.value > 1) {
        page.value--;
    }
}

// Reset pagination when filters change
// watch([search, selectedAlbum], () => {
//     page.value = 1;
// });
</script>

<template>
    <Head title="Photos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" data-testid="photos-header">Photos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-4 flex flex-col md:flex-row gap-4">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search photos..."
                                class="border-gray-300 rounded-md shadow-sm flex-grow"
                            />

                            <select
                                v-model="selectedAlbum"
                                class="border-gray-300 rounded-md shadow-sm"
                            >
                                <option value="">All Albums</option>
                                <option v-for="option in albumOptions" :key="option.value" :value="option.value">
                                    {{ option.label }}
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <p class="text-gray-600">
                                Showing {{ paginatedPhotos.length }} of {{ filteredPhotos.length }} photos
                            </p>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                            <div v-for="photo in paginatedPhotos" :key="photo.id"
                                class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md">
                                <Link :href="route('photos.show', photo.id)">
                                    <img :src="photo.thumbnailUrl" :alt="photo.title" class="w-full h-24 object-cover" />
                                    <div class="p-2">
                                        <p class="text-xs truncate" :title="photo.title">{{ photo.title }}</p>
                                    </div>
                                </Link>
                            </div>
                            <div v-if="paginatedPhotos.length === 0"
                                class="col-span-full text-center py-4 text-gray-500">
                                No photos found.
                            </div>
                        </div>

                        <div class="mt-4 flex justify-between items-center" v-if="totalPages > 1">
                            <button
                                @click="prevPage"
                                :disabled="page === 1"
                                class="px-4 py-2 border rounded-md disabled:opacity-50"
                                :class="page === 1 ? 'bg-gray-100' : 'bg-blue-100 hover:bg-blue-200'"
                            >
                                Previous
                            </button>

                            <span>Page {{ page }} of {{ totalPages }}</span>

                            <button
                                @click="nextPage"
                                :disabled="page === totalPages"
                                class="px-4 py-2 border rounded-md disabled:opacity-50"
                                :class="page === totalPages ? 'bg-gray-100' : 'bg-blue-100 hover:bg-blue-200'"
                            >
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
