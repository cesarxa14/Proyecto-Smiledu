<template>
    <div>
        <!-- <div class="modal fade"  id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h1 id="tituloVentana">Nuevo Trabajador</h1>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="agregar">
                                <div class="inputs">

                                <input type="text" placeholder="Nombre(*)" class="form-control mb-3" v-model="nuevoTrabajador.nombre" required>
                                <input type="text" placeholder="Apellido(*)" class="form-control mb-3" v-model="nuevoTrabajador.apellido" required>
                                <select name="select" id="" class="form-control mb-3" v-model="nuevoTrabajador.cargo" required>
                                    <option value="">CARGO</option>
                                    <option value="Director">Director</option>
                                    <option value="Auxiliar">Auxiliar</option>
                                    <option value="Coordinador">Coordinador</option>
                                </select>
                                <input type="email" placeholder="Email" class="form-control mb-3" v-model="nuevoTrabajador.email" required>
                                
                                
                                <div class="slidecontainer">
                                    <label for="">Salario(*)</label><span class=" ml-2 badge badge-pill badge-primary sala">  S/.{{nuevoTrabajador.salario}}</span>
                                    <input type="range" step="100" min="500" max="6000" value="500" class="slider" id="myRange" v-model="nuevoTrabajador.salario">
                                </div>
                                <div class="pie">
                                    <span class="mr-4">Campos Obligatorios(*)</span>
                                    <div class="float-right">
                                        <button class="btn btn-danger mr-1" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">Cancelar</span>
                                        </button>
                                        <button class="btn btn-primary" type="submit">Enviar</button>
                                        

                                    </div>

                                    
                                    
                                    

                                </div>
                                
                                
                                

                            </div>

                            </form>
                            
                            

                        </div>
                        

                    </div>

                </div>

            </div>
         -->
    </div>
</template>
<script>
export default {
    data(){
    return {
        
        lista: [],
        nuevoTrabajador:{
            nombre:'',
            apellido: '',
            cargo: '',
            email:'',
            salario:500,
            estado:'',
            completo: ''
            
        },
        
    }
    },
    created(){
        
        axios.get('/smile')
        .then( res =>{
            this.lista = res.data;
        })

    },
    mounted(){
        this.$emit('listaHijo',this.lista)
      
    },
    methods:{
    async function(){
        this.$emit('marley',this.lista)
    },
definirEstado() {

        if (this.nuevoTrabajador.salario >= 500 && this.nuevoTrabajador.salario <= 1000) {
            this.nuevoTrabajador.estado = 'Bajo';
        } else if (this.nuevoTrabajador.salario > 1000 && this.nuevoTrabajador.salario <= 1500) {
            this.nuevoTrabajador.estado = 'Medio';

        } else if (this.nuevoTrabajador.salario > 1500 && this.nuevoTrabajador.salario <= 1900) {
            this.nuevoTrabajador.estado = 'Alto';
        } else {
            this.nuevoTrabajador.estado = 'Muy Alto';
        }

    },

    agregar() {

    

     if (this.nuevoTrabajador.salario >= 500 && this.nuevoTrabajador.salario <= 1000) {
            this.nuevoTrabajador.estado = 'Bajo';
        } else if (this.nuevoTrabajador.salario > 1000 && this.nuevoTrabajador.salario <= 1500) {
            this.nuevoTrabajador.estado = 'Medio';

        } else if (this.nuevoTrabajador.salario > 1500 && this.nuevoTrabajador.salario <= 1900) {
            this.nuevoTrabajador.estado = 'Alto';
        } else {
            this.nuevoTrabajador.estado = 'Muy Alto';
        }
    this.nuevoTrabajador.completo = this.nuevoTrabajador.nombre + " " + this.nuevoTrabajador.apellido

    console.log(this.nuevoTrabajador.completo + ' ' + this.nuevoTrabajador.salario + ' ' + this.nuevoTrabajador.estado);
    const parametros = {
        nombreCompleto: this.nuevoTrabajador.completo,
        salario: this.nuevoTrabajador.salario,
        estado: this.nuevoTrabajador.estado,
        cargo: this.nuevoTrabajador.cargo,
        email: this.nuevoTrabajador.email

    };

    this.nuevoTrabajador = {
        nombre:'',
        apellido: '',
        cargo: '',
        email:'',
        salario:500,
        estado:'',
        completo: ''

    }
    

    axios.post('/smile',parametros)
    .then( res =>{
        this.lista.push(res.data)
        
        
    }).catch(error =>{
        console.log(error.response)
    });

    alert("Se insertó");

      console.log(this.lista)

    

    

},





},


   
    
}

</script>

<style scope>


.inputs{
    display: grid;
    grid-template-columns: 50% 50%;
    gap:0.5rem;
    padding: 2%;
}
.slidecontainer{
    grid-column: 2/3;
}
.sala{
    width:4rem;
}
.pie{
    border-top: 1px solid black;
    padding-top: 5px;
    grid-column: 1/3;
}

    
</style>