<template>
    <Layout>
        <h1>
            Users
        </h1>
        <div :style="{marginTop: '900px'}">
            <p>The current time is {{ time }}</p>
            <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
        </div>
    </Layout>

   

</template>
<script setup>
    import Layout from "../Shared/Layout.vue"
    defineProps({
        time: String,
    })
</script>