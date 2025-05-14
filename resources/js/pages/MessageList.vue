<script setup lang="ts">
import MessageListItem from '@/components/MessageListItem.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Message } from '@/types';
import { Pencil } from 'lucide-vue-next';

defineProps<{ messages: Message[] }>();
</script>

<template>
    <Head title="Contacts" />

    <AppLayout>
        <h1 class="sticky top-0 z-10 bg-white py-4 text-4xl font-bold">Messages</h1>
        <button class="btn btn-primary fixed top-28 left-4 ms-4 rounded-full p-3 font-semibold lg:px-5">
            <Pencil stroke-width="3" :size="16" /> <span class="ms-1">Compose</span>
        </button>
        <MessageListItem v-for="message of messages" :key="message.id" :message />
    </AppLayout>
</template>
