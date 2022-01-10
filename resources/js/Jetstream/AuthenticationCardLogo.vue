<template>
    <Link :href="'/'">
        <svg class="app-logo text-gray-900 dark:text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 38"><g id="Group_19017" data-name="Group 19017"><rect id="Rectangle_5" data-name="Rectangle 5" class="cls-1" width="8" height="38"></rect><path id="Path_58" data-name="Path 58" class="cls-1" d="M52,0h8V38H52Z"></path><path id="Path_57" data-name="Path 57" class="cls-1" d="M26,0h8V38H26Z"></path></g></svg>
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
