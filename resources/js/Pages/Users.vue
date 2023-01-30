<template>
    <Layout>
        <h1 class="text-4xl font-bold">
            Users
        </h1>
        <div :style="{marginTop: '900px'}">
            <p>The current time is {{ time }}</p>
            <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
        </div>
    </Layout>

   

</template>
<script>
    export default {
        props: {
            time: String,
        },
    }
</script>