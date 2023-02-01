<template>
    <!-- 
        referenced link on modal: https://laravel-news.com/building-a-modal-with-vue-and-tailwind 
        You can also explore: 
    -->
    <Transition name="fade">
        <div
            v-if="show"
            class="fixed inset-0 w-full h-48 flex justify-center bg-semi-75 mt-10"
            >
            <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8">
                <div class="flex justify-between">
                    <div>
                        {{(title)? title : 'Modal Header'}}
                    </div>
                    <div @click.prevent="close"  class="text-gray-500 my-2 mx-4 cursor-pointer">
                    X
                    </div>
                </div>
                <!-- Content -->
                <div>
                    <slot />
                </div>
            </div>
        </div>
    </Transition>
</template>
<style  scoped>
.fade-enter-active,
    .fade-leave-active {
        transition: all 0.4s;
    }
    .fade-enter,
    .fade-leave-to {
        opacity: 0;
    }
</style >
<script setup>

    const emit = defineEmits(['close'])

    let props = defineProps({
        show : Boolean,
        title : String,
    })

    let close = () => {
        emit('close')
    }
</script>