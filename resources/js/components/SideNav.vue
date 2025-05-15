<script lang="ts" setup>
import Logo from '@/components/Logo.vue';
import { Contact, MessageSquareMore } from 'lucide-vue-next';
</script>

<template>
    <div class="p-8">
        <div class="mb-24 flex items-center">
            <Logo />
        </div>
        <nav class="flex flex-col gap-y-2">
            <div class="side-nav-item active">
                <span class="me-2"><Contact /></span> Contacts
            </div>
            <div class="side-nav-item">
                <span class="me-2"><MessageSquareMore /></span> Messaging
            </div>
        </nav>
    </div>
</template>
