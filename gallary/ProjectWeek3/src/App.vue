<template>
  <div>
    <Header/>
    <div><SearchBar/></div>
  </div>
</template>

<script>
import Header from './components/Header.vue';
import SearchBar from './components/SearchBar';


export default {
  name: 'App',
  components: {
    Header,
    SearchBar,
  },
  data(){
    return {
      movies: [],
    }
  },
  
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2f2a27;
  text-shadow: 1px 1px white;
  width: 100%;
  height: 100%;
}
html, body{
  width: 100%;
  height: 100%;
  background-image: url('./assets/background.jpg');
}
</style>
