<template>
   <div>
      <div class="py-5">
         <ul class="grid gap-y-4">
            <li v-if="post.comments.length == 0" class="my-2 text-gray-500 text-center text-sm">
               <p>There is no comment yet</p>
            </li>
            <template v-for="(comment, index) in post.comments" :key="index">
               <comment :comment="comment" :postID="post.id">
                  <!-- 1 -->
                  <template #comment>
                     <template v-for="(comment, index) in comment.comments" :key="index">
                        <comment :comment="comment" :postID="post.id">
                           <!-- 2 -->
                           <template #comment>
                              <template v-for="(comment, index) in comment.comments" :key="index">
                                 <comment :comment="comment" :postID="post.id">
                                    <!-- 3 -->
                                    <template #comment>
                                       <template v-for="(comment, index) in comment.comments" :key="index">
                                          <comment :comment="comment">
                                          </comment>
                                       </template>
                                    </template>
                                 </comment>
                              </template>
                           </template>
                        </comment>
                     </template>
                  </template>
               </comment>
            </template>
         </ul>
      </div>
      <comment-form :postID="post.id" />
   </div>
</template>

<script>
   import Comment from '@/Components/Comment'
   import CommentForm from '@/Components/CommentForm'
   
   export default {
      props: {
         post: {
            type: Object,
            default: null
         }
      },

      components: {
         Comment,
         CommentForm
      }
   }
</script>