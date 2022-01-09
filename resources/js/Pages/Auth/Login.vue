<template>
    <Head title="Log in" />
    <div class="min-h-screen flex">
        <div class="hidden lg:block relative w-0 lg:w-4/12 bg-gray-100">
            <img class="absolute inset-0 h-full w-full object-cover bg-center" src="" alt="Sig in Image Thumbnail">
        </div>
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-full">
                <div>
                    <Link :href="route('home')">
                        <jet-application-logo class="block h-12 w-auto" />
                    </Link>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Sign in to your account
                    </h2>
                </div>

                <div class="mt-6">
                    <form @submit.prevent="submit" method="POST" class="space-y-6">
                        <div>
                            <jet-label for="email" value="Email address"/>
                            <div class="mt-1">
                                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                            </div>
                        </div>

                        <div class="space-y-1">
                            <jet-label for="password" value="Password"/>
                            <div class="mt-1">
                                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <jet-checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </div>

                            <div class="text-sm">
                                <Link v-if="canResetPassword" :href="route('password.request')" class="hover:underline text-sm font-medium text-gray-600 hover:text-gray-900">
                                    Forgot your password?
                                </Link>
                            </div>
                        </div>

                        <div>
                            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit" class="w-full flex justify-center">
                                Sign in
                            </jet-button>
                        </div>
                        <div class="text-center">
                            <Link :href="route('register')" class="underline text-sm text-gray-600 hover:text-gray-900">
                                Do not have any account?
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Head,
            JetApplicationLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
