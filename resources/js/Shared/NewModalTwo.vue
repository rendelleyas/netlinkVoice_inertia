<template>
    <teleport to="body" >
        <transition
            enter-active-class="transition ease-out duration-200 transform"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-200 transform"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
            >
            <div
                ref="modal-backdrop"
                class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-50"
                v-show="show"
            >
                <div class="flex items-start justify-center min-h-screen pt-24 text-center">
                    <div role="dialog" ref="modal" aria-modal="true"
                        class="bg-white rounded-lg text-left overflow-hidden shadow-xl p-8 w-1/2"
                        aria-labelledby="modal-headline"
                        >
                        <div class="flex justify-between">
                            <div>
                                {{(title)? title : 'Modal Header'}}
                            </div>
                            <div @click.prevent="close"  class="text-gray-500 my-2 mx-4 cursor-pointer">
                            X
                            </div>
                        </div>
                        Awiwi
                    </div>
                </div>
            </div>
        </transition>
    </teleport>
  </template>
<script setup>

    let props = defineProps({
        show : Boolean,
        title : String,
    })

    const emit = defineEmits(['close'])

    let close = () => {
            emit('close')
        }
        
</script>
