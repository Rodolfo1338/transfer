
var url = "bd/crud.conceptos.php";


var Idempleados = new Vue({    
el: "#Idconceptos",   
data:{     
     datos:[],          
     clave:"",
     concepto:"",
     costo:0,
     
     
           
 },    
methods:{  
    //BOTONES        
    btnAlta:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'Agregar Concepto',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Concepto</label><div class="col-sm-7"><input id="concepto" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Costo</label><div class="col-sm-7"><input id="costo" type="number" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
             this.concepto = document.getElementById('concepto').value,
             this.costo = document.getElementById('costo').value      
            ]
          }
        })        
        if(this.concepto == "" 
          || this.costo==0){
                Swal.fire({
                  type: 'info',
                  title: 'Datos incompletos',                                    
                }) 
        }       
        else{          
          this.altaConcepto();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: '¡Concepto Agregado!'
            }) 
            this.listarEmpleados();               
        }
    },           
    btnEditar:async function(clave,concepto,costo){                            
        await Swal.fire({
        title: 'Editar Concepto',
        html:
        '<div class="row"><label class="col-sm-3 col-form-label">Clave</label><div class="col-sm-7"><input id="clave" value="'+clave+'" type="text" disabled class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Concepto</label><div class="col-sm-7"><input id="concepto" value="'+concepto+'" type="text" class="form-control"></div></div>'+
        '<div class="row"><label class="col-sm-3 col-form-label">Costo</label><div class="col-sm-7"><input id="costo" value="'+costo+'" type="number" class="form-control"></div></div>',
        focusConfirm: false,
        showCancelButton: true,                         
        }).then((result) => {
          if (result.value) {                                             
            clave = document.getElementById('clave').value,    
            concepto = document.getElementById('concepto').value,
            costo = document.getElementById('costo').value,
            
                                             
            
            this.editarConcepto(clave,concepto,costo);
            Swal.fire(
              '¡Actualizado!',
              'El concepto ha sido actualizado.',
              'success'
            )                  
          }
        });
        
    },        
    btnBorrar:function(clave,nombre){        
        Swal.fire({
          title: '¿Está seguro de borrar el concepto: '+nombre+" ?",         
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
    //Procedimiento CREAR.
    altaConcepto:function(){
        axios.post(url, {opcion:1, concepto:this.concepto,costo:this.costo
        }).then(response =>{
            this.listarConceptos();
        });        
         this.concepto="", this.costo=0
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
},    
computed:{
    
}    
});