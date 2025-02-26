<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const nguo = ref([]);
const editingNguo = ref(null); // Stores the item being edited
const updatedName = ref("");
const updatedCategory = ref("");
const updatedDescription = ref("");

const categories = ["Top", "Bottom", "Shoes", "Accessories"];

const fetchNguo = async () => {
  try {
    const response = await axios.get("http://127.0.0.1:8000/api/nguos");
    nguo.value = response.data;
  } catch (error) {
    console.error("Error fetching clothes:", error);
  }
};

const deleteNguo = async (id) => {
  try {
    await axios.delete(`http://127.0.0.1:8000/api/nguos/${id}`);
    nguo.value = nguo.value.filter(item => item.id !== id);
  } catch (error) {
    console.error("Error deleting clothing:", error);
  }
};

const startEdit = (item) => {
  editingNguo.value = item;
  updatedName.value = item.name;
  updatedCategory.value = item.category;
  updatedDescription.value = item.description;
};

const updateNguo = async () => {
  if (!editingNguo.value) return;

  try {
    await axios.put(`http://127.0.0.1:8000/api/nguos/${editingNguo.value.id}`, {
      name: updatedName.value,
      category: updatedCategory.value,
      description: updatedDescription.value,
    });

    // Update the list immediately
    editingNguo.value.name = updatedName.value;
    editingNguo.value.category = updatedCategory.value;
    editingNguo.value.description = updatedDescription.value;
    editingNguo.value = null; // Close the edit form
  } catch (error) {
    console.error("Error updating clothing:", error);
  }
};

onMounted(fetchNguo);
</script>

<template>
  <div>
    <h2>Nguo Zetu</h2>
    <ul v-if="nguo.length">
      <li v-for="item in nguo" :key="item.id">
        <span v-if="editingNguo !== item">
          {{ item.name }} - {{ item.category }} - {{ item.description }}
          <button @click="startEdit(item)">Edit</button>
          <button @click="deleteNguo(item.id)">Delete</button>
        </span>

        <span v-else>
          <input v-model="updatedName" type="text" />
          <select v-model="updatedCategory">
            <option v-for="cat in categories" :key="cat" :value="cat">{{ cat }}</option>
          </select>
          <input v-model="updatedDescription" type="text" />
          <button @click="updateNguo">Save</button>
          <button @click="editingNguo = null">Cancel</button>
        </span>
      </li>
    </ul>
    <p v-else>No Clothes found.</p>
  </div>
</template>
