<html>
<head>
</head>
<body>
<?php 

$tipo=$_GET['tipo'];

if ($tipo == 1) {//opcion de jaume

$url="https://webdocjaume.000webhostapp.com/ssthotel.php?accio=2&tipohab=".$_GET['tipoHab']."&agencia=OTAXisco&pax=".$_GET['personas']."&ent=".$_GET['fechaInicio']."&sal=".$_GET['fechaSalida']."&dadesclient=".$_GET['nombre']."&tarifa=".$_GET['precio']."";
$resultad=simplexml_load_file($url);
$xml=$resultad->saveXML();
$parser=new SimpleXMLElement($xml);

include "ConectarOta.php";

$sql="insert into ventas()values()";
$resultado=mysqli_query($con,$sql);

$sql="Select COUNT(id) as cantidad From ventas";
$resultado=mysqli_query($con,$sql);
$reg= mysqli_fetch_array($resultado);
$id=intval($reg['cantidad']);

$sql="INSERT INTO ventasota(idVenta,hotel,tipoHab,precio,cantidad,personas,fechaEntradA, fechaSalida,idOta) VALUES (".$id.",'".$_GET['hotel']."','".$_GET['tipoHab']."',".$_GET['precio'].",".$_GET['cant'].",".$_GET['personas'].",'".$_GET['fechaInicio']."','".$_GET['fechaSalida']."',".$parser->reservation->resnumber.")";
echo $sql;
$resultado=mysqli_query($con,$sql);   
} 
if ($tipo == 2) {//opcion del channel

    include "ConectarOta.php";

    $sql="insert into ventas()values()";
    $resultado=mysqli_query($con,$sql);

    $sql="Select COUNT(id) as cantidad From ventas";
    $resultado=mysqli_query($con,$sql);
    $reg= mysqli_fetch_array($resultado);
    $id=intval($reg['cantidad']);

    $sql="INSERT INTO ventaschannel(idVenta,hotel,tipoHab,precio,cantidad,personas,fechaEntradA,fechaSalida,idChannel) VALUES (".$id.",'".$_GET['hotel']."','".$_GET['tipoHab']."',".$_GET['precio'].",".$_GET['cant'].",".$_GET['personas'].",'".$_GET['fechaInicio']."','".$_GET['fechaSalida']."',".$id.")";
    echo $sql;
    $resultado=mysqli_query($con,$sql);
    
} 
if ($tipo == 3) {//opcion del motor

$xml=new DomDocument('1.0','UTF-8');

$root=$xml->createElement('xmlPractica');
$xml->appendChild($root);

$tipo=$xml->createElement('tipo',1);
$root->appendChild($tipo);

$FechaInicio=$xml->createElement('FechaInicio',$_GET['fechaInicio']);
$root->appendChild($FechaInicio);

$FechaSalida=$xml->createElement('FechaSalida',$_GET['fechaSalida']);
$root->appendChild($FechaSalida);

if(strcmp($_GET['hotel'], "Hotel1") ==0){
    $Hotel=$xml->createElement('Hotel',1);
    $root->appendChild($Hotel);
}
if(strcmp($_GET['hotel'], "Hotel2") ==0){
    $Hotel=$xml->createElement('Hotel',2);
    $root->appendChild($Hotel);
}
if(strcmp($_GET['hotel'], "Hotel3") ==0){
    $Hotel=$xml->createElement('Hotel',3);
    $root->appendChild($Hotel);
}

$reserva=$xml->createElement('reserva');
$root->appendChild($reserva);

$adultos=$xml->createElement('cantPersonas',$_GET['personas']);
$reserva->appendChild($adultos);

$TipoHab=$xml->createElement('TipoHab',$_GET['tipoHab']);
$reserva->appendChild($TipoHab);

$cantidad=$xml->createElement('cantidad',$_GET['cant']);
$reserva->appendChild($cantidad);
$cantidad=$xml->createElement('cliente',$_GET['nombre']);
$reserva->appendChild($cantidad);



$xmlsort=$xml ->saveXML();

$sxe = new SimpleXMLElement('http://localhost:8080/Motor/PruebaServlet?entrada='.$xmlsort, NULL, TRUE);
$dom=new DOMDocument;
$dom->loadXML($sxe->asXML());
$dom ->saveXML();
$dom->save('Reserva.xml');

include "ConectarOta.php";

$sql="insert into ventas()values()";
$resultado=mysqli_query($con,$sql);

$sql="Select COUNT(id) as cantidad From ventas";
$resultado=mysqli_query($con,$sql);
$reg= mysqli_fetch_array($resultado);
$id=intval($reg['cantidad']);

$sql="INSERT INTO ventasota(idVenta,hotel,tipoHab,precio,cantidad,personas,fechaEntradA,fechaSalida,idOta) VALUES (".$id.",'".$_GET['hotel']."','".$_GET['tipoHab']."',".$_GET['precio'].",".$_GET['cant'].",".$_GET['personas'].",'".$_GET['fechaInicio']."','".$_GET['fechaSalida']."',".$id.")";
echo $sql;
$resultado=mysqli_query($con,$sql);
}
?>
</body>
</html>
   