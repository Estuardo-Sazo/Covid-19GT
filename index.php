


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
    <h1 class="title1">COVID-19 GUATEMALA</h1>
    <p class="title3"><i class="fas fa-eye"></i> <span id="visitas"></span></p>
    <p class="title2">Datos más recientes</p>
    <p class="title3" ><span id="fecha"></span></p>
    <img src="include/img/3.png"  class="img-p">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <style>.bmc-button img{height: 34px !important;width: 35px !important;margin-bottom: 1px !important;box-shadow: none !important;border: none !important;vertical-align: middle !important;}.bmc-button{padding: 7px 15px 7px 10px !important;line-height: 35px !important;height:51px !important;text-decoration: none !important;display:inline-flex !important;color:#ffffff !important;background-color:#5F7FFF !important;border-radius: 5px !important;border: 1px solid transparent !important;padding: 7px 15px 7px 10px !important;font-size: 28px !important;letter-spacing:0.6px !important;box-shadow: 0px 1px 2px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5) !important;margin: 0 auto !important;font-family:'Cookie', cursive !important;-webkit-box-sizing: border-box !important;box-sizing: border-box !important;}.bmc-button:hover, .bmc-button:active, .bmc-button:focus {-webkit-box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5) !important;text-decoration: none !important;box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5) !important;opacity: 0.85 !important;color:#ffffff !important;}</style><link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet"><a class="bmc-button" target="_blank" href="https://www.buymeacoffee.com/EstuardoSazo"><img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="Invitame a un café"><span style="margin-left:5px;font-size:28px !important;">Invitame a un café</span></a>
        </div>
    </div>
        <div class="row">
            <div class=" col-6 mt-1">
                <div class="tarjeta">
                    <p class="nuevo-title">Casos Nuevos</p>
                    <div class=" nuevo-dato" id="nuevos"></div>
                    <div class="img-center text-center"> <img src="include/img/1.png"  class="img-dato"></div>
                </div>
            </div>
            <div class=" col-6 mt-1">
                <div class="tarjeta">
                <p class="recuperado-title" >Casos Recuperados</p>
                <div class=" recuperado-dato" id="recuperados"></div>
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
                <p class="prueba-title">Pruevas Realizadas</p>
                <div class=" prueba-dato" id="pruebas"></div>
                <div class="img-center text-center"> <img src="include/img/4.png"  class="img-dato"></div>
                </div>
            </div>
        </div>

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
        <div class="row  justify-content-center">
            <a class=" btn btn-lg btn-general" href="General.php">Ver datos generales</a>
        </div>

       <br>
            <p class="title2">Datos Estadísticos</p>
            <p class="title3 mt-2">Semana 2 Mayo 2020</p>
            <div id="cargaLineal"  style="width:100%;"></div>
      
       <p class="title2">™TecnoSazo © </p>
       <br>
       <br>
       

    </div>


    <script src="include/js/jquery.min.js"></script>
    <script src="include/js/bootstrap.min.js"></script>
    <script src="include/js/all.min.js"></script>
    <script src="include/js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var trace1 = {
        x: ['L:11', 'M:12', 'M:13','J:14', 'V:15','S:16','D:17'],
        y: [62, 85, 143,176,125,120,0],
        name: 'Nuevos',
        type: 'bar'
        };

        var trace2 = {
        x: ['L:11', 'M:12', 'M:13','J:14', 'V:15','S:16','D:17'],
        y: [0, 1, 2,0,1,3,0],
        name: 'Muertes',
        type: 'bar'
        };
        var trace3 = {
        x: ['L:11', 'M:12', 'M:13','J:14', 'V:15','S:16','D:17'],
        y: [1, 9, 1,8,6,3,0],
        name: 'Recuperados',
        type: 'bar'
        };

        var data = [trace1, trace2,trace3];

        var layout = {barmode: 'group'};

        Plotly.newPlot('cargaLineal', data, layout);   
       // $('#cargaLineal').load('main/graficaH.php');
        
    });
    </script>
</body>
</html>