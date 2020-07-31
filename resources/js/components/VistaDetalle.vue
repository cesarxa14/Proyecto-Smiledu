<template>
    <div class="container">

        <div>
            <div>
                <router-link :to="{name: 'home'}"><button class="btn btn-outline-primary my-3"><i class="fa fa-chevron-left"></i> Atras</button></router-link>
            </div>

            <div class="card">
                <div class="card-header">
                    <h1>Datos Personales</h1>
                </div>
                <div class="card-body cuerpo-info">
                    <div class="info">
                        
                        
                            <h4>Nombre Completo</h4>
                            <h3 class="datos">{{trabajador.nombres}}</h3>
                        
                        
                            <h4>Correo</h4>
                            <h5 class="datos">{{trabajador.correo}}</h5>
                        
                        
                            <h4>Cargo</h4>
                            <h3 class="datos">{{trabajador.cargo}}</h3>
                        
                        
                            <h4>Salario</h4>
                            <h3 class="datos">{{trabajador.salario}}</h3>
                        
                        
                            <h4>Estado</h4>
                            <h3 class="datos">{{trabajador.estado}}</h3>
                        
                        
                        

                    </div>
                    <div>
                        <img class="perfil" src="../perfil.jpg" alt="">

                    </div>

                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-warning  w-25" data-toggle="modal"
                     data-target="#editarModal" @click="pasarDatos">Editar</button>

                </div>
                
            </div>
            <!-- MODAAAAAAAAAAAAL-->
    
        </div>
        
            <div class="modal fade"  id="editarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h1 id="tituloVentana">Editar Trabajador</h1>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="editar">
                                <div class="inputs">

                                <input type="text" placeholder="Nombre(*)" class="form-control mb-3" v-model="trabajadorUpdate.nombreC" required >
                                <select name="select" id="" class="form-control mb-3" v-model="trabajadorUpdate.cargo"  required>
                                    <option value="">CARGO</option>
                                    <option value="Director">Director</option>
                                    <option value="Auxiliar">Auxiliar</option>
                                    <option value="Coordinador">Coordinador</option>
                                </select>
                                <input type="email" placeholder="Email" class="form-control mb-3" v-model="trabajadorUpdate.email" required>
                                
                                
                                <div class="slidecontainer">
                                    <label for="">Salario(*)</label><span class=" ml-2 badge badge-pill badge-primary sala">{{trabajadorUpdate.salario}} </span>
                                    <input type="range" step="100" min="500" max="6000" value="500" class="slider" id="myRange" v-model="trabajadorUpdate.salario" >
                                </div>
                                <div class="pie">
                                    <span class="mr-4">Campos Obligatorios(*)</span>
                                    <div class="float-right">
                                        <button class="btn btn-danger mr-1" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">Cancelar</span>
                                        </button>
                                        <button class="btn btn-primary" type="submit">Actualizar</button>
                                        

                                    </div>

                                    
                                    
                                    

                                </div>     

                            </div>

                            </form>
                        </div>
                        

                    </div>

                </div>

            </div> 
        
    
        
    </div>
</template>
<script>

export default {
    name:'VistaDetalle',
    components: {
       
    },
    data(){
        return{
            id:0,
            trabajador: [],
            trabajadorUpdate: {
                nombreC: '',
                salario: 0,
                cargo: '',
                email:'',
                estado:''

            }
        }
    },
    created(){
        this.id = this.$route.params.id;
        console.log(this.$route.params.id)
        console.log(this.$route.params.trabajador)
        axios.get('/smile/'+ this.id)
        .then(res =>{
            this.trabajador = res.data;
        });

        

        
    },
    methods:{
        pasarDatos(){
            
        this.trabajadorUpdate.nombreC = this.trabajador.nombres;
        this.trabajadorUpdate.salario = this.trabajador.salario;
        this.trabajadorUpdate.cargo = this.trabajador.cargo;
        this.trabajadorUpdate.email= this.trabajador.correo;
        this.trabajadorUpdate.estado = this.trabajador.estado;


    },
        editar(){
            
            if (this.trabajadorUpdate.salario >= 500 && this.trabajadorUpdate.salario <= 1000) {
                this.trabajadorUpdate.estado = 'Bajo';
            } else if (this.trabajadorUpdate.salario > 1000 && this.trabajadorUpdate.salario <= 1500) {
                this.trabajadorUpdate.estado = 'Medio';

            } else if (this.trabajadorUpdate.salario > 1500 && this.trabajadorUpdate.salario <= 1900) {
                this.trabajadorUpdate.estado = 'Alto';
            } else {
                this.trabajadorUpdate.estado = 'Muy Alto';
            }

            const parametros = {
                nombreCompleto: this.trabajadorUpdate.nombreC,
                salario: this.trabajadorUpdate.salario,
                estado: this.trabajadorUpdate.estado,
                cargo: this.trabajadorUpdate.cargo,
                email: this.trabajadorUpdate.email,
        
            };


            axios.put(`/smile/${this.trabajador.id}`, parametros)
            .then(res =>{
                this.trabajador = res.data;
                alert("Se actualizó el registro con exito")
                console.log(res.data);
            }).catch(error => {
                    console.log(error.response)
                });

                
            

        }
    }
    
    
}
</script>

<style scope>

.cuerpo-info{
    display: grid;
    grid-template-columns: 50% 50%;
}
.info{
    display: grid;
    grid-template-columns: 50% 50%;
    text-align: center;
    gap:4px
}
.datos{
    margin-left: 0.1rem;
    background-color: cadetblue;
    border-radius: 5px;
    color: white;
}
.perfil{
    border-radius: 100%;
    width: 75%;
    margin-left: auto;
    margin-right: auto;
    display: block;
}

.boton{
    margin-top: 1rem;
}
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