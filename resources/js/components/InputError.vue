<script lang="ts" setup>
defineProps<{ message?: string }>();
</script>

<template>
    <div v-if="message" class="text-xs text-red-500">{{ message }}</div>
</template>
