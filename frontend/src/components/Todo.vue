<script >
import axios from 'axios';
const API_URL = "http://localhost/";

export default {
data(){
  return{
    task : "",
    todoList : [],
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
    this.todoList.push({
      text: this.task,
      randomX : Math.floor(Math.random() * window.innerWidth),
      randomY : Math.floor(Math.random() * window.innerHeight)

    })
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
  },
  generateCord(){
      this.randomX = Math.floor(Math.random() * window.innerWidth);
      this.randomY = Math.floor(Math.random() * window.innerHeight);
  }
},
mounted(){
  this.getAll();
}
}


</script>

<template>
  <div class="col-12 col-sm-5 d-flex flex-column">
    <form action="" @submit="addNew">
      <label for="">Inserisci task: </label>
      <input type="text" v-model="task" class="form-control">
      <input type="submit" value="Add" class="btn btn-primary">
    </form>
    <ul>
      <li v-for="(task,index) in todoList" :key="index" class="postit" :style="{ position: 'absolute', left: task.randomX + 'px', top: task.randomY + 'px' }">
        <span @click="taskDone(index)" :class="task.completed == true ? 'postit': 'postitDone'">{{ task.text }}</span>
        <span  :class="task.completed == true ? 'postit': 'postitDone'"><font-awesome-icon icon="fa-solid fa-trash" @click="deleteTask(index)" /></span>
      </li>
    </ul>
    <!-- <div class="postit" :style="{ position: 'absolute', left: randomX + 'px', top: randomY + 'px' }"> -->
      
    <!-- </div> -->
  </div>

</template>

<style scoped>
.taskDone{
  text-decoration:line-through;
}
span{
  cursor: pointer;
}
/* .postit{
  background-color: bisque;
} */
.postit{
  background: linear-gradient(
    180deg,
    rgb(0, 179, 60) 0%,
    rgb(6, 94, 60) 12%,
    rgb(54, 255, 3) 75%,
    rgb(102, 237, 84) 100%
  );
  width: 100px;
  height: 100px;

  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Kalam', cursive;
  font-size: 1.25rem;

  clip-path: url(#stickyClip);
}
.postitDone{
  background: red;
  width: 100px;
  height: 100px;

  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Kalam', cursive;
  font-size: 1.25rem;

  clip-path: url(#stickyClip);
}

</style>
