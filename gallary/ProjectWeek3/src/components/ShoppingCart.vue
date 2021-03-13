<template>
    <div>
        <h1>{{cart.length}} in cart</h1>
         <button id="show-modal" @click="showModal=true">View Cart</button>
        <MovieModal v-if="showModal" @close="showModal=false" :cart="cart"/>
    </div>
</template>

<script>

import MovieModal from './MovieModal'


export default {
    name:'ShoppingCart',
    data()  {
        return{
            showModal:false,
            
        }
    },
    
   
    methods: {
        
    },
    components:{
        MovieModal,
        
    },
    props:['cart']
}
</script>

<style scoped>
    
</style>
