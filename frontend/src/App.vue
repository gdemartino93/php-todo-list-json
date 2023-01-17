<script setup>
import Header from './components/AppHeader.vue'
import Todo from './components/Todo.vue'
</script>

<template>
    <header>
        <Header />
    </header>
    <div class="container d-flex justify-content-center align-items-center">
        <Todo />
    </div>
</template>

<style scoped>

header{
    background-color:beige;
    width: 100vw;
}

</style>
