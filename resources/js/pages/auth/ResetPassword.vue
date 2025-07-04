<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

interface Props {
    token: string;
    email: string;
}

const props = defineProps<Props>();

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <AuthLayout title="Reset password" description="Please enter your new password below">
        <Head title="Reset password" />

        <form @submit.prevent="submit">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" autocomplete="email" v-model="form.email" class="form-control" readonly />
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>

                <div class="grid gap-2">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        v-model="form.password"
                        class="form-control"
                        autofocus
                        placeholder="Password"
                    />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        v-model="form.password_confirmation"
                        class="form-control"
                        placeholder="Confirm password"
                    />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <button type="submit" class="btn btn-primary" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Reset password
                </button>
            </div>
        </form>
    </AuthLayout>
</template>
