<?php

$hotel=$_GET['Hotel'];
$FechaE=$_GET['FechaE'];
$FechaS=$_GET['FechaS'];
$Personas=$_GET['Personas'];
$Cantidad=$_GET['Cantidad'];
$Precio=$_GET['Precio'];
$tipoHab=$_GET['tipoHab'];
    
include "ConectarOta.php";   

$cons="INSERT into descuentos (hotel,tipoHab,personas,precio,cantidad,fechaEntrada,fechaSalida) VALUES ('".$hotel."','".$tipoHab."','".$Personas."','".$Precio."','".$Cantidad."','".$FechaE."','".$FechaS."')";
$resultat=mysqli_query($con,$cons);
?>