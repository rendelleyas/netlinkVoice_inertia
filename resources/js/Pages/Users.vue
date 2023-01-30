<template>
    <h1>Users</h1>
    <Navigation />

    <div :style="{marginTop: '900px'}">
        <p>The current time is {{ time }}</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>

</template>
<script>
import Navigation from "../Shared/Navigation.vue"
import {Link} from '@inertiajs/vue3';

export default {
    components : {Navigation, Link},
    props: {
        time: String,
    }
}
</script>