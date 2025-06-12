<template>
    <Head title=" | Register " />
    <div
        class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4"
    >
        <form
            class="w-full max-w-md bg-white shadow-md rounded-lg p-8 space-y-6"
            @submit.prevent="submitForm"
        >
            <h2 class="text-2xl font-bold text-center text-gray-600">
                Register
            </h2>

            <TextInput
                name="name"
                v-model="form.name"
                type="text"
                :message="form.errors.name"
            />
            <TextInput
                name="email"
                v-model="form.email"
                type="email"
                :message="form.errors.email"
            />
            <TextInput
                name="password"
                v-model="form.password"
                type="password"
                :message="form.errors.password"
            />
            <TextInput
                name="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                :message="form.errors.password_confirmation"
            />

            <button
                type="submit"
                :discabled="form.processing"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
            >
                Register
            </button>
            <p class="text-center text-gray-500">
                aleardy have an account?
                <Link
                    :href="route('login')"
                    class="text-blue-600 hover:underline"
                    >login
                </Link>
            </p>
        </form>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "@/component/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

function submitForm() {
    form.post(route("register.store"), {
        onError: () => form.reset("password_confirmation", "password"),
    });
}
</script>
