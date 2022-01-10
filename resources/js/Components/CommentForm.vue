<template>
    <form @submit.prevent="addComment" class="grid gap-y-8">
        <div class="space-y-8">
        <div>
            <div class="mt-6 grid lg:grid-cols-2 gap-y-6 gap-x-4">
                <div>
                    <jet-label for="name" value="Name"/>
                    <div class="mt-1">
                    <jet-input id="name" type="text" class="w-full" v-model="commentForm.name" required autocomplete="name" maxlength="255" />
                    <jet-input-error :message="commentForm.errors.name" class="mt-2" />
                    </div>
                </div>

                <div>
                    <jet-label for="email" value="Email"/>
                    <div class="mt-1">
                    <jet-input id="email" type="email" class="w-full" v-model="commentForm.email" autocomplete="email" maxlength="255" />
                    <jet-input-error :message="commentForm.errors.email" class="mt-2" />
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <jet-label for="comment" value="Your Comment"/>
                    <div class="mt-1">
                    <textarea id="comment" v-model="commentForm.comment" name="comment" rows="5" required class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-gray-700 focus:border-gray-700 border-gray-300 rounded-md"></textarea>
                    <jet-input-error :message="commentForm.errors.comment" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="flex items-center justify-end">
                <jet-action-message :on="commentForm.recentlySuccessful" class="mr-3">
                    Thanks for your comment
                </jet-action-message>
                <jet-button :class="{ 'opacity-25': commentForm.processing }" :disabled="commentForm.processing">
                    Save
                </jet-button>
            </div>
        </div>
        </div>
    </form>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetLabel from '@/Jetstream/Label'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    export default {
        props: {
            postID: {
                type: Number,
                default: null
            },
            commentID: {
                type: Number,
                default: null
            }
        },

        components: {
            JetButton,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage,
            Comment
        },
        data() {
            return {
                commentForm: this.$inertia.form({
                    name: null,
                    email: null,
                    comment: null,
                }, {
                    bag: 'addComment',
                    resetOnSuccess: true,
                })
            }
        },
        
        methods: {
            addComment() {
                this.commentForm.post(`/posts/${this.postID}/comments/store`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.commentForm.reset()
                    }
                })
            }
        }
    }
</script>