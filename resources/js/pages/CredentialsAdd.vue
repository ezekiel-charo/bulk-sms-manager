<script lang="ts" setup>
import InputError from '@/components/InputError.vue';
import { router, useForm } from '@inertiajs/vue3';
import { LoaderCircle, LogOut } from 'lucide-vue-next';

const form = useForm({
    username: '',
    api_key: '',
});

function submit() {
    form.post('/sms-credentials');
}

function logOut() {
    router.post('logout');
}
</script>

<template>
    <div class="flex flex-col items-center justify-center">
        <div class="p-5 lg:w-130 lg:pt-12">
            <div class="mb-12 text-end">
                <button @click="logOut()" class="btn px-12 font-semibold"><LogOut strokeWidth="2" /> <span class="ms-1">Log Out</span></button>
            </div>

            <h1 class="mb-4 bg-white text-center text-2xl font-bold">SMS Provider Setup</h1>

            <p class="text-center">Enter the credentials provided by your bulk SMS provider below</p>
            <p class="mb-5 text-center text-gray-600">** Note: Only AfricasTalking is supported at the moment **</p>

            <form @submit.prevent="submit">
                <div class="grid gap-6">
                    <div>
                        <label class="form-label" for="first-name">Provider</label>
                        <select id="provider" readonly class="form-control">
                            <option selected>AfricasTalking</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label" for="username">Username</label>
                        <input
                            id="username"
                            type="text"
                            required
                            autofocus
                            v-model="form.username"
                            placeholder="Enter username"
                            class="form-control"
                        />
                        <InputError :message="form.errors.username" />
                    </div>

                    <div>
                        <label class="form-label" for="api-key">API Key</label>
                        <input id="api-key" type="text" v-model="form.api_key" placeholder="Enter your API Key" class="form-control" />
                        <InputError :message="form.errors.api_key" />
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
