<template>
   <Head title="Users"/>
   <div class="flex justify-between">
    <div class="flex items-center">
        <h1 class="text-4xl font-bold m-2">
            Users
        </h1>
        <Link 
            v-if="can.createUser"
            href="/users/create" 
            class="text-blue-500 text-sm">New User</Link>
    </div>
    <input 
        v-model="search"
        type="text" placeholder="Search .." 
        class="border rounded-lg px-2">
   </div>
    <div class="overflow-x-auto mt-6">
        <div class="bg-white shadow-md rounded">
            <table class="min-w-max w-full table-auto">
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-200 hover:bg-gray-100" v-for="user in users.data" :key="user.id">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{user.name}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <Link 
                                v-if="user.can.editable"
                                :href="`/users/${user.id}/edit`" class="text-indigo-500 font-bold">
                                Edit
                            </Link>
                            <button 
                                v-if="user.can.editable"
                                class="text-red-500 font-bold"
                                @click="remove(user)">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Paginate -->
    <Pagination :links="users.links" class="mt-6"/>

    <!-- Modal -->
    <Modal :show="showing" @close="close" title="Delete User">
        <div>
            Are you sure you want to delete {{ form.name }}?
        </div>
        <div class="float-right mt-8">
            <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2"
                :disabled="processing"
                @click="removeUser">Remove
            </button>
            <button class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                @click="close">
                Cancel
            </button>
        </div>
    </Modal>
    
    
</template>
<script setup>
    import Pagination from '../../Shared/Pagination.vue'
    import Modal from '../../Shared/Modal.vue'
    import {ref, watch} from "vue";
    import debounce from "lodash/debounce";
    import { router, useForm  } from '@inertiajs/vue3'

    let props = defineProps({
        users: Object,
        filters: Object,
        can: Object
    })

    let search = ref(props.filters.search);

    let processing = ref(false);


    watch(search, debounce(function(value){
            router.get('/users', {search : value}, {
                preserveState : true
            });
        }, 500)
    );

    let form = useForm({
        id: 0,
        name: '',
    })

    let remove = (user) => {
        console.log(user);

        form.id = user.id
        form.name = user.name
        showing.value = true;
    } 

    let showing = ref(false);

    let close = () => {
        showing.value = false;
    }

    let removeUser = () => {
        console.log(form.id)
        form.delete(`/users/${form.id}`, {
            onStart: () => { processing.value = true},
            onFinish: () => { processing.value = false; showing.value = false},
        });
    }


   

</script>