<script lang="ts" setup>
import Logo from '@/components/Logo.vue';
import { SharedData } from '@/types';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ContactRound, LogOut, MessageSquareMore } from 'lucide-vue-next';

const page = usePage<SharedData>();

function logOut() {
    router.post('logout');
}
</script>

<template>
    <div class="relative h-dvh p-8">
        <div class="mb-34 flex items-center">
            <Logo />
        </div>

        <nav class="flex flex-col gap-y-2">
            <Link href="/contacts">
                <div class="side-nav-item" :class="{ active: page.url === '/contacts' }">
                    <span class="me-2"><ContactRound /></span> Contacts
                </div>
            </Link>

            <Link href="/messages">
                <div class="side-nav-item" :class="{ active: page.url === '/messages' }">
                    <span class="me-2"><MessageSquareMore /></span> Messages
                </div>
            </Link>
        </nav>

        <button @click="logOut()" class="btn absolute bottom-8 px-12 font-semibold">
            <LogOut strokeWidth="2" /> <span class="ms-1">Log Out</span>
        </button>
    </div>
</template>
