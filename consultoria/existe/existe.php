<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript">
		function validar()
		{
			var numero;
if(document.getElementById("elemento"))
	{
		//alert("si" );
		numero=1;
	}

	else
	{
	numero=0;
	//alert("no");
	
	}
	alert(numero);

		}

	</script>
</head>
<body>
<input type="text" name="" id="elemento">
<input type="text" value="escriba" name="" id="texto" onkeyup="validar()">

<input type="submit" name="" onclick="validar()">
</body>
</html>