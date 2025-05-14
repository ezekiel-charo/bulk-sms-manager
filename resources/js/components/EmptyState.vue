<script setup lang="ts">
import { Cloudy } from 'lucide-vue-next';

defineProps<{ message: string }>();
</script>

<template>
    <div class="flex flex-col items-center p-5 py-20 text-gray-400">
        <Cloudy :size="96" stroke-width="3" />
        <div class="mt-5 font-medium">- {{ message }} -</div>
    </div>
</template>
