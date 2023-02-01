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

    <button id="show-modal" @click="showModal = true"
        class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-blue-500"  
        >Show Modal
    </button>
    <!-- <Teleport to="body"> -->
    <!-- use the modal component, pass in the prop -->
    <!-- <modal :show="showModal" @close="showModal = false">
        <template #header>
            <h3>custom header</h3>
        </template>
        <template #body>
            <h3>custom body</h3>
        </template>
    </modal> -->
    <!-- </Teleport> -->
    <ModalTwo :show="showModal" @close="showModal = false"></ModalTwo>
</template>
<script setup>
import {ref, watch} from "vue";
import Modal from '../Shared/NewModal.vue'
import ModalTwo from '../Shared/NewModalTwo.vue'


let showModal = ref(false);


defineProps({
    name: String,
    frameworks: Array,
})
</script>