<template>
        <div>{{countCart}}</div>   
</template>

<script>
    import axios from 'axios';
    import {EventBus} from './event-bus'

    export default {
        data: function() {
           return {
              countCart: '',              
           }
        },
        mounted() {
           this.cartCount();

           EventBus.$on('countCart', data => {
              console.log('Custom event triggered!')
              this.countCart = data.countCart
           })     
        },
        methods: {
           cartCount() {
             var app = this;
             axios
              .get('/cartUserCount')
                .then(function (resp) {
                    console.log(resp.data);

                    app.countCart = resp.data;

                    EventBus.$emit('countCartFromLayout', {
                       count: resp.data,
                    }); 
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not count cart");
                });            
           },    
        },
    }
</script>
