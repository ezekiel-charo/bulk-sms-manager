<script setup lang="ts">
import LogoWhite from '@/components/LogoWhite.vue';
import { Link } from '@inertiajs/vue3';
import { MessageSquareMore } from 'lucide-vue-next';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex">
            <div class="absolute inset-0 flex flex-col items-center justify-center bg-zinc-900">
                <span class="text-green-900">
                    <MessageSquareMore :size="120" strokeWidth="3" />
                </span>
                <p class="mt-3 text-sm font-medium text-gray-400">Engange customers via SMS</p>
            </div>
            <Link :href="route('home')" class="relative z-20 flex items-center text-lg font-medium">
                <LogoWhite />
            </Link>
        </div>
        <div class="lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                <div class="flex flex-col space-y-2 text-center">
                    <h1 class="text-xl font-medium tracking-tight" v-if="title">{{ title }}</h1>
                    <p class="text-muted-foreground text-sm" v-if="description">{{ description }}</p>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
