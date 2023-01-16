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
  },
  taskDone(i){
    const params = { params: {
      "id" : i
    }}
    axios.get(API_URL + "taskdone.php", params)
          .then(() =>{
            this.getAll();
          })
     },
  deleteTask(i){
    const params = { params: {
      "id" : i
    }}
    axios.get(API_URL + "deleteTask.php", params)
        .then(() =>{
          this.getAll();
        })
        console.log(i);
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
      <input type="submit" value="Add" class="btn btn-primary">
    </form>
    <ul>
      <li v-for="(task,index) in todoList" :key="index">
        <span   @click="taskDone(index)" :class="task.completed == true ? 'taskDone': ''">{{ task.text }}</span>
        <span @click="deleteTask(index)"><font-awesome-icon icon="fa-solid fa-trash" /></span>
      </li>
      
    </ul>
</template>

<style scoped>
.taskDone{
  text-decoration:line-through;
}
span{
  cursor: pointer;
}

</style>
