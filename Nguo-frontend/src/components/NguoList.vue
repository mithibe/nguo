<script setup>
import { ref, onMounted, computed, defineExpose } from "vue";
import axios from "axios";

const nguo = ref([]);
const searchQuery = ref(""); // Holds the search input value


// Function to fetch clothes
const fetchNguo = async () => {
    try {
        const response = await axios.get("http://127.0.0.1:8000/api/nguos");
        nguo.value = response.data;
    } catch (error) {
        console.error("Error fetching clothes:", error);
    }
};

// Computed property to filter clothes based on searchQuery
const filteredNguo = computed(() => {
    return nguo.value.filter(item =>
        item.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
        item.category.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
        item.description.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

onMounted(fetchNguo);

//Expose the function so App.vue can call it
defineExpose({ fetchNguo });
</script>

<template>
    <div>
        <h2>Nguo Zetu</h2>

        <!-- Search Bar -->
        <input v-model="searchQuery" type="text" placeholder="Search for clothes..." />

        <ul v-if="filteredNguo.length">
            <li v-for="item in filteredNguo" :key="item.id">
                {{ item.name }} - {{ item.category }} - {{ item.description }}
            </li>
        </ul>
        <p v-else>No clothes found.</p>
    </div>
</template>

<style scoped>
input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button{
    margin-left: 10px;
    font-size: 18px;
}
li{
    font-size: 20px;
    font-weight: 700;
}
</style>