var url = "bd/crud.php";


var Idalumnos = new Vue({    
el: "#Idalumnos",   
data:{     
     datos:[],
     carreras:[],
     carrerasedit:[],
     editar:false,
     elegido:{} ,
     selected: 0,       
     
           
 },    
methods:{  
    //BOTONES        
    btnAlta: function(){ 

    matricula = document.getElementById('matricula').value,
    nombre = document.getElementById('nombre').value,
    apaterno = document.getElementById('apaterno').value,
    amaterno = document.getElementById('amaterno').value,
    carrera = document.getElementById('carrera').value,
    cuatrimestre = document.getElementById('cuatrimestre').value,
    grupo = document.getElementById('grupo').value,
    curp = document.getElementById('curp').value,
    direccion = document.getElementById('direccion').value,
    telefono = document.getElementById('telefono').value,
    email = document.getElementById('email').value,
    usuario = document.getElementById('usuario').value,
    password = document.getElementById('password').value,

    this.altaAlumno(matricula,nombre,apaterno,amaterno,carrera,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password);

    //this.altaAlumno(matricula,nombre,apaterno,amaterno,carrera,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password);          
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
     document.getElementById('matricula').value="",
     document.getElementById('nombre').value="",
     document.getElementById('apaterno').value="",
     document.getElementById('amaterno').value="",
     document.getElementById('carrera').value=null,
     document.getElementById('cuatrimestre').value="",
     document.getElementById('grupo').value="",
     document.getElementById('curp').value="",
     document.getElementById('direccion').value="",
     document.getElementById('telefono').value="",
     document.getElementById('email').value="",
     document.getElementById('usuario').value="",
     document.getElementById('password').value=""              
     
   },           
   btnEditar:async function(){                            

    matricula = document.getElementById('edmatricula').value,
    nombre = document.getElementById('ednombre').value,
    apaterno = document.getElementById('edapaterno').value,
    amaterno = document.getElementById('edamaterno').value,
    carrera = document.getElementById('edcarrera').value,
    cuatrimestre = document.getElementById('edcuatrimestre').value,
    grupo = document.getElementById('edgrupo').value,
    curp = document.getElementById('edcurp').value,
    direccion = document.getElementById('eddireccion').value,
    telefono = document.getElementById('edtelefono').value,
    email = document.getElementById('edemail').value,
    usuario = document.getElementById('edusuario').value,
    password = document.getElementById('edpassword').value,

    this.editarAlumno(matricula,nombre,apaterno,amaterno,carrera,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password);

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
     Toast.fire({
      type: 'success',
      title: '¡Alumno Editado'
    }) 
     this.listarAlumnos();
     document.getElementById('edmatricula').value="",
     document.getElementById('ednombre').value="",
     document.getElementById('edapaterno').value="",
     document.getElementById('edamaterno').value="",
     document.getElementById('edcarrera').value="",
     document.getElementById('edcuatrimestre').value="",
     document.getElementById('edgrupo').value="",
     document.getElementById('edcurp').value="",
     document.getElementById('eddireccion').value="",
     document.getElementById('edtelefono').value="",
     document.getElementById('edemail').value="",
     document.getElementById('edusuario').value="",
     document.getElementById('edpassword').value="",
     

   

  },        
    btnBorrar:function(matricula,nombre,usuario){        
        Swal.fire({
          title: '¿Está seguro de borrar al Alumno: '+nombre+" ?",         
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor:'#d33',
          cancelButtonColor:'#3085d6',
          confirmButtonText: 'Borrar'
        }).then((result) => {
          if (result.value) {            
            this.borrarAlumno(matricula,usuario);             
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
    elegirAlumno:function(elegido){
      this.elegido=elegido;
      this.listarCarrerasEdit(elegido.vchcarrera);
    },
    listarCarreras:function(){
        axios.post(url, {opcion:5}).then(response =>{
           this.carreras = response.data;  
           console.log(this.carreras);     
        });
    },
    listarCarrerasEdit:function(carrera){
        axios.post(url, {opcion:6,carrera:carrera}).then(response =>{
           this.carrerasedit = response.data;  
           console.log(this.carrerasedit);     
        });
    },    
    //Procedimiento CREAR.
    altaAlumno:function(matricula,nombre,apaterno,amaterno,carrera,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password){   

      console.log("matricula "+matricula,"nombre "+nombre,"apaterno "+apaterno,"amaterno"+amaterno,"cuatrimestre"+cuatrimestre,"grupo"+grupo,"curp"+curp,"direccion"+direccion,"telefono"+telefono,"email"+email,"usuario"+usuario,"password"+password,"carrera"+carrera);    
      axios.post(url, {opcion:1, matricula:matricula, nombre:nombre, apaterno:apaterno, amaterno:amaterno,cuatrimestre:cuatrimestre,
       grupo:grupo, curp:curp,direccion:direccion,telefono:telefono,email:email,usuario:usuario,password:password,
       carrera:carrera })
      .then(response =>{           
       this.listarAlumnos();           
     });         
        
         
    },               
    //Procedimiento EDITAR.
    editarAlumno:function(matricula,nombre,apaterno,amaterno,carrera,cuatrimestre,grupo,curp,direccion,telefono,email,usuario,password){   

      console.log("matricula "+matricula,"nombre "+nombre,"apaterno "+apaterno,"amaterno"+amaterno,"cuatrimestre"+cuatrimestre,"grupo"+grupo,"curp"+curp,"direccion"+direccion,"telefono"+telefono,"email"+email,"usuario"+usuario,"password"+password,"carrera"+carrera);        
       axios.post(url, {opcion:2, matricula:matricula, nombre:nombre, apaterno:apaterno, amaterno:amaterno,cuatrimestre:cuatrimestre,
       grupo:grupo, curp:curp,direccion:direccion,telefono:telefono,email:email,usuario:usuario,password:password,
       carrera:carrera })
       .then(response =>{           
           this.listarAlumnos();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarAlumno:function(matricula,usuario){
        axios.post(url, {opcion:3, matricula:matricula,usuario:usuario}).then(response =>{           
            this.listarAlumnos();
            });
    }             
},      
created: function(){            
   this.listarAlumnos();
   this.listarCarreras();
   /*Swal.fire(
              '¡Aviso!',
              'Cobobox aun no implementados, usar clave  de carrera para dar de alta',
              'success'
            )   */         
},    
computed:{
    
}    
});