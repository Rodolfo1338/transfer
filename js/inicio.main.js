
// var url = "bd/crud.carreras.php"; //cambiar por direccion de archivo .php que contendra variables de login (tipo de usuario y id de usuario)


var Idinicio = new Vue({    
el: "#Idinicio",   
data:{     
     tipousuario:0,
     idusuario:0,          
     
    
     
     
           
 },    
methods:{  
    Identificatipousuario:function(){
     userrol = document.getElementById('rolsesion').value;
     this.tipousuario=userrol;

      // this.tipousuario=1;


    },     
    borrarCarrera:function(clave){
        axios.post(url, {opcion:3, clave:clave}).then(response =>{           
            this.listarCarreras();
            });
    },
    cerrarsesion:function(){
      this.tipousuario=1;
      this.idusuario=0;
      location.reload();
    }             
},      
created: function(){            
   this.Identificatipousuario();            
},    
computed:{
    
}    
});