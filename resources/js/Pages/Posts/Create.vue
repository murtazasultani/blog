<template>
   <AppLayout title="Create Post">
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
            <form @submit.prevent="addPost" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">
                                Publish Post
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Please write the detail of your posts
                            </p>
                        </div>
                        
                        <div class="space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <jet-label for="title" value="Title"/>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <jet-input id="title" type="text" class="max-w-lg block w-full" v-model="postForm.title" required autocomplete="title" maxlength="255" />
                                    <jet-input-error :message="postForm.errors.title" class="mt-2" />
                                </div>
                            </div>
                            
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <jet-label for="description" value="Description"/>
                                <div id="description" class="mt-1 sm:mt-0 sm:col-span-2">
                                    <textarea v-model="postForm.content" rows="8" name="content" id="content" class="shadow-sm focus:ring-gray-700 focus:border-gray-700 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                    <jet-input-error :message="postForm.errors.content" class="mt-2" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <jet-button :class="{ 'opacity-25': postForm.processing }" :disabled="postForm.processing">
                            Save
                        </jet-button>
                    </div>
                </div>
            </form>
         </div>
      </section>
   </AppLayout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Post from '@/Components/Post.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import JetButton from '@/Jetstream/Button'
    import JetLabel from '@/Jetstream/Label'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    
    export default {
        components: {
            AppLayout,
            Post,
            Head,
            Link,
            JetButton,
            JetLabel,
            JetInput,
            JetInputError
        },
        data() {
            return {
                postForm: this.$inertia.form({
                    title: null,
                    content: null,
                }, {
                    bag: 'addPost',
                    resetOnSuccess: true,
                })
            }
        },

        methods: {
            addPost() {
                this.postForm.post(route('posts.store'), {
                    preserveScroll: true,
                })
            }
        }
    }
</script>