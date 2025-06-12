<template>
    <Head title=" | Login " />
    <div
        class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4"
    >
        <form
            class="w-full max-w-md bg-white shadow-md rounded-lg p-8 space-y-6"
            @submit.prevent="submitForm"
        >
            <h2 class="text-2xl font-bold text-center text-gray-600">
                Login To Your Account
            </h2>

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
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center text-gray-600">
                    <input
                        type="checkbox"
                        class="form-checkbox h-4 w-4 text-blue-600"
                        v-model="form.remember"
                    />
                    <span class="ml-2">Remember Me</span>
                </label>
            </div>

            <button
                type="submit"
                :discabled="form.processing"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
            >
                Login
            </button>

            <p class="text-center text-gray-500">
                Don't have an account?
                <Link href="/register" class="text-blue-600 hover:underline"
                    >Register</Link
                >
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
    remember: false,
});

function submitForm() {
    form.post(route("login.store"), {
        onError: () => {
            form.reset("password");
        },
    });
}
</script>
