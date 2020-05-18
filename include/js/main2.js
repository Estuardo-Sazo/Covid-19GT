$(document).ready(function (){
    Visita();
    Datos();
      // Funcion encargada de buscar datos en la DB y cargarlos
      function Visita(){
        const datos={
            Valor:'newVisita',
            
        };
        $.post('include/php/controlDatos.php',datos,function(response){   //metodo para consultar archivo de php     
                let Datos = JSON.parse(response);
                
                console.log(Datos);
                
                let visita='';
                
                
                    Datos.forEach(d => {
                        
                        visita=d.visitas;
                    });
                    
                   
                    $('#visitas').html(visita);

        });
        
    } 


    // Funcion encargada de buscar datos en la DB y cargarlos
    function Datos(){
        const datos={
            Valor:'General',
            
        };
        $.post('include/php/controlDatos.php',datos,function(response){   //metodo para consultar archivo de php     
                let Datos = JSON.parse(response);
                
                console.log(Datos);
                
                let activos='';
                let curados='';
                let muertes='';
                let total='';
                
                    Datos.forEach(d => {
                        activos=d.activos;
                        muertes=d.muertes;
                        curados=d.recuperados;
                        total=parseInt(d.activos)+parseInt(d.muertes)+parseInt(d.recuperados)+2;
                        
                    });
                                    
                    $('#activos').html(activos);
                    $('#muertes').html(muertes);
                    $('#curados').html(curados);
                    $('#total').html(total);
                    


        });


    } 




});