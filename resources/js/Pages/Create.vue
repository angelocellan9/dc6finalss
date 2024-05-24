<script setup>
    import { Link } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/vue3';
    import 'tailwindcss/tailwind.css';
    import Layout from '@/Layouts/Layout.vue';

    defineOptions({
        layout: Layout
    });

    const form = useForm({
        name: '',
        address: '',
        birthdate:'',
        connum:'',
        jerseyno: '',
    });

    const submit = () => {
        form.submit('post', '/players');
    };

    const props = defineProps({
        player: Object
    })
</script>

<template>
    <div class="p-8">
    <h1 class="text-4xl my-3 flex-1 m-2 fw-bold">Add Player</h1>

<div class="border p-4 rounded w-2/4 m-4">
    <form @submit.prevent="submit">
        <table>
                    <tr>
                        <th class="text-left">Name:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Address:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.address" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Birthdate:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.birthdate" type="date">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Phone #:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.connum" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Jersey #:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.jerseyno" type="text">
                        </td>
                    </tr>
                </table>

            <div class="text-right">
                    <Link  href="/players" class="btn text-white bold bg-success">Back</Link>
                    <button type="submit" class="btn ml-2 text-white bg-primary">Submit</button>
                </div>
    </form>
</div>
</div>
</template>
