<?php
session_start();
date_default_timezone_set('America/Guatemala');
    $fecha=date('Y-m-d');

    //Creamos variables para almacenar los datos 
    $json= array();
    $json_string = 'ERROR';

    if(!empty($_POST['Valor']))// Evalumos el valor en POST que si exista para poder continuar
    {
        $valor=$_POST['Valor'];
        require 'daoDatos.php';//Elazamos nuestro controlador
        $ob=new DaoDatos();

        if($valor=="Ultimo")/// Evaluamos el dato que trae la variable $Valor 
        {
                            
            $r1=$ob->ultiDato();/// Llamamos  la funcion encargada
            while($row=mysqli_fetch_array($r1)){
                $json[]=$row;             
            }            
            $json_string =json_encode($json);//Covertimos los datos obtenidos en un JSON
            
        }
        if($valor=="General")/// Evaluamos el dato que trae la variable $Valor 
        {
                            
            $r1=$ob->general();/// Llamamos  la funcion encargada
            while($row=mysqli_fetch_array($r1)){
                $json[]=$row;             
            }            
            $json_string =json_encode($json);//Covertimos los datos obtenidos en un JSON
            
        }

        if($valor=="newVisita")/// Evaluamos el dato que trae la variable $Valor 
        {
                
            $ob->visitaAdd();
            $r1=$ob->visitas();/// Llamamos  la funcion encargada
            while($row=mysqli_fetch_array($r1)){
                $json[]=$row;             
            }            
            $json_string =json_encode($json);//Covertimos los datos obtenidos en un JSON
            
        }

        
        
          
    }

    echo $json_string;  //Respondemos los datos obtenidos 

?>