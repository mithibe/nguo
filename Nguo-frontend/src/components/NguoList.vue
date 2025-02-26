<script setup>
import {ref, onMounted} from "vue";
import axios from "axios";

const nguo = ref([]);

const fetchNguo = async () => {
    const response = await axios.get("http://127.0.0.1:8000/api/nguo");
    nguo.value = response.data;
};

onMounted(fetchNguo);
</script>

<template>
    <div>
        <h2>Nguo Zetu</h2>
        <ul>
            <li v-for="item in nguo" :key="item.id">
                {{ item.name }} - {{ item.category }} - {{ item.description }}
            </li>
        </ul>
    </div>
</template>