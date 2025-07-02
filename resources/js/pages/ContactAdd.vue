<script lang="ts" setup>
import InputError from '@/components/InputError.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ArrowLeft, LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    first_name: '',
    last_name: '',
    phone_number: '',
});

function submit() {
    form.post('/contacts');
}
</script>

<template>
    <AppLayout>
        <div class="mb-10 flex items-center text-lg font-medium">
            <Link href="/contacts">
                <button class="btn btn-primary me-3"><ArrowLeft /></button>
            </Link>
            Go Back
        </div>

        <h1 class="sticky top-0 z-10 bg-white py-4 text-2xl font-bold">Add a Contact</h1>

        <form @submit.prevent="submit">
            <div class="grid gap-6 lg:w-120">
                <div>
                    <label class="form-label" for="first-name">First Name</label>
                    <input id="first-name" type="text" required autofocus v-model="form.first_name" placeholder="First name" class="form-control" />
                    <InputError :message="form.errors.first_name" />
                </div>

                <div>
                    <label class="form-label" for="last-name">Last Name</label>
                    <input id="last-name" type="text" autofocus v-model="form.last_name" placeholder="Last name" class="form-control" />
                    <InputError :message="form.errors.last_name" />
                </div>

                <div>
                    <label class="form-label" for="phone">Phone Number</label>
                    <input id="phone" type="tel" required autofocus v-model="form.phone_number" placeholder="Phone number" class="form-control" />
                    <InputError :message="form.errors.phone_number" />
                </div>

                <button type="submit" class="btn btn-primary" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Save
                </button>
            </div>
        </form>
    </AppLayout>
</template>
