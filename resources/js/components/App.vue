<template>
    <div id="">
      

        

        <router-view></router-view>

    
         
    </div>
</template>

<script>
import Vista1 from './Vista1'
import VistaD from'./VistaDetalle'
export default {
    name: 'App',
    components: {
        Vista1,
        VistaD
    },
    
    
}
</script>