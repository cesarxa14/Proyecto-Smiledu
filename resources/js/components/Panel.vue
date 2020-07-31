<template>
    <div class="panel ">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="ch-1">
                    
                    <p><i class="fa fa-bars mr-4"></i><b>Colaboradores</b> </p>

                </div>
                <div class="ch-2">
                    <input type="text" class="mr-3" >
                    <i class="fa fa-search mr-3"></i>
                    <i class="fa fa-ellipsis-v"></i>

                </div>



            </div>

            <colaboradores></colaboradores>

            
        </div>

        
        
    </div>
</template>
<script>
export default {
    name: 'Panel'
}
</script>

<style scoped>

.panel{
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
    box-shadow: 5px 2px rgb(71, 63, 63);
}
.card{
    height: auto;
    
}

.card-header{
    height: 50px;
    display: grid;
    grid-template-columns: 50% 50%;
}

.ch-1{
    color: white;
}
.ch-2{
    text-align: end;
    color: white;
}

</style>

