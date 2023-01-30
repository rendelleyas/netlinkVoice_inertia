<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <h1 class="font-bold text-lg">
                MyApp
            </h1>
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
    components : {Navigation}
}
</script>