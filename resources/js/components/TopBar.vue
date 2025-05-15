<script lang="ts" setup>
import { LogOut } from 'lucide-vue-next';

function logOut() {
    // TODO: logout logic
    console.log('loggin out...');
}
</script>

<template>
    <div class="p-10 text-end md:py-8 dark:text-white">
        <button @click="logOut()" class="btn">
            <LogOut strokeWidth="2" />
        </button>
    </div>
</template>
