<template>
    <Head>
        <title> My App</title>
        <meta
            type="description"
            content="Information about my app"
            head-key="description"
        >
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex">
                <h1 class="font-bold text-lg">
                    MyApp
                </h1>
                <p class="text-sm ml-4">
                    Hello, Welcome back {{ username }}
                </p>
            </div>
            <Navigation />
        </header>
    </section>

    <section class="p-8">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>

</template>
<script>
import Navigation from "../Shared/Navigation.vue"

export default{
    components : {Navigation},
    computed: {
        username (){
            return this.$page.props.auth.user.username;
        }
    }
}
</script>