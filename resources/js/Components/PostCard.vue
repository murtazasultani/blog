<template>
   <Link href="/">
      <p>{{ post }}</p>
   </Link>
</template>

<script>
   import { Link } from '@inertiajs/inertia-vue3';
   export default {
      props: {
         post: {
            type: Object,
            default: null
         }
      },
      components: {
         Link
      }
   }
</script>