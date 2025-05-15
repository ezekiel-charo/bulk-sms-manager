<script setup lang="ts">
import BottomNav from '@/components/BottomNav.vue';
import SideNav from '@/components/SideNav.vue';
</script>

<template>
    <div class="fixed top-0 bottom-0 left-0 hidden w-[240px] md:block">
        <SideNav />
    </div>

    <div class="md:ms-[200px]">
        <div class="mt-10 p-4 sm:mb-8 lg:px-10 lg:ps-20">
            <slot />
        </div>
    </div>

    <div class="fixed right-0 bottom-0 left-0 bg-slate-50 md:hidden dark:bg-slate-900">
        <BottomNav />
    </div>
</template>
