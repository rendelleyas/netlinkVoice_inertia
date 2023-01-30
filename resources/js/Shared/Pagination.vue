<template>
    <div>
        <template v-for="link in links" :key="link.label" >
            <Component 
                :is="link.url? 'Link' : 'span'"
                :href="link.url"  
                v-html="link.label"
                class="px-1"
                :class="{
                    'text-gray-500' : !link.url,
                    'font-bold font-indigo-500' : link.active
                }"
            />
        </template>
    </div>

</template>
<script setup>

defineProps({
    links: Array
})
 
</script>