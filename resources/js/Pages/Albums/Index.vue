<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    albums: Array,
    users: Array
});

const search = ref('');
const selectedUser = ref('');

const filteredAlbums = computed(() => {
    let filtered = props.albums;

    if (selectedUser.value) {
        filtered = filtered.filter(album => album.userId.toString() === selectedUser.value);
    }

    if (search.value) {
        const searchLower = search.value.toLowerCase();
        filtered = filtered.filter(album => album.title.toLowerCase().includes(searchLower));
    }

    return filtered;
});
</script>

<template>
    <Head title="Albums" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Albums</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-4 flex flex-col md:flex-row gap-4">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search albums..."
                                class="border-gray-300 rounded-md shadow-sm flex-grow"
                            />

                            <select
                                v-model="selectedUser"
                                class="border-gray-300 rounded-md shadow-sm"
                            >
                                <option value="">All Users</option>
                                <option v-for="user in users" :key="user.id" :value="user.id.toString()">
                                    {{ user.name }}
                                </option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div v-for="album in filteredAlbums" :key="album.id"
                                class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                                <h4 class="font-medium mb-2">{{ album.title }}</h4>
                                <p class="text-sm text-gray-600 mb-2">
                                    <span class="font-medium">By:</span> {{ album.user.name }}
                                </p>
                                <Link :href="route('albums.show', album.id)" class="text-blue-600 hover:underline mt-2 inline-block">
                                    View Photos
                                </Link>
                            </div>
                            <div v-if="filteredAlbums.length === 0"
                                class="col-span-full text-center py-4 text-gray-500">
                                No albums found.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
