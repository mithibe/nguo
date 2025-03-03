<script setup>
import { ref } from "vue";
import AddNguo from './components/AddNguo.vue';
import Nguolist from './components/Nguolist.vue';

const nguoListRef = ref(null); // Reference to NguoList component

const refreshList = () => {
  if (nguoListRef.value) {
    nguoListRef.value.fetchNguo(); // Call fetchNguo in NguoList.vue
  }
};
</script>

<template>
  <div>
    <h1>Nguo Management</h1>
    <AddNguo @itemAdded="refreshList"/>
    <Nguolist ref="nguoListRef"/>
  </div>
</template>

<style scoped>
</style>
