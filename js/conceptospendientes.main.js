
var url = "bd/crud.conceptospendientes.php";


var Idconceptospendientes = new Vue({    
el: "#Idconceptospendientes",   
data:{     
     datos:[],
     conceptos:[],
     materias:[],          
     clave:"",
     estado:0,
     concepto:0,
     cuenta:0,
     materia:0,
           
 },    
methods:{  
    //BOTONES        
    btnAlta: function(){
      concepto = document.getElementById('concepto').value,
      cuenta = document.getElementById('cuenta').value,
      materia = document.getElementById('combomateria').value,

      this.altaConcepto(concepto,cuenta,materia);

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        type: 'success',
        title: '¡Concepto Pendiente Agregado!'
      }) 

      
      document.getElementById('cuenta').value='';
    
     
      



    },        
    btnBorrar:function(clave,concepto,materia,cuenta){        
        Swal.fire({
          title: '¿Está seguro de borrar el concepto: '+concepto+" de la Asignatura "+materia+" Perteneciente a la cuenta "+cuenta+" ?",         
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor:'#d33',
          cancelButtonColor:'#3085d6',
          confirmButtonText: 'Borrar'
        }).then((result) => {
          if (result.value) {            
            this.borrarConcepto(clave);             
            //y mostramos un msj sobre la eliminación  
            Swal.fire(
              '¡Eliminado!',
              'El concepto ha sido borrado.',
              'success'
            )
          }
        })                
    },       
    
    //PROCEDIMIENTOS para el CRUD     
    listarConceptos:function(){
      axios.post(url, {opcion:4}).then(response =>{
       this.datos = response.data;       
     });
    }, 
    listarConceptosCombo:function(){
      axios.post(url, {opcion:5}).then(response =>{
       this.conceptos = response.data; 
       console.log(this.conceptos);      
     });
    },
    listarMateriassCombo:function(){
      axios.post(url, {opcion:6}).then(response =>{
       this.materias = response.data; 
       console.log(this.materias);      
     });
    },    
    //Procedimiento CREAR.
    altaConcepto:function(concepto,cuenta,materia){
        axios.post(url, {opcion:1, concepto:concepto,matricula:cuenta,materia:materia
        }).then(response =>{
            this.listarConceptos();
        });        
         
    },               
    //Procedimiento EDITAR.
    editarConcepto:function(clave,concepto,costo){       
       axios.post(url, {
        opcion:2, 
        clave:clave,
        concepto:concepto,
        costo:costo
      })
       .then(response =>{           
           this.listarConceptos();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarConcepto:function(clave){
        axios.post(url, {opcion:3, clave:clave}).then(response =>{           
            this.listarConceptos();
            });
    }             
},      
created: function(){            
   this.listarConceptos(); 
   this.listarConceptosCombo();
   this.listarMateriassCombo(); 
             
},    
computed:{
    
}    
});