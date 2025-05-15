<script lang="ts" setup>
import Logo from '@/components/Logo.vue';
import { SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { ContactRound, MessageSquareMore } from 'lucide-vue-next';

const page = usePage<SharedData>();
</script>

<template>
    <div class="p-8">
        <div class="mb-24 flex items-center">
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
    </div>
</template>
