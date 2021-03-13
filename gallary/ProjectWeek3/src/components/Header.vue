<template>
  <div>
    <div class="jumbotron">
      <div class="text-center"><h1>MiniFlix</h1> <br><p class="lead">Get your flix fix!</p></div>
      <div class="d-flex justify-content-end"><ShoppingCart :cart='cart'/></div>

    </div>
</div>
</template>

<script>

import ShoppingCart from './ShoppingCart'


export default {
  name: 'Header',
  components:{
    ShoppingCart,
    
  },
  methods: {
     
    },
  data(){
      return{
        cart:[],
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
div{
  color:#6f4824;
  text-shadow: 1px 1px black
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.jumbotron{
  background-image:url('../assets/jumbotron.jpg');
  background-position: center;
  background-size: contain;
  
}
</style>
