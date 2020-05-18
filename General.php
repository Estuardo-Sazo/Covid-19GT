


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/css/estilos.css">
    <link rel="stylesheet" href="include/css/all.css">
    <script src="include/js/plotly-latest.min.js" ></script> 
    <title>TecnoSazo</title>
</head>
<body>
    <div class="container">
    <div class="row justify-content-start mt-2">
            <a class=" btn btn-general" href="index.php"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    <h1 class="title1">COVID-19 GUATEMALA</h1>
    <p class="title3"><i class="fas fa-eye"></i> <span id="visitas"></span></p>
    <p class="title3 mt-2">Te gustaria apoyarnos para poder seguir mejorando nuestro servicio y tener mejor calidad.</p>
        <p class="title3 mt-2">Agradeceremos mucho tu apoyo y donación</p>
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="YZ5FUVYC6KUYA" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_GT/i/scr/pixel.gif" width="1" height="1" />
                </form>

            </div>
        </div>
    <p class="title2">Datos Generales</p>
    
    <img src="include/img/3.png"  class="img-p">
        <div class="row">
            <div class=" col-6 mt-1">
                <div class="tarjeta">
                    <p class="nuevo-title">Casos Activos</p>
                    <div class=" nuevo-dato" id="activos"></div>
                    <div class="img-center text-center"> <img src="include/img/1.png"  class="img-dato"></div>
                </div>
            </div>
            <div class=" col-6 mt-1">
                <div class="tarjeta">
                <p class="recuperado-title" >Casos Recuperados</p>
                <div class=" recuperado-dato" id="curados"></div>
                <div class="img-center text-center"> <img src="include/img/2.png"  class="img-dato"></div>
                </div>
            </div>
            <div class=" col-6 mt-1">
                <div class="tarjeta">
                <p class="fallecido-title">Casos Facellidos</p>
                <div class=" fallecido-dato" id="muertes"></div>
                <div class="img-center text-center"> <img src="include/img/5.png"  class="img-dato"></div>
                </div>
            </div>
            <div class=" col-6 mt-1">
                <div class="tarjeta">
                <p class="prueba-title">Casos Totales</p>
                <div class=" prueba-dato" id="total"></div>
                <div class="img-center text-center"> <img src="include/img/4.png"  class="img-dato"></div>
                </div>
            </div>
        </div>
        
        
        
        

       <br>
            
      
       <p class="title2">™TecnoSazo © </p>
       <br>
       <br>
       

    </div>


    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.min.js"></script>
    <script src="include/js/all.min.js"></script>
    <script src="include/js/main2.js"></script>
    <script type="text/javascript">
    
</body>
</html>