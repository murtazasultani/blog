<template>    
    <app-layout title="Home">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="sr-only">All Post</h1>
            <ul role="list" v-for="(post, index) in posts" :key="index">
                <post-card :post="post" />
            </ul>
        </div>
    </app-layout>
</template>

<script>
    import { Head } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'
    import PostCard from '@/Components/PostCard'

    export default {
        components: {
            Head,
            AppLayout,
            PostCard
        },

        props: {
            posts: {
                type: Object,
                default: null
            }
        }
    }
</script>