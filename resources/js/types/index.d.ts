import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;

export interface Contact {
    id: number;
    first_name: string;
    last_name: string;
    phone_number: string;
}

export interface Message {
    id: number;
    recipient_ids: number[];
    num_recipients: number;
    num_delivered: number;
    content: string;
}

export interface DeliveryReport {
    id: number;
    message_id: number;
    rcontact_id: number;
    first_name: string;
    last_name: string;
    phone_number: string;
    pivot: {
        delivered: boolean;
    };
}
