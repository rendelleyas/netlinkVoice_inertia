<template>
    <Head>
        <title> My App - Home</title>
        <meta
            type="description"
            content="Home information about my app"
            head-key="description"
        >
    </Head>
    <h1 class="text-4xl font-bold">
        Home
    </h1>
</template>
<script setup>

defineProps({
    name: String,
    frameworks: Array,
})
</script>