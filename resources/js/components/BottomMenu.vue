<script lang="ts" setup>
import { SharedData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { Contact, Link, MessageSquareMore } from 'lucide-vue-next';

const page = usePage<SharedData>();
</script>

<template>
    <nav class="flex gap-y-2">
        <Link href="/contacts">
            <div class="bottom-nav-item active" :class="{ active: page.url === '/contacts' }">
                <Contact />
                <div>Contacts</div>
            </div>
        </Link>

        <Link href="/messages" :class="{ active: page.url === '/messages' }">
            <div class="bottom-nav-item">
                <MessageSquareMore />
                <div>Messages</div>
            </div>
        </Link>
    </nav>
</template>
