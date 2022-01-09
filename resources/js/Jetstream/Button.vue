<template>
    <button :type="type" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-50 bg-primary-900 hover:bg-primary-700 hover:text-primary-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>