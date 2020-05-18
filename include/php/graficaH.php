
<?php
    require "conexionDB.php";
    $query="SELECT * FROM tabla_humedad_s  ORDER BY Id_humedad DESC LIMIT 10";
    $resul= mysqli_query($connection,$query);

    $valorY=array();
    $valorX=array();
    while($row=mysqli_fetch_row($resul)){
            $valorY[]=$row[1];
            $valorX[]=$row[2];
    }
    $datosX=json_encode($valorX);
    $datosY=json_encode($valorY);
?>


<div id="grafica-lineal">
        
</div>

<script type="text/javascript">
function CrearLinea(json){
    var parsed= JSON.parse(json);
    var arr=[];
    for(var x in parsed){
        arr.push(parsed[x]);
    }
    return arr;
}
</script>
<script type="text/javascript">
    datosX=CrearLinea('<?php echo $datosX ?>');
    datosY=CrearLinea('<?php echo $datosY ?>');

var trace1 = {
  x: datosX,
  y: datosY,
  type: 'scatter'
};



var data = [trace1];

Plotly.newPlot('grafica-lineal', data);
</script>