<script setup>
import { onMounted, ref } from 'vue';

const name = ref('Jhon');
const status = ref('active');
const tasks = ref(['Task One', 'Task Two', 'Task Three']);
const newTask = ref('');
const link = ref('https://google.com')

const toggleStatus = () => {
  if (status.value === 'active') {
    status.value = 'pending';
  } else if (status.value === 'pending') {
    status.value = 'active'
  }
}

const addTask = () => {
  if (newTask.value.trim() != '') {
    tasks.value.push(newTask.value);
    newTask.value = '';
  }
}

const deleteTask = (index) => {
  tasks.value.splice(index, 1);
}

onMounted(async () => {
  try {
    const response = await fetch('https://jsonplaceholder.typicode.com/todos');
    const data = await response.json();
    console.log(data);
    tasks.value = data.map((task) => task.title);

  } catch (error) {
    console.log('Error fetching tasaks' + error);
  }
})
</script>



<template>
  <h1>{{ name }}</h1>
  <p v-if="status === 'active'">User is active</p>
  <p v-else-if="status === 'pending'">User is pending</p>
  <p v-else>User is inactive</p>

  <form @submit.prevent="addTask">
    <label for="newTask">AddTask</label>
    <input type="text" name="newTask" id="newTask" v-model="newTask">
    <button type="submit">Submit</button>
  </form>

  <h3>Tasks:</h3>

  <ul>
    <li v-for="(task, index) in tasks" key="task">
      <span>{{ task }}</span>
      <button @click="deleteTask(index)"></button>
    </li>
  </ul>

  <a :href="link">Google</a>

  <button @click="toggleStatus">Change status</button>
</template>

<style scoped>
h1 {
  color: red;
}
</style>