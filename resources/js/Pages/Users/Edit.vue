<template>
    <Head title="Create User"></Head>

    <h1 class="text-4xl font-bold">
        Create User Page
    </h1>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name"> Name </label>
            <input class="border border-gray-400 p-2 w-full" 
                type="text"
                name="name" 
                required
                v-model="form.name"
                >
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> Email </label>
            <input class="border border-gray-400 p-2 w-full" 
                type="email"
                name="email" 
                required
                v-model="form.email"
                >
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs"></div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                :disabled="processing">
                Update
            </button>
        </div>  

        
    </form>
</template>
<script setup>
import { ref } from "vue"
import { useForm  } from '@inertiajs/vue3'


let props = defineProps({
    user: Object,
})

let form = useForm({
    name: props.user.name,
    email: props.user.email,
})

let processing = ref(false);

let submit = () => {
    form.put(`/users/${props.user.id}/edit`, form, {
        onStart: () => { processing.value = true},
        onFinish: () => { processing.value = false},
    });
}



</script>