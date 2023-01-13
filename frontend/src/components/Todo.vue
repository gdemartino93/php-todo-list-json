<script >
import axios from 'axios';
const API_URL = "http://localhost/";
export default {
data(){
  return{
    task : "",
  }
},
methods: {
  getAll(){
  
    axios.get(API_URL + "api.php")
    .then(res => {
      const data = res.data;
      console.log(data);
    })
  }
},
mounted(){
  this.getAll();
}
}


</script>

<template>
    <form action="">
      <label for="">Inserisci task: </label>
      <input type="text" v-model="task">
      <input type="submit" value="Add">
    </form>
</template>

<style scoped>

</style>
