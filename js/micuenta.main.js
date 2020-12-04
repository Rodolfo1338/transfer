
var url = "bd/crud.micuenta.php";


var Idconceptospendientes = new Vue({    
el: "#Idconceptospendientes",   
data:{     
     datos:[],
     usuario:20171021,
           
 },    
methods:{  
          
          
    
    //PROCEDIMIENTOS para el CRUD     
    listarDatosCuenta:function(){
      axios.post(url, {opcion:1,usuario:this.usuario}).then(response =>{
       this.datos = response.data;  
       console.log(this.datos);     
     });
    },
    /*ConsultarAdeudo:function(){
      axios.post(url, {opcion:7,usuario:this.usuario}).then(response =>{
       this.Adeudo = response.data;  
       console.log('materias jane '+this.Adeudo);     
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
    } */            
},      
created: function(){            
   this.listarDatosCuenta();
             
},    
computed:{
    
}    
});