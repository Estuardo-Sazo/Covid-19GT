<?php

require_once("include/php/ConexionDB.php");
  $operacion='';
    $json= array();
    $json_string='Vacio';
    
    
    
   
    if(isset($_GET['valor'])){
         $operacion=$_GET['valor'];
    }
     
    
    
    
    if($operacion=='Actualizar'){
        $let= 0;
        $N=$_GET['Nuevos'];
        $F=$_GET['Fecha'];
        $M=$_GET['Muertes'];
        $R=$_GET['Recuperado'];
        $P=$_GET['Pruebas'];
        
        $h= new conectar();
        $conett=$h->conexion();
    
        $query2="UPDATE tbl_datos_generales SET confirmado=confirmado+$N, muertes= muertes+$M,recuperados=recuperados+$R, activos=activos+$N-$M-$R   WHERE Id=1";
        $result2=mysqli_query($conett,$query2);
       
        $query3="INSERT tbl_datos_diarios(dt_nuevos,dt_recuperados,dt_muertes,dt_pruebas,dt_fecha) VALUES ($N,$R,$M,$P,'$F')";
        $result3=mysqli_query($conett,$query3);
               
               if(!$result2){
                   echo  mysqli_error($conett) . "\n";
               }
               if(!$result3){
                echo  mysqli_error($conett) . "\n";
            }
               
               $json_string= 'Correcto';
                mysqli_close($conett);
                
                header('Location:index.php');
    
    }




?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Actualizar Datos</title>
  </head>
  <body>
    <h1 align="center">Actualizar Datos</h1>
    <div class="container">
        <dvi class="row justify-content-center">
            <div class="col-md-4">
                <form method="GET">
                  <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" name="valor" value="Actualizar">
                    
                  </div>
                   <div class="form-group">
                    <label for="Confir">Casos Nuevos</label>
                    <input type="number" class="form-control" name="Nuevos" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="Muertes">Muertes</label>
                    <input type="number" class="form-control" name="Muertes" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="Recuperado">Recuperados</label>
                    <input type="number" class="form-control" name="Recuperado" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="Activo">Pruebas Realizadas</label>
                    <input type="number" class="form-control" name="Pruebas" required>
                    
                  </div>
                  <div class="form-group">
                    <label for="Activo">Fecha</label>
                    <input type="text" class="form-control" name="Fecha" required>
                    
                  </div>
                  
                  <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </form>
            </div>
        </dvi>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>