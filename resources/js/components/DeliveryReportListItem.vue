<script lang="ts" setup>
import { DeliveryReport } from '@/types';
import { Contact, Phone } from 'lucide-vue-next';

defineProps<{ position: number; report: DeliveryReport }>();
</script>

<template>
    <div class="grid cursor-pointer grid-cols-3 items-center gap-4 border-b border-gray-200 p-3 pe-6 hover:bg-gray-50">
        <div class="flex grow items-center gap-2 font-medium text-gray-700">
            <span class="text-gray-500">{{ position }}.</span>
            <Contact />
            <span> {{ report.first_name }} {{ report.last_name }} </span>
        </div>

        <div class="flex grow items-center gap-2 font-semibold text-gray-700"><Phone :size="12" /> {{ report.phone_number }}</div>

        <div class="text-end">
            <span v-if="report.pivot.delivered" class="text-primary rounded bg-gray-100 p-1">Delivered</span>
            <span v-else class="rounded bg-gray-100 p-1 text-yellow-700">Not Delivered</span>
        </div>
    </div>
</template>
