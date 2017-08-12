<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

    <script type="text/javascript">
    	function AfechaInicio()
    	{

			//obteniendo el valor del date inicial	
			var inicio=document.getElementById("txtFechaInicial").value;
			
			//recuperando el id del date del producto
			var producto1 = document.getElementById("fechaProducto");
			var producto2 = document.getElementById("fechaProducto2");

			//asignando valores
			producto1.setAttribute("min", inicio);
			producto2.setAttribute("min", inicio);


    	}

    	function AfechaFin()
    	{
			//recuperando el valor del date final
			var fin=document.getElementById("txtFechaFinal").value;
			
			//recuperando el id del date del producto
			var producto1 = document.getElementById("fechaProducto");
			var producto2 = document.getElementById("fechaProducto2");

			//asignando valores
			producto1.setAttribute("max", fin);
			producto2.setAttribute("max", fin);

      
    	}
    </script>
</head>
<body>
<table align="center">
	<tr>
		<td>Inicio Consultoria:</td>
		<td>
		<input type="date" name="cumpleanios" step="1" id="txtFechaInicial" oninput="AfechaInicio()">
		</td>
	</tr>

	<tr>
		<td>Fin Consultoria:</td>
		<td>
		<input type="date" name="cumpleanios" step="1" id="txtFechaFinal" oninput="AfechaFin()">
		</td>
	</tr>

<tr>
		<td>Producto: 1</td>
		<td>
		<input type="date" id="fechaProducto">
		</td>
	</tr>

	<tr>
		<td>Producto: 2</td>
		<td>
		<input type="date" id="fechaProducto2">
		</td>
	</tr>

	<tr>
		<td>Inicio</td>
		<td>
		<input type="text" name="txtPruebaInicio" id="txtPruebaInicio">
		</td>
	</tr>

	<tr>
		<td>Final</td>
		<td>
		<input type="text" name="txtPruebaFin" id="txtPruebaFin">
		</td>
	</tr>
</table>

<br>
<br>
<center>
<input type="submit" name="" onclick="AfechaInicio()">
</center>
<br>
<br>
<center>
<input type="text" name="" onkeyup="AfechaInicio()">
</center>
</body>
</html>