<template>
   <li class="flex space-x-2 sm:space-x-4">
      <div class="flex-shrink-0">
         <div class="h-12 w-12 rounded-full border-2 border-gray-100 bg-gradient-to-r from-orange-400 via-red-500 to-pink-500 bg-center bg-contain bg-no-repeat" :style="`background-image: url(${comment.profile_photo_path});`"></div>
      </div>
      <div class="flex-1">
         <div class="flex">
            <div class="py-2 bg-white rounded-lg">
               <div class="flex flex-wrap items-center">
                  <div class="text-base leading-6 font-medium text-gray-900 flex flex-col sm:flex-row sm:items-center gap-x-2">
                     <span>{{ comment.name }}</span>
                     <span class="hidden sm:block sm:ml-1 text-xs font-normal text-gray-500">&middot;</span>
                     <span class="text-sm font-normal text-gray-500">{{ comment.created_at }}</span>
                  </div>
               </div>
               <div class="mt-1 bg-gray-50 p-2 rounded-lg">
                  <p class="text-base text-gray-700" v-html="comment.comment"></p>
               </div>
            </div>
         </div>
         <div v-if="postID" class="flex-1 mb-4">
            <span @click="activeCommentForm(comment.id)" class="mt-2 text-sm text-gray-600 cursor-pointer">Reply</span>
            <comment-form v-if="(selectedCommentID === comment.id) && isCommentFormActive" :commentID="selectedCommentID"  :postID="postID" />
         </div>
         <div class="flex-1">
            <slot name="comment">

            </slot>
         </div>
      </div>
   </li>
   
</template>

<script>
   import CommentForm from '@/Components/CommentForm'
   export default {
      props: {
         comment: {
            type: Object,
            default: null
         },
         postID: {
            type: Number,
            default: 0
         }
      },
      data() {
         return {
            isCommentFormActive: false,
            selectedCommentID: null
         }
      },
      components: {
         CommentForm
      },
      methods: {
         activeCommentForm(commentID) {
            this.selectedCommentID = commentID
            this.isCommentFormActive = true
         }
      }
   }
</script>