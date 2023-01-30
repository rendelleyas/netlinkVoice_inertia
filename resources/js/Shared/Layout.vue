<template>
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

            <iframe 
                class="mb-6"
                width="100%" frameborder="no" scrolling="no" seamless src="https://player.simplecast.com/b83b0a3a-c934-480e-af5d-3007fccd57b6?dark=false"></iframe>


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