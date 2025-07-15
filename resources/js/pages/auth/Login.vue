<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthLayout title="Log in to your account" description="Enter your email and password below to log in">
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div>
                    <label class="form-label" for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        required
                        autofocus
                        autocomplete="email"
                        v-model="form.email"
                        placeholder="email@example.com"
                        class="form-control"
                    />
                    <InputError :message="form.errors.email" />
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label class="form-label" for="password">Password</label>
                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-primary text-sm">Forgot password?</Link>
                    </div>
                    <input
                        id="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        v-model="form.password"
                        placeholder="Password"
                        class="form-control"
                    />
                    <InputError :message="form.errors.email" />
                </div>

                <button type="submit" class="btn btn-primary" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Log in
                </button>
            </div>

            <div class="text-muted-foreground text-center text-sm">
                Don't have an account?
                <Link :href="route('register')" class="text-primary underline underline-offset-4">Sign up</Link>
            </div>
        </form>
    </AuthLayout>
</template>
