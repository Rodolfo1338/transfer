
var url = "bd/crud.misconceptos.php";


var classgeneral = new Vue({    
  el: "#classgeneral",   
  data:{     
   datos:[],
   datospagados:[],
   mismovimientos:[],
   datoscuenta:[],
   materias:[],
   Adeudo:[],          
   clave:"",
   estado:0,
   concepto:0,
   cuenta:0,
   materia:0,
   usuario:0,
   nombreusuario:"",
   costo:0,
   saldo:0,



 },    
 methods:{  
    //BOTONES        
    btnPagar: function(concepto,costo,cuenta){

      if(parseInt(costo)>parseInt(this.saldo)){
        Swal.fire(
              '¡Saldo Insuficiente!',
              'Realiza un Deposito',
              'error'
              )
        
        
      }else{
        Swal.fire({
        title: '¿Pagar $'+costo+' ?',         
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Pagar'
      }).then((result) => {
        if (result.value) {            
          this.pagarConcepto(concepto,costo,cuenta);             
            //y mostramos un msj sobre la eliminación  
            Swal.fire(
              '¡Pagado!',
              'El concepto ha sido pagado.',
              'success'
              )
          }
        })
      

      }
      

      
        
       

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
      axios.post(url, {opcion:4,usuario:this.usuario}).then(response =>{
       this.datos = response.data; 

       console.log(this.datos);     
     });
    },
    listarConceptosPagados:function(){
      axios.post(url, {opcion:9,usuario:this.usuario}).then(response =>{
       this.datospagados = response.data; 

       console.log('Datos Pagados ',this.datospagados);     
     });
    },

    ConsultarAdeudo:function(){
      axios.post(url, {opcion:7,usuario:this.usuario}).then(response =>{
       this.Adeudo = response.data;


     });
    }, 
    consultarDatosCuenta:function(){
      axios.post(url, {opcion:6,usuario:this.usuario}).then(response =>{
       this.datoscuenta = response.data; 
       this.saldo=response.data[0].fltsaldo;
       console.log('DATOS CUENTA',this.datoscuenta,'saldo',this.saldo);      
     });
    },
    consultarMismovimientos:function(){
      axios.post(url, {opcion:8,usuario:this.usuario}).then(response =>{
       this.mismovimientos = response.data;  
       console.log('mis movimientos',this.mismovimientos);     
     });
    },
    identificarcuentaUsuario:function(){
      userid = document.getElementById('iduser').value;
      axios.post(url, {opcion:10,iduser:userid}).then(response =>{
       this.usuario = response.data[0].vchmatricula; 
       console.log('matricula ',this.usuario); 
       this.listarConceptos();
       this.listarConceptosPagados(); 
       this.consultarDatosCuenta();
       this.consultarMismovimientos();
       this.ConsultarAdeudo();
         
     });

     
   },

    //Procedimiento CREAR.
    pagarConcepto:function(concepto,costo,cuenta){
      axios.post(url, {opcion:1, concepto:concepto,costo:costo,saldo:this.saldo,matricula:cuenta
      }).then(response =>{
        console.log(response);
        this.listarConceptos();
        this.listarConceptosPagados(); 
        this.ConsultarAdeudo();
        this.consultarDatosCuenta();
        this.consultarMismovimientos();
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
    this.identificarcuentaUsuario();           
    // this.listarConceptos();
    

  },    
  computed:{

  }    
});