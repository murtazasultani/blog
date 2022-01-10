<template>
   <AppLayout title="View Post">
      <section class="px-4 text-lg max-w-screen-md mx-auto">
         <nav class="flex mb-8 lg:mb-10" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
               <li>
                  <Link :href="route('home')">
                     <div class="flex items-center group cursor-pointer">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-600 transform group-hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <p class="ml-3 text-base text-gray-600 group-hover:text-gray-700" aria-current="page">
                           Back
                        </p>
                     </div>
                  </Link>
               </li>
            </ol>
         </nav>
         <div>
            <post :post="post.data"/>
         </div>
      </section>
   </AppLayout>
</template>

<script>
   import AppLayout from '@/Layouts/AppLayout.vue'
   import Post from '@/Components/Post.vue'
   import { Head, Link } from '@inertiajs/inertia-vue3';
   export default {
      props: {
         post: {
            type: Object,
            default: null
         }
      },
      components: {
         AppLayout,
         Post,
         Head,
         Link
      }
   }
</script>