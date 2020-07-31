<template>
    <div>


        <button class="btn btn-primary float-right mr-4 boton" data-toggle="modal" data-target="#ventanaModal">Registrar</button>
        <div class="card-body mt-5">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white text-center">
                        <tr>
                            <th scope="col" @click="mensajeCorreoExistente()">Nombres</th>
                            <th scope="col">Salario</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr v-for="(item,index) in lista" :key="index" class="text-center">
                            <td >{{item.nombres}}</td>
                            <td>S/ {{item.salario}}.00</td>
                            <td>{{item.estado}}</td>
                            <td>{{item.cargo}}</td>
                            <td>{{item.correo}}</td>
                            <td><router-link  :to="{name:'detalle', params: {id:item.id}}"><span class="btn btn-warning"><i class="fa fa-eye"></i></span></router-link></td>
                            <td><a href="" class="btn btn-danger" @click="eliminar(item,index)"><i class="fa fa-trash-alt"></i></a></td>
                            
                        </tr>
                        

                        
                       

                    </tbody>
                </table>

            </div>


            <!-- codigo del modal -->
            <div class="modal fade"  id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div id="mh" class="modal-header">
                            
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
                                <select name="select"  class="form-control mb-3" v-model="nuevoTrabajador.cargo" required>
                                    <option value="">CARGO</option>
                                    <option value="Director">Director</option>
                                    <option value="Auxiliar">Auxiliar</option>
                                    <option value="Coordinador">Coordinador</option>
                                </select>
                                <span class="mail">
                                    <input type="text" id="emailNombre" placeholder="Email" class="form-control mb-3 w-100" v-model="nuevoTrabajador.emailnombre" required>
                                    <select name="select"  class="form-control mb-3 w-100" v-model="nuevoTrabajador.emaildominio" required>
                                    <option value="@hotmail.com" >@hotmail.com</option>
                                    <option value="@gmail.com">@gmail.com</option>
                                    
                                    </select>

                                </span>
                                
                                
                                
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

            <!-- ============================= -->
         
            
            
            
        
    </div>
    
</template>

<script>
// import NuevoTrabajador from './NuevoTrabajador.vue'
export default {
    name: 'Colaboradores',
    components: {
        // NuevoTrabajador
    },
    data() {
        return {
            // regis: [],
            lista: [],
            nuevoTrabajador: {
                nombre: '',
                apellido: '',
                cargo: '',
                emailnombre: '',
                emaildominio: '',
                emailcompleto:'',
                salario: 500,
                estado: '',
                completo: ''

            },
            correos: [],
            cantidad: 0,
           
          
            
        }

    },
    created() {

        axios.get('/smile')
            .then(res => {
                this.lista = res.data;
                console.log('mis registros', this.lista)
            });


              

           
            

    },
    mounted() {
        // this.$emit('listaHijo',this.lista)
        
            axios.get('/smile/')
            .then(res =>{
                this.cantidad = (res.data.length)
                console.log('Cantidad de registros', this.cantidad)
                
                for(let i=0;i<this.cantidad;i++){
                    this.correos[i]= res.data[i].correo;

                }

                console.log(this.correos)
                    
                    
                
                
            })

          
        
        

    },
    methods: {

       

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
            this.nuevoTrabajador.emailcompleto = this.nuevoTrabajador.emailnombre+this.nuevoTrabajador.emaildominio

            console.log(this.nuevoTrabajador.completo + ' ' + this.nuevoTrabajador.salario + ' ' + this.nuevoTrabajador.estado);
            const parametros = {
                nombreCompleto: this.nuevoTrabajador.completo,
                salario: this.nuevoTrabajador.salario,
                estado: this.nuevoTrabajador.estado,
                cargo: this.nuevoTrabajador.cargo,
                email: this.nuevoTrabajador.emailcompleto

            };

             var cont=0;
            for (let i = 0; i < this.cantidad; i++) {

                        if(this.correos[i]==parametros.email){
                            cont++
                        }
                    }

                    if(cont==0){
                         axios.post('/smile', parametros)
                .then(res => {
                        
                            this.lista.push(res.data)
                            this.nuevoTrabajador = {
                                nombre: '',
                                apellido: '',
                                cargo: '',
                                emailnombre: '',
                                salario: 500,
                                estado: '',
                                completo: ''

                            }
                            console.log('param nuevo', parametros.email)
                            console.log('correos'.this.correos)
                             alert("Se insertó");
                    
                    
                    


                }).catch(error => {
                    console.log(error.response)
                });

                    }else{
                        alert("Correo existente");
                        
                        

                    }
           

            console.log(this.lista)


        },
        eliminar(item,index){
            axios.delete(`/smile/${item.id}`)
            .then(()=>{
                this.lista.splice(index,1);
            })


        },
        

    },
    computed: {

        verificarEmail(){
            
             

            
            
            
            
        }
        
       
    }
    
    
    

    
}
</script>

<style scope>

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

.mail{
    display: grid;
    grid-template-columns: 50% 50%;
}
    
</style>