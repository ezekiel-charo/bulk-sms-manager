<script lang="ts" setup>
import { Message } from '@/types';
import { Link } from '@inertiajs/vue3';
import { Eye, MessageCircle } from 'lucide-vue-next';

defineProps<{ message: Message }>();
</script>

<template>
    <Link :href="`/messages/${message.id}/delivery-reports`">
        <div class="flex cursor-pointer items-center border-b border-gray-200 p-2 pe-6 hover:bg-gray-50 dark:hover:bg-slate-900">
            <span class="me-5 text-6xl text-gray-600 dark:text-stone-300">
                <MessageCircle />
            </span>

            <div class="grow dark:text-stone-300">
                <div class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ message.content }}</div>
                <div class="text-xs font-medium text-gray-600">
                    <span class="me-3">
                        Recipients:
                        <span class="rounded bg-gray-100 p-1 text-yellow-700">{{ message.num_recipients }}</span>
                    </span>
                    <span>
                        Delivered: <span class="text-primary rounded bg-gray-100 p-1">{{ message.num_delivered }}</span>
                    </span>
                </div>
            </div>

            <Link :href="`/messages/${message.id}/delivery-reports`">
                <button class="btn text-primary">
                    <Eye :size="14" />
                </button>
            </Link>
        </div>
    </Link>
</template>
