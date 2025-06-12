<template>
    <div>
        <label class="block text-sm font-medium text-gray-700">{{
            name
        }}</label>
        <input
            :type="type"
            v-model="model"
            :class="[
                'mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500',
                { '!ring-red-950': message },
            ]"
        />
        <small v-if="message" class="text-red-600"> {{ message }}</small>
    </div>
</template>
<script setup>
import { defineProps, defineModel } from "vue";
const model = defineModel({
    type: null,
    required: true,
});
const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    message: String,
});
</script>
