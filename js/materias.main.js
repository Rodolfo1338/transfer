var url = "bd/crud.materias.php";


var Idcarreras = new Vue({    
el: "#Idcarreras",   
data:{     
     datos:[],          
     clave:"",
     materia:"",
    
     
     
           
 },    
methods:{  
    //BOTONES        
    btnAlta:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'Agregar Materia',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Materia</label><div class="col-sm-7"><input id="materia" type="text" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
             this.materia = document.getElementById('materia').value     
            ]
          }
        })        
        if(this.materia == ""){
                
        }       
        else{          
          this.altaMateria();          
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
            this.listarMaterias();               
        }
    },           
    btnEditar:async function(clave,materia){                            
        await Swal.fire({
        title: 'Editar Carrera',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Clave</label><div class="col-sm-7"><input id="clave" value="'+clave+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Carrera</label><div class="col-sm-7"><input id="materia" value="'+materia+'" type="text" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,                         
        }).then((result) => {
          if (result.value) {                                             
            clave = document.getElementById('clave').value,    
            materia = document.getElementById('materia').value,
           
            
                                             
            
            this.editarMateria(clave,materia);
            Swal.fire(
              '¡Actualizado!',
              'La materia ha sido actualizada',
              'success'
            )                  
          }
        });
        
    },        
    btnBorrar:function(clave,materia){        
        Swal.fire({
          title: '¿Está seguro de borrar : '+materia+" ?",         
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor:'#d33',
          cancelButtonColor:'#3085d6',
          confirmButtonText: 'Borrar'
        }).then((result) => {
          if (result.value) {            
            this.borrarMateria(clave);             
            //y mostramos un msj sobre la eliminación  
            Swal.fire(
              '¡Eliminado!',
              'La Materia ha sido borrada.',
              'success'
            )
          }
        })                
    },       
    
    //PROCEDIMIENTOS para el CRUD     
    listarMaterias:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.datos = response.data;       
        });
    },    
    //Procedimiento CREAR.
    altaMateria:function(){
        axios.post(url, {opcion:1, materia:this.materia
                }).then(response =>{
            this.listarMaterias();
        });        
         this.materia=""
    },               
    //Procedimiento EDITAR.
    editarMateria:function(clave,materia){       
       axios.post(url, {
        opcion:2, 
        clave:clave,
        materia:materia
      })
       .then(response =>{           
           this.listarMaterias();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarMateria:function(clave){
        axios.post(url, {opcion:3, clave:clave}).then(response =>{           
            this.listarMaterias();
            });
    }             
},      
created: function(){            
   this.listarMaterias();            
},    
computed:{
    
}    
});