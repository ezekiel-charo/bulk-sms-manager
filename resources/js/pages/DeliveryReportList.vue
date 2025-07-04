<script setup lang="ts">
import DeliveryReportListItem from '@/components/DeliveryReportListItem.vue';
import EmptyState from '@/components/EmptyState.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { DeliveryReport } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeft } from 'lucide-vue-next';
import { onMounted } from 'vue';

const props = defineProps<{ deliveryReports: DeliveryReport[] }>();

onMounted(() => {
    console.log(props.deliveryReports);
});
</script>

<template>
    <Head title="Delivery Reports" />

    <AppLayout>
        <div class="mb-10 flex items-center text-lg font-medium">
            <Link href="/messages">
                <button class="btn btn-primary me-3"><ArrowLeft /></button>
            </Link>
            Go Back
        </div>

        <h1 class="sticky top-0 z-10 bg-white py-4 text-2xl font-bold">Delivery Reports</h1>

        <div v-if="deliveryReports.length">
            <DeliveryReportListItem v-for="(report, position) of deliveryReports" :key="report.id" :report :position="position + 1" />
        </div>

        <EmptyState v-else message="No delivery reports" />
    </AppLayout>
</template>
