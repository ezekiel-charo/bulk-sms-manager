<script lang="ts" setup>
import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Contact } from '@/types';
import { Link, useForm } from '@inertiajs/vue3';
import { ArrowLeft, LoaderCircle } from 'lucide-vue-next';

defineProps<{ contacts: Contact[] }>();

const form = useForm({
    recipient_ids: '',
    content: '',
});

function submit() {
    form.post('/messages');
}
</script>

<template>
    <AppLayout>
        <div class="mb-10 flex items-center text-lg font-medium">
            <Link href="/messages">
                <button class="btn btn-primary me-3"><ArrowLeft /></button>
            </Link>
            Go Back
        </div>

        <h1 class="sticky top-0 z-10 bg-white py-4 text-2xl font-bold">Compose a Message</h1>

        <form @submit.prevent="submit">
            <div class="grid gap-6 lg:w-120">
                <div>
                    <label class="form-label" for="first-name">Select Recipients</label>
                    <select id="first-name" v-model="form.recipient_ids" placeholder="Select Recipients" class="form-control" required multiple>
                        <option v-for="contact of contacts" :key="contact.id" :value="contact.id">
                            {{ contact.first_name }} {{ contact.last_name }}: {{ contact.phone_number }}
                        </option>
                    </select>
                    <InputError :message="form.errors.recipient_ids" />
                </div>
                <div>
                    <label class="form-label" for="phone">Message</label>
                    <textarea id="phone" rows="5" v-model="form.content" placeholder="Enter message" class="form-control" required></textarea>
                    <InputError :message="form.errors.content" />
                </div>

                <button type="submit" class="btn btn-primary" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Save
                </button>
            </div>
        </form>
    </AppLayout>
</template>
