<script>
import axios from 'axios';

const API_URL = "http://localhost/api.php";

export default {
    data(){
        return{
            newTask :""
        }
    },
    methods:{
    addNew(e){
        e.preventDefault();
        axios.get(API_URL, { params:  {     "id" : 100,
                                            "task" : this.newTask,
                                            "completed" : false,
                                            },})
        .then(res => {
        const data = res.data;
        console.log(data);

    })
    },
 }    
}
</script>

<template>
<form action="" @submit="addNew" value="toDo">
    <label for="">Inserisci nuovo</label>
    <input type="text" name="todo" v-model="newTask" >
    <input type="submit">
</form>
</template>

<style scoped>

</style>
