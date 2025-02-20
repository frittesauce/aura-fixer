<script setup>
defineProps({
    id: Number,
    name: String,
    description: String,
    email: String
});
</script>

<template>
    <tr class="p-8 text-left even:bg-gray-100">
        <td class="px-4 py-2 border">{{ name }}</td>
        <td class="px-4 py-2 border">{{ description }}</td>
        <td class="px-4 py-2 border">{{ email }}</td>

        <td class="px-2 py-2 border">
            <button @click="$emit('openReport', id)" class="flex items-center justify-center w-full h-full outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-external-link">
                    <path d="M15 3h6v6" />
                    <path d="M10 14 21 3" />
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                </svg>
            </button>
        </td>
        <td class="px-2 py-2 border">
            <button @click="$emit('deleteReport', id)" class="flex items-center justify-center w-full h-full outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-trash-2">
                    <path d="M3 6h18" />
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                    <line x1="10" x2="10" y1="11" y2="17" />
                    <line x1="14" x2="14" y1="11" y2="17" />
                </svg>
            </button>

        </td>

    </tr>
</template>
