<?php
$tipo=$_GET['tipo'];

if ($tipo == 0 ) { //Creacion de un xml para un consulta

$xml=new DomDocument('1.0','UTF-8');

$root=$xml->createElement('xmlPractica');
$xml->appendChild($root);

$tipo=$xml->createElement('tipo',0);
$root->appendChild($tipo);

$FechaInicio=$xml->createElement('FechaInicio',$_GET['FechaE']);
$root->appendChild($FechaInicio);

$FechaSalida=$xml->createElement('FechaSalida',$_GET['FechaS']);
$root->appendChild($FechaSalida);

$Hotel=$xml->createElement('Hotel',$_GET['hotel']);
$root->appendChild($Hotel);
$xmlsort=$xml ->saveXML();

$sxe = new SimpleXMLElement('http://localhost:8080/Motor/PruebaServlet?entrada='.$xmlsort, NULL, TRUE);
$dom=new DOMDocument;
$dom->loadXML($sxe->asXML());
$dom ->saveXML();
$dom->save('xmlConsulta.xml');


header("Location:pantallaConculta.php");
}else{ //Creacion del xml para una reserva

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
$cantidad=$xml->createElement('cliente',$_GET['cliente']);
$reserva->appendChild($cantidad);

//el control de cuantas personas pueden estar en una habitacion y si ha sobrepasado el limite lo hare en el motor 

$xmlsort=$xml ->saveXML();
//$xml->save('Reserva.xml');
    
//aqui enviamos el xml al motor de busqueda 

$sxe = new SimpleXMLElement('http://localhost:8080/Motor/PruebaServlet?entrada='.$xmlsort, NULL, TRUE);
$dom=new DOMDocument;
$dom->loadXML($sxe->asXML());
$dom ->saveXML();
$dom->save('Reserva.xml');

}


?>