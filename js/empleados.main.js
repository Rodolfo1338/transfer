
var url = "bd/crud.empleados.php";


var Idempleados = new Vue({    
el: "#Idempleados",   
data:{     
     datos:[], 
     roles:[],
     rolesedit:[],         
     clave:"",
     nombre:"",
     apaterno:"",
     amaterno:"",
     rfc:"",
     direccion:"",
     puesto:"",
     usuario:"",
     password:"",
     editar:false,
     elegido:{} ,
     selected: 0,   
     
           
 },    
methods:{  

    NuevoEmpleado:function(){

      nombre = document.getElementById('nombre').value,
      apaterno = document.getElementById('apaterno').value,
      amaterno = document.getElementById('amaterno').value,
      rfc = document.getElementById('rfc').value,
      direccion = document.getElementById('direccion').value,
      puesto = document.getElementById('puesto').value,
      usuario = document.getElementById('usuario').value,
      password = document.getElementById('password').value,
      
      this.altaEmpleado(nombre,apaterno,amaterno,rfc,direccion,puesto,usuario,password);

      document.getElementById('nombre').value="";
      document.getElementById('apaterno').value="";
      document.getElementById('amaterno').value="";
      document.getElementById('rfc').value="";
      document.getElementById('direccion').value="";
      document.getElementById('puesto').value="";
      document.getElementById('usuario').value="";
      document.getElementById('password').value="";




    },
          
            
    btnEditar:function(){ 
      clave=document.getElementById('edclave').value,
      nombre = document.getElementById('ednombre').value,
      apaterno = document.getElementById('edapaterno').value,
      amaterno = document.getElementById('edamaterno').value,
      rfc = document.getElementById('edrfc').value,
      direccion = document.getElementById('eddireccion').value,
      puesto = document.getElementById('edpuesto').value,
      usuario = document.getElementById('edusuario').value,
      password = document.getElementById('edpassword').value,

      this.editarEmpleado(clave,nombre,apaterno,amaterno,rfc,direccion,puesto,usuario,password);
      document.getElementById('edclave').value="";
      document.getElementById('ednombre').value="";
      document.getElementById('edapaterno').value="";
      document.getElementById('edamaterno').value="";
      document.getElementById('edrfc').value="";
      document.getElementById('eddireccion').value="";
      document.getElementById('edpuesto').value="";
      document.getElementById('edusuario').value="";
      document.getElementById('edpassword').value="";

        
        
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
    altaEmpleado:function(nombre,apaterno,amaterno,rfc,direccion,puesto,usuario,password){
        axios.post(url, {opcion:1, nombre:nombre,apaterno:apaterno,amaterno:amaterno,
          rfc:rfc,direccion:direccion,puesto:puesto,usuario:usuario,password:password
        }).then(response =>{
            this.listarEmpleados();
            Swal.fire(
              '¡Registrado!',
              'El empleado ha sido registrado.',
              'success'
            )
        });        
         
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
    },
    elegirEmpleado:function(elegido){
      this.elegido=elegido;
      this.listarrolesedit(elegido.vchrol);
    },
    listarrolesedit:function(puesto){
      axios.post(url, {opcion:6,puesto:puesto}).then(response =>{
           this.rolesedit = response.data;  
           console.log(this.rolesedit);     
        });

    },
    consultarroles:function(){
      axios.post(url, {opcion:5}).then(response =>{
           this.roles = response.data;       
        });
    }            
},      
created: function(){            
   this.listarEmpleados(); 
   this.consultarroles();           
},    
computed:{
    
}    
});