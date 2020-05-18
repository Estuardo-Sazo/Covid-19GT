<?php

        require 'Conexion.php';/// Incluinos la calse de conexion

        class DaoDatos extends Conexion
        {
            function __construct()
            {
                parent::__construct();
                
            }

            //Buscar la list de areas
            function ultiDato(){
                $res=$this->con->query("SELECT * FROM tbl_datos_diarios ORDER BY  dt_id DESC LIMIT 1 ");
                
                return $res;  
            }

            // Bucasr Mesas de las areas
            function visitas(){
                $res=$this->con->query("SELECT visitas FROM tbl_datos_generales WHERE  Id=1 ");
                
                return $res;  
            }
            // Bucasr Mesas de las areas
            function visitaAdd(){
                $res=$this->con->query("UPDATE tbl_datos_generales SET  visitas=visitas+1   WHERE  Id=1 ");
                
                return $res;  
            }
            // Bucasr Mesas de las areas
            function general(){
                $res=$this->con->query("SELECT * FROM tbl_datos_generales ");
                
                return $res;  
            }

            
        }
        
        
 ?>       
