<template>
    <Head>
        <title> My App - Login </title>
        <meta
            type="description"
            content="Settings information about my app"
            head-key="description"
        >
    </Head>
   
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 mx-auto mt-8 rounded-xl border">
            <h1 class="text-4xl font-bold">
                Login
            </h1>

            <form @submit.prevent="submit" >
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> Email </label>
                    <input class="border border-gray-400 p-2 w-full rounded" 
                        type="email"
                        name="email" 
                        required
                        v-model="form.email"
                        >
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs"></div>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password"> Password </label>
                    <input class="border border-gray-400 p-2 w-full rounded" 
                        type="password"
                        name="password" 
                        required
                        v-model="form.password"
                        >
                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs"></div>
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        :disabled="processing">
                        Submit
                    </button>
                </div>  
            </form>
            </section>

    </main>
    
    
    
</template>
<script>
export default {
    layout: null
}
</script>

<script setup>
import { ref } from "vue"
import { useForm  } from '@inertiajs/vue3'

    let form = useForm({
        email: '',
        password: '',
    })

    let processing = ref(false);

    let submit = () => {
        form.post('/login', form, {
            onStart: () => { processing.value = true},
            onFinish: () => { processing.value = false},
        });
    }

</script>