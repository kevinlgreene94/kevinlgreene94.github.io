<template>
    <div>
        <form @submit.prevent="SearchMovies()" class=search-box>
            <h1 class="text-center">Looking For A Movie? <br> Search Here</h1>
            <input type="text" v-model="search"/>
            <input type="submit" value="Search"/>
       </form> 

       <div class="movie-list"><h1 class="text-center">Movies</h1>
           <div class="movie d-inline-block p-5" v-for="movie in movies" :key="movie.index">
               <div class="product-image">
                   <img :src="movie.Poster" alt="Movie Poster">
                   <h4 class="title">{{movie.Title}}</h4>
                   <h5>Price: ${{price}} <br><AddToCart :cart='cart' @click="AddToCart(cart)"/></h5>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import env from '@/env.js'
import AddToCart from './AddToCart'

export default({
    name:'SearchBar',
    setup() {
        const search = ref('');
        const movies = ref([]);

        const SearchMovies = () => {
            if (search.value != ""){
                fetch(`http://www.omdbapi.com/?apikey=${env.apikey}&s=${search.value}`)
                    .then(response => response.json())
                    .then(data => {
                        movies.value = data.Search;
                        search.value = "";
                        console.log(data)
                    })
            }
        }
        return{
            search,
            movies,
            SearchMovies,
            price: 4.99
        }
    },

    props:['cart'],
    components:{
        AddToCart,
    },
    methods:{
        AddToCart: function(cart, price){
            cart+=price;
            return{
                cart
            }
        }
    },
    emits:['AddToCart']
    
})
</script>

<style scoped>
.product-image{
    width: 50%;
}
.search-box{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 16px;

}
.title{
    color: #2f2a27;
    text-shadow: 1px 1px white;
}
</style>
