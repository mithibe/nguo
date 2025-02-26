<script setup>
import {ref} from "vue";
import axios from "axios";

const name = ref("");
const category = ref("");
const description = ref("");

const categories = ["Top", "Bottom", "Shoes", "Accessories"];

const addNguo = async () => {
    if (!name.value || !category.value) {
        alert("Name and Category are required!");
        return;
    }

    try{
        await axios.post("http://127.0.0.1:8000/api/nguos", {
            name: name.value,
            category: category.value,
            description: description.value || "Unknown",
        });

        alert("Clothing added successfully!");
        name.value="";
        category.value="";
        description.value="";
    } catch (error) {
        console.error("Error adding clothing:", error);
        alert("Failed to add clothing.");
    }
};
</script>

<template>
    <div>
        <h2>Add Nguo</h2>
        <form @submit.prevent="addNguo">
            <div>
                <label>Name:</label>
                <input v-model="name" type="text" required />
            </div>
            <div>
                <label>Category:</label>
                <select v-model="category" required>
                    <option value="" disabled>Select Category</option>
                    <option v-for="cat in categories" :key="cat" :value="cat">{{ cat }}</option>
                </select>
            </div>
            <div>
                <label>Description:</label>
                <input v-model="description" type="text"/>
            </div>
            <button type="submit">Add Nguo</button>
        </form>
    </div>
</template>

<style scoped>
div {
  margin-bottom: 10px;
}
input, select, button {
  display: block;
  margin-top: 5px;
}
</style>