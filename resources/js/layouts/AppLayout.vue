<script setup lang="ts">
import BottomMenu from '@/components/BottomMenu.vue';
import SideNav from '@/components/SideNav.vue';
import TopBar from '@/components/TopBar.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <div class="fixed top-0 bottom-0 left-0 hidden w-[240px] md:block">
        <SideNav />
    </div>
    <div class="md:ms-[200px]">
        <div class="fixed top-0 right-0">
            <TopBar />
        </div>
        <div class="mt-8 sm:mb-8">
            <slot />
        </div>
    </div>
    <div class="fixed right-0 bottom-0 left-0 bg-slate-50 md:hidden dark:bg-slate-900">
        <BottomMenu />
    </div>
</template>
