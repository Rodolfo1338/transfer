
var url = "bd/crud.cuentas.php";


var Idcuentas = new Vue({    
  el: "#Idcuentas",   
  data:{     
   datos:[],          
   cuenta:"",
   nombre:"",
   apaterno:"",
   amaterno:"",
   carrera:"",
   vencimiento:"",
   codigo:"",
   saldo:"",
 },    
 methods:{  
    //BOTONES        
    btnAlta:async function(){                    
      const {value: formValues} = await Swal.fire({
        title: 'Crear Cuenta',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label"></label><div class="col-sm-7"><input id="cuenta" type="number" placeholder="Matrícula" class="form-control"></div></div>'+
        '<br>'+
        '<div class="row"><label class="col-sm-3 col-form-label"></label><div class="col-sm-7"><input id="vencimiento" placeholder="Vencimiento" type="text" class="form-control"></div></div>'+
        '<br>'+
        '<div class="row"><label class="col-sm-3 col-form-label"></label><div class="col-sm-7"><input id="codigo" placeholder="CCV" type="text" class="form-control"></div></div>',
        
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',
        cancelButtonText:'Cancelar',  
        preConfirm: () => {            
          return [
          this.cuenta = document.getElementById('cuenta').value,
          this.vencimiento = document.getElementById('vencimiento').value,
          this.codigo = document.getElementById('codigo').value, 
          this.saldo = 0     
          ]
        }
      })        
      if(this.cuenta == 0
        || this.vencimiento==""
        || this.codigo=="" 
        ){
         
    }       
    else{          
      this.crearCuenta();          
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        type: 'success',
        title: '¡Cuenta Creada!'
      }) 
      this.listarCuentas();               
    }
  },           
  btnDepositar:async function(cuenta,saldo){                            
    await Swal.fire({
      title: 'Depositar a Cuenta',
      html:
      '<div class="row"><label class="col-sm-3 col-form-label">N° Cuenta</label><div class="col-sm-7"><input id="cuenta" value="'+cuenta+'" type="text" disabled class="form-control"></div></div>'+
      '<div class="row"><label class="col-sm-3 col-form-label">Saldo Actual</label><div class="col-sm-7"><input id="saldoactual" value="'+saldo+'" type="text" disabled class="form-control"></div></div>'+
      '<div class="row"><label class="col-sm-3 col-form-label">Deposito</label><div class="col-sm-7"><input id="deposito"  type="number" class="form-control"></div></div>',
      focusConfirm: false,
      showCancelButton: true,                         
    }).then((result) => {
      if (result.value) { 

       cuenta = document.getElementById('cuenta').value, 
       saldo = document.getElementById('saldoactual').value, 
       deposito = document.getElementById('deposito').value,

       Swal.fire({
        title: '¿Depositar a cuenta: '+cuenta+" ?",         
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#1cc88a',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {            



         this.depositarCuenta(cuenta,saldo,deposito);
         this.MovimientoDeposito(cuenta,deposito);
         Swal.fire(
          '¡Depositado!',
          'El deposito ha sido realizado.',
          'success'
          ) 
       }
     }) 



    }
  });

  },        
  btnBorrar:function(clave){        
    Swal.fire({
      title: '¿Está seguro de borrar la cuenta: '+clave+" ?",         
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor:'#d33',
      cancelButtonColor:'#3085d6',
      confirmButtonText: 'Borrar'
    }).then((result) => {
      if (result.value) {            
        this.borrarCuenta(clave);             
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


    listarCuentas:function(){
      axios.post(url, {opcion:4}).then(response =>{
       this.datos = response.data;       
     });
    },    
    //Procedimiento CREAR.
    crearCuenta:function(){
      axios.post(url, {opcion:1, cuenta:this.cuenta,vencimiento:this.vencimiento,codigo:this.codigo,saldo:this.saldo})
      .then(response =>{
        this.listarCuentas();
        this.Movimiento();
      });        
      this.nombre="", this.apaterno="", this.amaterno="",this.rfc="", this.direccion="",this.puesto="",this.usuario="",
      this.password=""
    }, 
    //procedimiento registrar Movimiento
    Movimiento:function(){
      axios.post(url, {opcion:5, cuenta:this.cuenta,saldo:this.saldo})
      .then(response =>{
        this.listarCuentas();
      });        
      this.nombre="", this.apaterno="", this.amaterno="",this.rfc="", this.direccion="",this.puesto="",this.usuario="",
      this.password=""

    } , 
    MovimientoDeposito:function(cuenta,deposito){
      axios.post(url, {opcion:6, cuenta:cuenta,deposito:deposito})
      .then(response =>{
        this.listarCuentas();
      });        
      
    } ,           
    //Procedimiento EDITAR.
    depositarCuenta:function(cuenta,saldo,deposito){       
     axios.post(url, {
      opcion:2, 
      cuenta:cuenta,
      saldo:saldo,
      deposito:deposito
    })
     .then(response =>{           
       this.listarCuentas();           
     });                              
   },    
    //Procedimiento BORRAR.
    borrarCuenta:function(clave){
      axios.post(url, {opcion:3, cuenta:clave}).then(response =>{           
        this.listarCuentas();
      });
    }             
  },      
  created: function(){            
   this.listarCuentas(); 

 },    
 computed:{

 }    
});