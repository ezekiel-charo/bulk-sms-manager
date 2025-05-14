<script lang="ts" setup>
import { Contact } from '@/types';
import { Link, router } from '@inertiajs/vue3';
import { ContactRound, Pencil, Trash } from 'lucide-vue-next';

defineProps<{ contact: Contact }>();

function deleteContact(id: number): void {
    if (confirm('Delete contact?')) {
        router.delete(`/contacts/${id}`);
    }
}
</script>

<template>
    <div class="flex cursor-pointer items-center border-b border-gray-200 p-2 pe-6 hover:bg-gray-50 dark:hover:bg-slate-900">
        <span class="me-5 text-6xl text-gray-600 dark:text-stone-300">
            <ContactRound />
        </span>

        <div class="grow dark:text-stone-300">
            <div class="mb-1 text-base font-medium text-gray-600">{{ contact.first_name }} {{ contact.last_name }}</div>
            <div class="text-xs font-medium text-gray-600 dark:text-gray-400">{{ contact.phone_number }}</div>
        </div>

        <Link :href="`/contacts/${contact.id}/edit`">
            <button class="btn text-primary">
                <Pencil :size="14" />
            </button>
        </Link>

        <button @click="deleteContact(contact.id)" class="btn ms-3 text-red-500">
            <Trash :size="14" />
        </button>
    </div>
</template>
