<script setup lang="ts">
import ContactListItem from '@/components/ContactListItem.vue';
import EmptyState from '@/components/EmptyState.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Contact } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Plus } from 'lucide-vue-next';

defineProps<{ contacts: Contact[] }>();
</script>

<template>
    <Head title="Contacts" />

    <AppLayout>
        <h1 class="sticky top-0 z-10 bg-white py-4 text-4xl font-bold">Contacts</h1>

        <Link href="/contacts/add">
            <button class="btn btn-primary fixed top-28 left-4 ms-4 rounded-full p-3 font-semibold lg:px-5">
                <Plus stroke-width="3" /> Add Contact
            </button>
        </Link>

        <div v-if="contacts.length">
            <ContactListItem v-for="contact of contacts" :key="contact.id" :contact />
        </div>

        <EmptyState v-else message="No Contacts" />
    </AppLayout>
</template>
