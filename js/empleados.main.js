
var url = "bd/crud.empleados.php";


var Idempleados = new Vue({    
el: "#Idempleados",   
data:{     
     datos:[],          
     clave:"",
     nombre:"",
     apaterno:"",
     amaterno:"",
     rfc:"",
     direccion:"",
     puesto:"",
     usuario:"",
     password:"",
     
           
 },    
methods:{  
    //BOTONES        
    btnAlta:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'Agregar Empleado',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="nombre" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Paterno</label><div class="col-sm-7"><input id="apaterno" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Materno</label><div class="col-sm-7"><input id="amaterno" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">RFC</label><div class="col-sm-7"><input id="rfc" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Direccion</label><div class="col-sm-7"><input id="direccion" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Puesto</label><div class="col-sm-7"><input id="puesto" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Usuario</label><div class="col-sm-7"><input id="usuario" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Contraseña</label><div class="col-sm-7"><input id="password" type="text" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
             this.nombre = document.getElementById('nombre').value,
             this.apaterno = document.getElementById('apaterno').value,
             this.amaterno = document.getElementById('amaterno').value, 
             this.rfc = document.getElementById('rfc').value, 
             this.direccion = document.getElementById('direccion').value,
             this.puesto = document.getElementById('puesto').value,  
             this.usuario = document.getElementById('usuario').value,  
             this.password = document.getElementById('password').value       
            ]
          }
        })        
        if(this.nombre == "" 
          || this.apaterno==""
          || this.amaterno=="" 
          || this.rfc=="" 
          || this.direccion=="" 
          || this.puesto==""
          || this.usuario=="" 
          || this.password==""){
                Swal.fire({
                  type: 'info',
                  title: 'Datos incompletos',                                    
                }) 
        }       
        else{          
          this.altaEmpleado();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: '¡Empleado Agregado!'
            }) 
            this.listarEmpleados();               
        }
    },           
    btnEditar:async function(clave,nombre,apaterno,amaterno,rfc,direccion,puesto,usuario,password){                            
        await Swal.fire({
        title: 'Editar Empleado',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Clave</label><div class="col-sm-7"><input id="clave" value="'+clave+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="nombre" value="'+nombre+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Paterno</label><div class="col-sm-7"><input id="apaterno" value="'+apaterno+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Materno</label><div class="col-sm-7"><input id="amaterno" value="'+amaterno+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">RFC</label><div class="col-sm-7"><input id="rfc" value="'+rfc+'" type="text"  class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Direccion</label><div class="col-sm-7"><input id="direccion" value="'+direccion+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Puesto</label><div class="col-sm-7"><input id="puesto" value="'+puesto+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Usuario</label><div class="col-sm-7"><input id="usuario" value="'+usuario+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Contraseña</label><div class="col-sm-7"><input id="password" value="'+password+'" type="text" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,                         
        }).then((result) => {
          if (result.value) {                                             
            clave = document.getElementById('clave').value,    
            nombre = document.getElementById('nombre').value,
            apaterno = document.getElementById('apaterno').value,
            amaterno = document.getElementById('amaterno').value,
            rfc = document.getElementById('rfc').value, 
            direccion = document.getElementById('direccion').value, 
            puesto = document.getElementById('puesto').value,
            usuario = document.getElementById('usuario').value, 
            password = document.getElementById('password').value, 
                                             
            
            this.editarEmpleado(clave,nombre,apaterno,amaterno,rfc,direccion,puesto,usuario,password);
            Swal.fire(
              '¡Actualizado!',
              'El empleado ha sido actualizado.',
              'success'
            )                  
          }
        });
        
    },        
    btnBorrar:function(clave,nombre){        
        Swal.fire({
          title: '¿Está seguro de borrar al Empleado: '+nombre+" ?",         
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor:'#d33',
          cancelButtonColor:'#3085d6',
          confirmButtonText: 'Borrar'
        }).then((result) => {
          if (result.value) {            
            this.borrarEmpleado(clave);             
            //y mostramos un msj sobre la eliminación  
            Swal.fire(
              '¡Eliminado!',
              'El empleado ha sido borrado.',
              'success'
            )
          }
        })                
    },       
    
    //PROCEDIMIENTOS para el CRUD     
    listarEmpleados:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.datos = response.data;       
        });
    },    
    //Procedimiento CREAR.
    altaEmpleado:function(){
        axios.post(url, {opcion:1, nombre:this.nombre,apaterno:this.apaterno,amaterno:this.amaterno,
          rfc:this.rfc,direccion:this.direccion,puesto:this.puesto,usuario:this.usuario,password:this.password
        }).then(response =>{
            this.listarEmpleados();
        });        
         this.nombre="", this.apaterno="", this.amaterno="",this.rfc="", this.direccion="",this.puesto="",this.usuario="",
         this.password=""
    },               
    //Procedimiento EDITAR.
    editarEmpleado:function(clave,nombre,apaterno,amaterno,rfc,direccion,puesto,usuario,password){       
       axios.post(url, {
        opcion:2, 
        clave:clave,
        nombre:nombre,
        apaterno:apaterno,
        amaterno:amaterno,
        rfc:rfc,
        direccion:direccion,
        puesto:puesto,
        usuario:usuario,
        password:password
      })
       .then(response =>{           
           this.listarEmpleados();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarEmpleado:function(clave){
        axios.post(url, {opcion:3, clave:clave}).then(response =>{           
            this.listarEmpleados();
            });
    }             
},      
created: function(){            
   this.listarEmpleados();            
},    
computed:{
    
}    
});