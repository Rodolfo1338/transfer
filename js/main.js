var url = "bd/crud.php";


var Idalumnos = new Vue({    
el: "#Idalumnos",   
data:{     
     datos:[],          
     matricula:"",
     nombre:"",
     apaterno:"",
     amaterno:"",
     carrera:"",
     cuatrimestre:"",
     grupo:"",
     curp:"",
     direccion:"",
     telefono:"",
     email:"",
     usuario:"",
     password:"",
           
 },    
methods:{  
    //BOTONES        
    btnAlta:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'Agregar Alumno',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Matricula</label><div class="col-sm-7"><input id="matricula" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="nombre" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Paterno</label><div class="col-sm-7"><input id="apaterno" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Materno</label><div class="col-sm-7"><input id="amaterno" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Carrera</label><div class="col-sm-7"><input id="carrera" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Cuatrimestre</label><div class="col-sm-7"><input id="cuatrimestre" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Grupo</label><div class="col-sm-7"><input id="grupo" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Curp</label><div class="col-sm-7"><input id="curp" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Direccion</label><div class="col-sm-7"><input id="direccion" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Telefono</label><div class="col-sm-7"><input id="telefono" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">E-mail</label><div class="col-sm-7"><input id="email" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Usuario</label><div class="col-sm-7"><input id="usuario" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Contraseña</label><div class="col-sm-7"><input id="password" type="text" class="form-control"></div></div>',              
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
             this.matricula = document.getElementById('matricula').value,
             this.nombre = document.getElementById('nombre').value,
             this.apaterno = document.getElementById('apaterno').value,
             this.amaterno = document.getElementById('amaterno').value, 
             this.carrera = document.getElementById('carrera').value, 
             this.cuatrimestre = document.getElementById('cuatrimestre').value,
             this.grupo = document.getElementById('grupo').value,  
             this.curp = document.getElementById('curp').value,  
             this.direccion = document.getElementById('direccion').value, 
             this.telefono = document.getElementById('telefono').value,
             this.email = document.getElementById('email').value, 
             this.usuario = document.getElementById('usuario').value,  
             this.password = document.getElementById('password').value        
            ]
          }
        })        
        if(this.matricula == "" || this.nombre == "" || this.apaterno == "" || this.amaterno=="" || this.carrera==""
          || this.cuatrimestre=="" || this.grupo=="" || this.curp=="" || this.direccion=="" || this.telefono==""
          || this.email=="" || this.usuario=="" || this.password==""){
                Swal.fire({
                  type: 'info',
                  title: 'Datos incompletos',                                    
                }) 
        }       
        else{          
          this.altaAlumno();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: '¡Alumno Agregado!'
            }) 
            this.listarAlumnos();               
        }
    },           
    btnEditar:async function(matricula,nombre,apaterno,amaterno,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password,carrera){                            
        await Swal.fire({
        title: 'EDITAR',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Matricula</label><div class="col-sm-7"><input id="matricula" value="'+matricula+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="nombre" value="'+nombre+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Paterno</label><div class="col-sm-7"><input id="apaterno" value="'+apaterno+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">A Materno</label><div class="col-sm-7"><input id="amaterno" value="'+amaterno+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Carrera</label><div class="col-sm-7"><input id="carrera" value="'+carrera+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Cuatrimestre</label><div class="col-sm-7"><input id="cuatrimestre" value="'+cuatrimestre+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Grupo</label><div class="col-sm-7"><input id="grupo" value="'+grupo+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Curp</label><div class="col-sm-7"><input id="curp" value="'+curp+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Direccion</label><div class="col-sm-7"><input id="direccion" value="'+direccion+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Telefono</label><div class="col-sm-7"><input id="telefono" value="'+telefono+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">E-mail</label><div class="col-sm-7"><input id="email" value="'+email+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Usuario</label><div class="col-sm-7"><input id="usuario" value="'+usuario+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Contraseña</label><div class="col-sm-7"><input id="password" value="'+password+'" type="text" class="form-control"></div></div>',  
        focusConfirm: false,
        showCancelButton: true,                         
        }).then((result) => {
          if (result.value) {                                             
            matricula = document.getElementById('matricula').value,    
            nombre = document.getElementById('nombre').value,
            apaterno = document.getElementById('apaterno').value,
            amaterno = document.getElementById('amaterno').value,
            cuatrimestre = document.getElementById('cuatrimestre').value, 
            grupo = document.getElementById('grupo').value, 
            curp = document.getElementById('curp').value,
            direccion = document.getElementById('direccion').value, 
            telefono = document.getElementById('telefono').value, 
            email = document.getElementById('email').value,
            usuario = document.getElementById('usuario').value, 
            password = document.getElementById('password').value,  
            carrera = document.getElementById('carrera').value,                                  
            
            this.editarAlumno(matricula,nombre,apaterno,amaterno,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password,carrera);
            Swal.fire(
              '¡Actualizado!',
              'El alumno ha sido actualizado.',
              'success'
            )                  
          }
        });
        
    },        
    btnBorrar:function(matricula){        
        Swal.fire({
          title: '¿Está seguro de borrar al Alumno: '+matricula+" ?",         
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor:'#d33',
          cancelButtonColor:'#3085d6',
          confirmButtonText: 'Borrar'
        }).then((result) => {
          if (result.value) {            
            this.borrarAlumno(matricula);             
            //y mostramos un msj sobre la eliminación  
            Swal.fire(
              '¡Eliminado!',
              'El alumno ha sido borrado.',
              'success'
            )
          }
        })                
    },       
    
    //PROCEDIMIENTOS para el CRUD     
    listarAlumnos:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.datos = response.data;       
        });
    },    
    //Procedimiento CREAR.
    altaAlumno:function(){
        axios.post(url, {opcion:1, matricula:this.matricula, nombre:this.nombre,apaterno:this.apaterno,
        amaterno:this.amaterno,carrera:this.carrera,cuatrimestre:this.cuatrimestre,grupo:this.grupo,
        curp:this.curp,direccion:this.direccion,telefono:this.telefono,email:this.email,usuario:this.usuario,
        password:this.password }).then(response =>{
            this.listarAlumnos();
        });        
         this.matricula = "", this.nombre = "", this.apaterno = "",this.amaterno = "",this.carrera = "",this.cuatrimestre = "",
         this.grupo = "",this.curp = "",this.direccion = "",this.telefono = "",this.email = "",this.usuario = "",this.password = ""
         
    },               
    //Procedimiento EDITAR.
    editarAlumno:function(matricula,nombre,apaterno,amaterno,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password,carrera){       
       axios.post(url, {opcion:2, matricula:matricula, nombre:nombre, apaterno:apaterno, amaterno:amaterno,cuatrimestre:cuatrimestre,
       grupo:grupo, curp:curp,direccion:direccion,telefono:telefono,email:email,usuario:usuario,password:password,
       carrera:carrera })
       .then(response =>{           
           this.listarAlumnos();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarAlumno:function(matricula){
        axios.post(url, {opcion:3, matricula:matricula}).then(response =>{           
            this.listarAlumnos();
            });
    }             
},      
created: function(){            
   this.listarAlumnos();            
},    
computed:{
    
}    
});