
<?php
	//require_once "php/conexion.php";
	require 'conexion.php'; 
	
	$conexion=conexion();
	$sql="SELECT value,recorder 
			from hello_sensor order by recorder";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[0];
		$valoresX[]=$ver[1];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

 ?>
<div id="graficaLineal"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter'
	};

	var data = [trace1];

	Plotly.newPlot('graficaLineal', data);
</script>