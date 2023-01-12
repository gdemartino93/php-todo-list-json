<script>
import axios from 'axios';

const API_URL = "http://localhost/api.php";

export default {
    data(){
        return{
            toDoName :""
        }
    },
    methods:{
    addNew(e){
        e.preventDefault();
        axios.get(API_URL, { params:  {
                                        "fare" : this.toDoName
                                            },})
        .then(res => {
        const data= res.data;
        console.log(data);

    })
    },
 }    
}
</script>

<template>
<form action="">
    <label for="">Inserisci nuovo</label>
    <input type="text" name="todo" v-model="toDoName" >
    <input type="submit" @click="addNew" value="toDo">
</form>
</template>

<style scoped>

</style>
