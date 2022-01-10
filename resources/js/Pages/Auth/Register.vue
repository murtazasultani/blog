<template>
    <Head title="Register" />

    <jet-authentication-card>
        <div class="mx-auto w-full max-w-sm">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Register a new account
            </h2>

            <div class="mt-6">
                <form @submit.prevent="submit" method="POST" class="space-y-6">
                    <div>
                        <jet-label for="name" value="Name" />
                        <div class="mt-1">
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <jet-label for="email" value="Email" />
                        <div class="mt-1">
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <jet-label for="password" value="Password" />
                        <div class="mt-1">
                            <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                        </div>
                    </div>

                    <div class="space-y-1">
                        <jet-label for="password_confirmation" value="Confirm Password" />
                        <div class="mt-1">
                            <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                        </div>
                    </div>

                    <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                        <jet-label for="terms">
                            <div class="flex items-center">
                                <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                                <div class="ml-2">
                                    I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                                </div>
                            </div>
                        </jet-label>
                    </div>

                    <div>
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit" class="w-full flex justify-center">
                            Register
                        </jet-button>
                    </div>

                    <div class="text-center">
                        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Already registered?
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>