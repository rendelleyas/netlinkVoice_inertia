<template>
   <Layout>
        <h1 class="text-4xl font-bold">
            Home
        </h1>
   </Layout>
</template>
<script>
import Layout from "../Shared/Layout.vue"
export default {
    props: {
        name: String,
        frameworks: Array,
    },
    components : {Layout}
};
</script>