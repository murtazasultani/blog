<template>
   <div>
      <div class="mt-10 lg:mt-16">
         <div>
            <p class="mb-3 sm:mb-5 text-gray-500 font-medium uppercase">{{ post.publish_date }}</p>
            <div class="flex items-baseline">
               <h2>
                  {{ post.title }}
               </h2>
            </div>
            <div class="mt-6 text-gray-600 post-centent">
               <p v-html="post.content"></p>
            </div>

            <div class="mt-10 flex justify-between space-x-8">
               <div class="flex space-x-6">
                  <span class="inline-flex items-center text-sm">
                     <button @click.prevent="likePost(post.id)" type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ post.likes.length }}</span>
                        <span class="sr-only">likes</span>
                     </button>
                  </span>
                  <span class="inline-flex items-center text-sm">
                     <a href="#coments">
                        <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                           <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                           </svg>
                           <span class="font-medium text-gray-900">{{ post.comments.length }}</span>
                           <span class="sr-only">comments</span>
                        </button>
                     </a>
                     </span>
                  <span class="inline-flex items-center text-sm">
                     <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                           <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium text-gray-900">{{ post.views }}</span>
                        <span class="sr-only">views</span>
                     </button>
                  </span>
               </div>
               <div class="flex text-sm">
                  <span class="inline-flex items-center text-sm">
                     <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                        </svg>
                        <span class="font-medium text-gray-900">Share</span>
                     </button>
                  </span>
               </div>
            </div>
         </div>
         <div class="relative mt-12 mb-6">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
               <div class="w-full border-t border-gray-300"></div>
            </div>
         </div>
         <div id="coments">
            <comments :post="post"/>
         </div>
      </div>
   </div>
</template>

<script>
   import Comments from '@/Components/Comments'
   export default {
      props: {
         post: {
            type: Object,
            default: null
         }
      },
      components: {
         Comments
      },
      methods: {
         likePost(id) {
            this.$inertia.get(route('posts.like', id), {
               preserveScroll: true,
            })
         }
      }
   }
</script>