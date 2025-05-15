<script lang="ts" setup>
import { Contact, MessageSquareMore } from 'lucide-vue-next';
</script>

<template>
    <nav class="flex gap-y-2">
        <div class="bottom-nav-item active">
            <Contact />
            <div>Contacts</div>
        </div>
        <div class="bottom-nav-item">
            <MessageSquareMore />
            <div>Messaging</div>
        </div>
    </nav>
</template>
