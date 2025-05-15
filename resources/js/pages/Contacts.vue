<script setup lang="ts">
import ContactListItem from '@/components/ContactListItem.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Contact } from '@/types';
import { Plus } from 'lucide-vue-next';
import { ref } from 'vue';

// defineProps<{ contacts: Contact[] }>();

const contacts = ref<Contact[]>([
    { id: 1, firstName: 'Alice', lastName: 'Johnson', phoneNumber: '+12345678901' },
    { id: 2, firstName: 'Bob', lastName: 'Smith', phoneNumber: '+12345678902' },
    { id: 3, firstName: 'Carol', lastName: 'Williams', phoneNumber: '+12345678903' },
    { id: 4, firstName: 'David', lastName: 'Brown', phoneNumber: '+12345678904' },
    { id: 5, firstName: 'Eve', lastName: 'Jones', phoneNumber: '+12345678905' },
    { id: 6, firstName: 'Frank', lastName: 'Garcia', phoneNumber: '+12345678906' },
    { id: 7, firstName: 'Grace', lastName: 'Martinez', phoneNumber: '+12345678907' },
    { id: 8, firstName: 'Henry', lastName: 'Rodriguez', phoneNumber: '+12345678908' },
    { id: 9, firstName: 'Ivy', lastName: 'Lee', phoneNumber: '+12345678909' },
    { id: 10, firstName: 'Jack', lastName: 'Walker', phoneNumber: '+12345678910' },
    { id: 11, firstName: 'Kathy', lastName: 'Hall', phoneNumber: '+12345678911' },
    { id: 12, firstName: 'Leo', lastName: 'Allen', phoneNumber: '+12345678912' },
    { id: 13, firstName: 'Mona', lastName: 'Young', phoneNumber: '+12345678913' },
    { id: 14, firstName: 'Nate', lastName: 'Hernandez', phoneNumber: '+12345678914' },
    { id: 15, firstName: 'Olivia', lastName: 'King', phoneNumber: '+12345678915' },
    { id: 16, firstName: 'Paul', lastName: 'Wright', phoneNumber: '+12345678916' },
    { id: 17, firstName: 'Quinn', lastName: 'Lopez', phoneNumber: '+12345678917' },
    { id: 18, firstName: 'Rita', lastName: 'Hill', phoneNumber: '+12345678918' },
    { id: 19, firstName: 'Sam', lastName: 'Scott', phoneNumber: '+12345678919' },
    { id: 20, firstName: 'Tina', lastName: 'Green', phoneNumber: '+12345678920' },
]);
</script>

<template>
    <Head title="Contacts" />

    <AppLayout>
        <h1 class="sticky top-0 z-10 bg-white py-4 text-4xl font-bold">Contacts</h1>
        <button class="btn btn-primary fixed right-4 lg:right-20 bottom-20 ms-4 rounded-full p-3 font-semibold lg:p-5"><Plus stroke-width="3" /> Add Contact</button>
        <div class="pb-26">
            <ContactListItem v-for="contact of contacts" :key="contact.id" :contact />
        </div>
    </AppLayout>
</template>
