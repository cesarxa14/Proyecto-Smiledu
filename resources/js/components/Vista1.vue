<template>
    <div>
        <panel>
            <colaboradores></colaboradores>
        </panel>

        
    </div>
</template>

<script>
import Panel from './Panel.vue'
import Colaboradores from './Colaboradores.vue'
export default {
    name:'Vista1',
    components: {
        Panel,
        Colaboradores
    }
    
}
</script>