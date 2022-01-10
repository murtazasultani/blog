<template>    
    <app-layout title="Your Posts">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex mb-8 lg:mb-10" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
               <li>
                  <Link :href="route('home')">
                     <div class="flex items-center group cursor-pointer">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-600 transform group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <p class="ml-3 text-base text-gray-600 group-hover:text-gray-700" aria-current="page">
                           All Posts
                        </p>
                     </div>
                  </Link>
               </li>
            </ol>
         </nav>
            <h1 class="sr-only">Recent questions</h1>
            <ul role="list" v-for="(post, index) in posts.data" :key="index">
                <post-card :post="post" />
            </ul>
        </div>
    </app-layout>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'
    import PostCard from '@/Components/PostCard'

    export default {
        components: {
            Head,
            Link,
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