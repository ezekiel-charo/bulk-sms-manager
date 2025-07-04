<script setup lang="ts">
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link, LoaderCircle } from 'lucide-vue-next';

defineProps<{
    status?: string;
}>();

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};
</script>

<template>
    <AuthLayout title="Verify email" description="Please verify your email address by clicking on the link we just emailed to you.">
        <Head title="Email verification" />

        <div v-if="status === 'verification-link-sent'" class="mb-4 text-center text-sm font-medium text-green-600">
            A new verification link has been sent to the email address you provided during registration.
        </div>

        <form @submit.prevent="submit" class="space-y-6 text-center">
            <button :disabled="form.processing" class="btn border-primary">
                <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                Resend verification email
            </button>

            <Link :href="route('logout')" method="post">
                <button class="btn">Log out</button>
            </Link>
        </form>
    </AuthLayout>
</template>
