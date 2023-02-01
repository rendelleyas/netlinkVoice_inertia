<template>
    <Head>
        <title> My App - Settings </title>
        <meta
            type="description"
            content="Settings information about my app"
            head-key="description"
        >
    </Head>
    <h1 class="text-4xl font-bold">
        Settings
    </h1>

    <div class="grid">
        Testing vuex clicked: {{ count }} times, count is {{ evenOrOdd }}.
        <button  class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-blue-500 m-1" @click="increment">+</button>
        <button  class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-blue-500 m-1" @click="decrement">-</button>
        <!-- <button  class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-blue-500 m-1" @click="incrementIfOdd">Increment if odd</button> -->
        <!-- <button  class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-blue-500 m-1" @click="incrementAsync">Increment async</button> -->
    </div>
</template>
<script setup>

    import { computed } from 'vue'
    import { useStore } from 'vuex'

    const store = useStore();

    let count =  computed(() => store.getters.count)
    let evenOrOdd = computed(() => store.getters.evenOrOdd)

    const increment = () => {
        console.log('store', store.state.count)
        store.dispatch('increment');
    }

    const decrement = () => {
        console.log('store', store.state.count)
        store.dispatch('decrement');
    }


</script>