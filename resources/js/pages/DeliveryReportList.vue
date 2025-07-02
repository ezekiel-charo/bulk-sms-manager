<script setup lang="ts">
import DeliveryReportListItem from '@/components/DeliveryReportListItem.vue';
import EmptyState from '@/components/EmptyState.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { DeliveryReport } from '@/types';
import { Head } from '@inertiajs/vue3';

defineProps<{ deliveryReports: DeliveryReport[] }>();
</script>

<template>
    <Head title="Delivery Reports" />

    <AppLayout>
        <h1 class="sticky top-0 z-10 bg-white py-4 text-4xl font-bold">Delivery Reports</h1>

        <div v-if="deliveryReports.length">
            <DeliveryReportListItem v-for="report of deliveryReports" :key="report.id" :report />
        </div>

        <EmptyState v-else message="No delivery reports" />
    </AppLayout>
</template>
