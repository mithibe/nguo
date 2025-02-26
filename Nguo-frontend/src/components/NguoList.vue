<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const nguo = ref([]);

const fetchNguo = async () => {
  try {
    const response = await axios.get("http://127.0.0.1:8000/api/nguos");
    nguo.value = response.data; // Store fetched data
  } catch (error) {
    console.error("Error fetching clothes:", error);
  }
};

onMounted(fetchNguo);
</script>

<template>
    <div>
        <h2>Nguo Zetu</h2>
        <ul v-if="nguo.length">
            <li v-for="nguos in nguo" :key="nguos.id">
                {{ nguos.name }} - {{ nguos.category }} - {{ nguos.description }}
            </li>
        </ul>
        <p v-else>No Clothes found.</p>
    </div>
</template>
