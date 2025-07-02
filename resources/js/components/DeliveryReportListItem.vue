<script lang="ts" setup>
import { DeliveryReport } from '@/types';
import { Link } from '@inertiajs/vue3';
import { Eye, MessageCircle } from 'lucide-vue-next';

defineProps<{ report: DeliveryReport }>();
</script>

<template>
    <div class="flex cursor-pointer items-center border-b border-gray-200 p-2 pe-6 hover:bg-gray-50 dark:hover:bg-slate-900">
        <span class="me-5 text-6xl text-gray-600 dark:text-stone-300">
            <MessageCircle />
        </span>

        <div class="grow dark:text-stone-300">
            <div class="mb-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ report.recipient_name }}: {{ report.recipient_number }}</div>
            <div class="font-medium text-gray-600">
                <span v-if="report.delivered" class="text-primary rounded bg-gray-100 p-1">Delivered</span>
                <span v-else class="rounded bg-gray-100 p-1 text-yellow-700">Not Delivered</span>
            </div>
        </div>

        <Link href="view-delivery-reports">
            <button class="btn text-primary">
                <Eye :size="14" />
            </button>
        </Link>
    </div>
</template>
