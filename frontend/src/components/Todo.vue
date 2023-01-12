<script>
import axios from 'axios';

const API_URL = "http://localhost/api.php";

export default {
 mounted(){
    axios.get(API_URL)
    .then(res => {
        const data= res.data;
        console.log(data);
    })
 }    
}


</script>

<template>
<h1>
    asd
</h1>
</template>

<style scoped>

</style>
