<script >
import axios from 'axios';
const API_URL = "http://localhost/";
export default {
data(){
  return{
    task : "",
    todoList : []
  }
},
methods: {
  getAll(){
    axios.get(API_URL + "api.php")
    .then(res => {
      const data = res.data;
      this.todoList = data;
    });

  },
  addNew(e){
    e.preventDefault();
    const params = { params: {
      "newTask" : this.task
    }};
    axios.get(API_URL + "newtask.php",params)
    .then(() => {
      this.getAll();
    })
    this.task = "";
  }
},
mounted(){
  this.getAll();
}
}


</script>

<template>
    <form action="" @submit="addNew">
      <label for="">Inserisci task: </label>
      <input type="text" v-model="task">
      <input type="submit" value="Add" @click="addNew">
    </form>
    <ul>
      <li v-for="(task,index) in todoList" :key="index" :class="task.completed == true ? 'sottolineato': ''">
        {{ task.text }}
        {{ task.completed }}
      </li>
    </ul>
</template>

<style scoped>
.sottolineato{
  text-decoration:line-through;
}

</style>
