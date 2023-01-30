<template>
    <Layout>
        <h1>
            Users
        </h1>
    </Layout>

    <div :style="{marginTop: '900px'}">
        <p>The current time is {{ time }}</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>

</template>
<script>
import Layout from "../Shared/Layout.vue"
import {Link} from '@inertiajs/vue3';

export default {
    components : {Layout, Link},
    props: {
        time: String,
    }
}
</script>