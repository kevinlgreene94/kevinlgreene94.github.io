<template>
    <div>
         <button @click=AddToCart(cart) :cart="cart">Add</button>
        
    </div>
</template>

<script>

export default {
    name:'AddToCart',
    data(){
        return{
            
        }
    },
    props:['cart'],
   
    methods: {
        AddToCart: function(cart) {
            ++cart
            return{
                cart,
            }
        }
    },
    components:{
        
    }
}
</script>

<style scoped>

</style>
