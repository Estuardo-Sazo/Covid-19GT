<?php

    class conectar {
        private  $servidor="localhost";
        private  $usuario="id11615868_tecnosazo";
        private  $password="Tecnosazo";
        private  $db="id11615868_db_principal";
       /* private  $servidor="localhost";
        private  $usuario="root";
        private  $password="";
        private  $db="db_covid19";*/


        public function conexion()
        {
            $conexion=mysqli_connect($this->servidor,
                                     $this->usuario,
                                     $this->password,
                                     $this->db);

                 return $conexion;
        }
    }

    $obj=new conectar();

 /*  if($obj->conexion()){
        echo "Conexion correcta.";
    }else{
        echo "Conexion Erronea.";
    }*/


?>