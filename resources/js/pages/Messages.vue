<script setup lang="ts">
import MessageListItem from '@/components/MessageListItem.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Message } from '@/types';
import { ref } from 'vue';

const messages = ref<Message[]>([
    { id: 1, recipientIds: [1, 2], numDelivered: 2, content: 'Hello, this is a test message 1.' },
    { id: 2, recipientIds: [3], numDelivered: 1, content: 'Reminder: Meeting at 10 AM.' },
    { id: 3, recipientIds: [4, 5, 6], numDelivered: 3, content: 'Your verification code is 123456.' },
    { id: 4, recipientIds: [7], numDelivered: 1, content: 'Happy Birthday!' },
    { id: 5, recipientIds: [8, 9], numDelivered: 2, content: "Don't forget to submit your report." },
    { id: 6, recipientIds: [10], numDelivered: 1, content: 'Your appointment is confirmed.' },
    { id: 7, recipientIds: [11, 12], numDelivered: 2, content: 'Welcome to our service!' },
    { id: 8, recipientIds: [13], numDelivered: 1, content: 'Your order has been shipped.' },
    { id: 9, recipientIds: [14, 15], numDelivered: 2, content: 'Please update your profile.' },
    { id: 10, recipientIds: [16], numDelivered: 1, content: 'Thank you for your feedback.' },
    { id: 11, recipientIds: [17, 18], numDelivered: 2, content: 'System maintenance tonight at 12 AM.' },
    { id: 12, recipientIds: [19], numDelivered: 1, content: 'Your password has been reset.' },
    { id: 13, recipientIds: [20], numDelivered: 1, content: 'Congratulations on your achievement!' },
    { id: 14, recipientIds: [1, 3], numDelivered: 2, content: 'Check out our new features.' },
    { id: 15, recipientIds: [2, 4], numDelivered: 2, content: 'Your subscription is expiring soon.' },
    { id: 16, recipientIds: [5], numDelivered: 1, content: 'Payment received. Thank you!' },
    { id: 17, recipientIds: [6, 7], numDelivered: 2, content: 'Weekly newsletter: Updates inside.' },
    { id: 18, recipientIds: [8], numDelivered: 1, content: 'Your ticket has been resolved.' },
    { id: 19, recipientIds: [9, 10], numDelivered: 2, content: 'Invitation to our event.' },
    { id: 20, recipientIds: [11], numDelivered: 1, content: 'Survey: Tell us what you think.' },
]);
</script>

<template>
    <Head title="Contacts" />

    <AppLayout>
        <h1 class="sticky top-0 z-10 bg-white py-4 text-4xl font-bold">Messages</h1>
        <MessageListItem v-for="message of messages" :key="message.id" :message />
    </AppLayout>
</template>
