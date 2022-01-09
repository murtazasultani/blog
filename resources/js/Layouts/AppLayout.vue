<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <div class="min-h-screen">
            <header class="bg-white shadow-md sticky top-0 z-10">
                <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
                    <div class="relative flex justify-between space-x-2">
                        <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('home')">
                                    <jet-application-logo class="block h-9 w-auto" />
                                </Link>
                            </div>
                        </div>
                        
                    
                        <div class="flex items-center justify-end xl:col-span-4">
                            <Link href="#" class="mr-4 lg:mr-6">
                                <jet-button>
                                    New Post
                                </jet-button>
                            </Link>
                            <!-- Profile dropdown -->
                            <div class="flex-shrink-0 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button type="button" class="bg-gray-50 p-1 text-gray-400 hover:text-gray-500 focus:text-gray-600 rounded-full flex space-x-2 items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" id="user-menu" aria-expanded="false" aria-haspopup="true">
                                            <svg class="ml-1 h-4 w-auto text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                            <span class="sr-only">Open user menu</span>
                                            <template v-if="$page.props.user">
                                                <img class="h-7 w-7 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                            </template>
                                            <template v-else>
                                                <svg class="h-7 w-auto rounded-full fill-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false">
                                                    <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path>
                                                </svg>
                                            </template>
                                        </button>
                                    </template>

                                    <template #content>
                                        <template v-if="$page.props.user">
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Manage Account
                                            </div>

                                            <jet-dropdown-link :href="route('dashboard')">
                                                My Post
                                            </jet-dropdown-link>

                                            <jet-dropdown-link :href="route('profile.show')">
                                                Profile
                                            </jet-dropdown-link>


                                            <div class="border-t border-gray-100"></div>

                                            <!-- Authentication -->
                                            <form @submit.prevent="logout">
                                                <jet-dropdown-link as="button">
                                                    Logout
                                                </jet-dropdown-link>
                                            </form>
                                        </template>
                                        <template v-else>
                                            <jet-dropdown-link href="/register">
                                                Sign up
                                            </jet-dropdown-link>

                                            <jet-dropdown-link href="/login">
                                                Log in
                                            </jet-dropdown-link>
                                        </template>
                                    </template>
                                </jet-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="container py-6 lg:py-16">
                <slot></slot>
            </main>
            <AppFooter class="container py-12" />
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppFooter from '@/Components/AppFooter'

    export default {
        props: {
            title: String,
        },

        components: {
            Head,
            JetApplicationLogo,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            JetButton,
            Link,
            AppFooter
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
