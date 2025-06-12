<template>
    <div class="dashboard">
        <h1 class="text-2xl font-bold mb-4">Users</h1>
        <div>
            <input
                type="text"
                placeholder="Search users..."
                class="border p-2 rounded w-50 mb-4"
                v-model="search"
            />
        </div>
        <table class="min-w-full bg-white border" v-if="users.data.length">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b" v-if="can.delete">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td class="py-2 px-4 border-b">{{ user.id }}</td>
                    <td class="py-2 px-4 border-b">{{ user.name }}</td>
                    <td class="py-2 px-4 border-b">{{ user.email }}</td>
                    <td class="py-2 px-4 border-b" v-if="can.delete">
                        <span
                            class="inline-block w-3 h-3 bg-red-500 rounded-full"
                        ></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else class="text-center text-gray-500 py-4">
            No users data found".
        </div>
        <links :data="users" :limit="2" @pagination-change-page="getResults">
            <template #prev-nav>p-n</template>
            <template #next-nav>n-n</template>
        </links>
    </div>
</template>

<script setup>
import { defineProps, onMounted, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";
onMounted(() => {
    console.log(toast);
});
defineProps({
    users: Object,
    can: Object,
});

const search = ref("");
watch(
    search,
    debounce(
        (q) =>
            router.get(
                route("dashboard"),
                {
                    search: q,
                },
                {
                    preserveState: true,
                }
            ),
        1000
    )
);

const getResults = async (page = 1) => {
    const response = await router.get(
        route("dashboard", {
            page: page || 1,
            search: search.value || "",
        }),
        {},
        {
            preserveState: true,
        }
    );
    users.value = await response.json();
};
getResults();
</script>

<style scoped>
.dashboard {
    max-width: 800px;
    margin: 2rem auto;
}
</style>
