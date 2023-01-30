<template>
   <Head>
        <title> My App - Users</title>
        <meta
            type="description"
            content="Users information about my app"
            head-key="description"
        >
    </Head>
    <h1 class="text-4xl font-bold">
        Users
    </h1>
    <div :style="{marginTop: '900px'}">
        <p>The current time is {{ time }}</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>
<script>
    export default {
        props: {
            time: String,
        },
    }
</script>