<script setup lang="ts">
import EmptyState from '@/components/EmptyState.vue';
import MessageListItem from '@/components/MessageListItem.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Message } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Pencil } from 'lucide-vue-next';

defineProps<{ messages: Message[] }>();
</script>

<template>
    <Head title="Contacts" />

    <AppLayout>
        <h1 class="sticky top-0 z-10 bg-white py-4 text-4xl font-bold">Messages</h1>

        <Link href="messages/compose">
            <button class="btn btn-primary fixed top-28 left-4 ms-4 rounded-full p-3 font-semibold lg:px-5">
                <Pencil stroke-width="3" :size="16" /> <span class="ms-1">Compose</span>
            </button>
        </Link>

        <div v-if="messages.length">
            <MessageListItem v-for="message of messages" :key="message.id" :message />
        </div>

        <EmptyState v-else message="No Messages" />
    </AppLayout>
</template>
