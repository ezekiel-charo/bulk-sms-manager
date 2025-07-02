<script lang="ts" setup>
import { SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { ContactRound, MessageSquareMore } from 'lucide-vue-next';

const page = usePage<SharedData>();
</script>

<template>
    <nav class="flex gap-y-2">
        <Link href="/contacts" class="flex-1">
            <div class="bottom-nav-item" :class="{ active: page.url === '/contacts' }">
                <div class="icon">
                    <ContactRound />
                </div>
                <div>Contacts</div>
            </div>
        </Link>

        <Link href="/messages" class="flex-1">
            <div class="bottom-nav-item" :class="{ active: page.url === '/messages' }">
                <div class="icon">
                    <MessageSquareMore />
                </div>
                <div>Messages</div>
            </div>
        </Link>
    </nav>
</template>
