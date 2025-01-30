<script setup>
import { ref } from 'vue';
import ReportRow from '../ReportRow.vue';

const reports = ref([]);

async function deleteReport(id) {
    reports.value = reports.value.filter(report => report.id !== id);

    await fetch(`../api/report/${id}`, {
        method: "DELETE",
    });
}

fetch("../api/reports").then(async (response) => {
    let object = await response.json();

    object.forEach(report => {
        let id = report.id;
        let name = report.name;
        let description = report.description;
        let email = report.email;

        reports.value.push({ id, name, description, email });
    });
})

</script>

<template>
    <div class="flex items-start justify-center w-full h-full">

        <table is="custom-table" id="reports" class="w-full max-w-3xl text-left border border-collapse w">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="w-1 py-2 border"></th>
                </tr>
            </thead>
            <tbody>
                <ReportRow v-for="(report, index) in reports" :key="index" :name="report.name" :id="report.id"
                    :description="report.description" :email="report.email" @deleteReport="deleteReport" />
            </tbody>
        </table>
    </div>



</template>
