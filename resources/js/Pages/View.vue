<script setup>
import { Link } from '@inertiajs/vue3'
import 'tailwindcss/tailwind.css';
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
        player: Array
    })

    defineOptions({
        layout: Layout
    });

const showEdit = ref(false)

const delForm = useForm({
    id: props.player.id
})

const form = useForm({
    name: props.player.name,
    birthdate: props.player.birthdate,
    address: props.player.address,
    connum: props.player.connum,
    jerseyno: props.player.jerseyno,
})

const submit = () => {
    form.submit('put', '/players/' + props.player.id)
}

const delEmp = () => {
    const del = confirm("Are you sure you want to delete this player?")
    if(del)
        delForm.submit('delete', '/players/' + props.player.id)
}
</script>

<template>
    <div class="p-8">
        <h1 class="text-4xl">View Player</h1>

        <div class="border bordp p-4 rounded m-6 fs-5 view-container">
            <table v-if="!showEdit" class="tanle-striped flex">
                <tr class="flex flex-col border-end border-solid mr-2 p-2">
                    <th>Name: </th>
                    <th>Birthdate: </th>
                    <th>Address: </th>
                    <th>Contact #: </th>
                    <th>Jersey #: </th>
                </tr>
                <tr class="flex flex-col">
                    <td>{{ player.name }}</td>
                    <td>{{ player.birthdate }}</td>
                    <td>{{ player.address }}</td>
                    <td>{{ player.connum }}</td>
                    <td>{{ player.jerseyno }}</td>
                </tr>
            </table>
            
            <div v-if="showEdit">
                <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="name">Name: </label>
                <input type="text" id="name" class="w-full" v-model="form.name">
            </div>
            <div class="mb-3">
                <label for="birthdate">Birthdate: </label>
                <input type="date" id="birthdate" class="w-full" v-model="form.birthdate">
            </div>
            <div class="mb-3">
                <label for="address">Address: </label>
                <input type="text" id="address" class="w-full" v-model="form.address">
            </div>
            <div class="mb-3">
                <label for="connum">Contact #: </label>
                <input type="text" id="type" class="w-full" v-model="form.connum">
            </div>
            <div class="mb-3">
                <label for="jerseyno">Jersey #: </label>
                <input jerseyno="text" id="jerseyno" class="w-full" v-model="form.jerseyno">
            </div>
            
            <button type="submit" class="bg-blue-700 text-white py-2 px-3 rounded">Submit</button>

        </form>      

            </div>

            <div class="mt-2 flex">
                <Link href="/players" class="btn-success btn ">Back</Link>
                <button class="btn btn-danger text-white rounded ms-2" @click="delEmp">Delete</button>
                <button class="btn btn-primary rounded ms-2"
                    @click="showEdit = !showEdit">{{ showEdit ? 'Cancel' : 'Edit' }} </button>
            </div>
        </div>
    </div>
</template>