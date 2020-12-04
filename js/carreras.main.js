
var url = "bd/crud.carreras.php";


var Idcarreras = new Vue({    
el: "#Idcarreras",   
data:{     
     datos:[],          
     clave:"",
     carrera:"",
    
     
     
           
 },    
methods:{  
    //BOTONES        
    btnAlta:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'Agregar Carrera',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Carrera</label><div class="col-sm-7"><input id="carrera" type="text" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
             this.carrera = document.getElementById('carrera').value     
            ]
          }
        })        
        if(this.carrera == ""){
                
        }       
        else{          
          this.altaCarrera();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: '¡Carrera Agregada!'
            }) 
            this.listarEmpleados();               
        }
    },           
    btnEditar:async function(clave,carrera){                            
        await Swal.fire({
        title: 'Editar Carrera',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Clave</label><div class="col-sm-7"><input id="clave" value="'+clave+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Carrera</label><div class="col-sm-7"><input id="carrera" value="'+carrera+'" type="text" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,                         
        }).then((result) => {
          if (result.value) {                                             
            clave = document.getElementById('clave').value,    
            carrera = document.getElementById('carrera').value,
           
            
                                             
            
            this.editarCarrera(clave,carrera);
            Swal.fire(
              '¡Actualizado!',
              'La carrera ha sido actualizada',
              'success'
            )                  
          }
        });
        
    },        
    btnBorrar:function(clave,carrera){        
        Swal.fire({
          title: '¿Está seguro de borrar : '+carrera+" ?",         
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor:'#d33',
          cancelButtonColor:'#3085d6',
          confirmButtonText: 'Borrar'
        }).then((result) => {
          if (result.value) {            
            this.borrarCarrera(clave);             
            //y mostramos un msj sobre la eliminación  
            Swal.fire(
              '¡Eliminado!',
              'La Carrera ha sido borrada.',
              'success'
            )
          }
        })                
    },       
    
    //PROCEDIMIENTOS para el CRUD     
    listarCarreras:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.datos = response.data;       
        });
    },    
    //Procedimiento CREAR.
    altaCarrera:function(){
        axios.post(url, {opcion:1, carrera:this.carrera
                }).then(response =>{
            this.listarCarreras();
        });        
         this.carrera=""
    },               
    //Procedimiento EDITAR.
    editarCarrera:function(clave,carrera){       
       axios.post(url, {
        opcion:2, 
        clave:clave,
        carrera:carrera
      })
       .then(response =>{           
           this.listarCarreras();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarCarrera:function(clave){
        axios.post(url, {opcion:3, clave:clave}).then(response =>{           
            this.listarCarreras();
            });
    }             
},      
created: function(){            
   this.listarCarreras();            
},    
computed:{
    
}    
});