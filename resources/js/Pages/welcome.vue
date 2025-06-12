<template>
    <Head title=" | Home" />
    <div class="welcome">
        <h1>Welcome to the Inertia.js + Vue.js App!</h1>
        <p>This is your new welcome component.</p>
        <p>Hello, {{ name }}!</p>
        <p v-if="$page.props.auth.user">{{ $page.props.auth.user.email }}</p>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
const props = defineProps({
    name: {
        type: String,
        default: "Guest",
    },
});
</script>

<style scoped>
.welcome {
    text-align: center;
    margin-top: 50px;
}
</style>
