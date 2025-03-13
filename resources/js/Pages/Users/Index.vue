<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    users: Array
});

const search = ref('');
const filteredUsers = computed(() => {
    if (!search.value) return props.users;
    const searchLower = search.value.toLowerCase();
    return props.users.filter(user =>
        user.name.toLowerCase().includes(searchLower) ||
        user.email.toLowerCase().includes(searchLower) ||
        user.username.toLowerCase().includes(searchLower)
    );
});
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" data-testid="users-header">Users</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-4">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search users..."
                                class="border-gray-300 rounded-md shadow-sm w-full md:w-1/3"
                            />
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b text-left">Name</th>
                                        <th class="py-2 px-4 border-b text-left">Username</th>
                                        <th class="py-2 px-4 border-b text-left">Email</th>
                                        <th class="py-2 px-4 border-b text-left">Company</th>
                                        <th class="py-2 px-4 border-b text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="user in filteredUsers" :key="user.id" class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ user.name }}</td>
                                        <td class="py-2 px-4 border-b">{{ user.username }}</td>
                                        <td class="py-2 px-4 border-b">{{ user.email }}</td>
                                        <td class="py-2 px-4 border-b">{{ user.company.name }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <Link
                                                :href="route('users.show', user.id)"
                                                class="text-blue-600 hover:underline"
                                            >
                                                View Details
                                            </Link>
                                        </td>
                                    </tr>
                                    <tr v-if="filteredUsers.length === 0">
                                        <td colspan="5" class="py-4 text-center text-gray-500">No users found.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
