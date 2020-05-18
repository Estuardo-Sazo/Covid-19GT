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
            Valor:'Ultimo',
            
        };
        $.post('include/php/controlDatos.php',datos,function(response){   //metodo para consultar archivo de php     
                let Datos = JSON.parse(response);
                
                console.log(Datos);
                
                let nuevos='';
                let fallecidos='';
                let curados='';
                let pruebas='';
                let fecha1='';
                
                    Datos.forEach(d => {
                        fecha1=d.dt_fecha;
                        nuevos=d.dt_nuevos;
                        fallecidos=d.dt_muertes;
                        curados=d.dt_recuperados;
                        pruebas=d.dt_pruebas;
                        
                    });
                    
                    console.log(fecha1);
                    
                    $('#fecha').html(fecha1);
                    $('#nuevos').html(nuevos);
                    $('#muertes').html(fallecidos);
                    $('#pruebas').html(pruebas);
                    $('#recuperados').html(curados);
                    


        });
        
    }



});