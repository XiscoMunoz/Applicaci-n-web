<html>
<head>
</head>
<body>
<?php 
$tipo=$_GET['tipo'];
?>
<h1>Datos de reserva</h1>
<form action="ConfirmacionOta.php" method="get">
    Numero de personas:<input name="personas"><br>
    Cantidad de habitaciones:<input name="cant"><br>
    DNI del cliente:<input name="nombre"><br>
    <input  name="tipo" type="hidden" value=<?php echo $tipo ?>>
    <input  name="hotel" type="hidden" value=<?php echo $_GET['hotel']?> >
    <input  name="tipoHab" type="hidden" value=<?php echo $_GET['thab']?>>
    <input  name="fechaInicio" type="hidden" value=<?php echo $_GET['fechaInicio']?>>
    <input  name="fechaSalida" type="hidden" value=<?php echo $_GET['fechaSalida']?>>
    <input  name="precio" type="hidden" value=<?php echo $_GET['precio']?>>
    <input name="enviar" type="submit" ><br>
</form>
</body>
</html>
   