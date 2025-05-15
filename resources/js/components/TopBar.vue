<script lang="ts" setup>
import { User } from 'lucide-vue-next';

function showMenu() {
    // Show profile menu
}
</script>

<template>
    <div class="p-10 text-end md:py-8 dark:text-white">
        <button @click="showMenu()" class="btn">
            <User />
        </button>
    </div>
</template>
