<html>
<head>
</head>
<body>
<?php 

$FechaE=$_GET['FechaE'];
$FechaS=$_GET['FechaS'];
$Cantidad=$_GET['Cantidad'];

$url="http://webdocjaume.000webhostapp.com/ssthotel.php?accio=1&agencia=OTAXisco&pax=".$Cantidad."&ent=".$FechaE."&sal=".$FechaS;
$resultad=simplexml_load_file($url);
$xml=$resultad->saveXML();
$parser=new SimpleXMLElement($xml);


$xml=new DomDocument('1.0','UTF-8');

$root=$xml->createElement('xmlPractica');
$xml->appendChild($root);

$tipo=$xml->createElement('tipo',2);
$root->appendChild($tipo);

$FechaInicio=$xml->createElement('FechaInicio',$_GET['FechaE']);
$root->appendChild($FechaInicio);

$FechaSalida=$xml->createElement('FechaSalida',$_GET['FechaS']);
$root->appendChild($FechaSalida);

$personas=$xml->createElement('personas',$_GET['Cantidad']);
$root->appendChild($personas);
$xmlsort=$xml ->saveXML();


$sxe = new SimpleXMLElement('http://localhost:8080/Motor/PruebaServlet?entrada='.$xmlsort, NULL, TRUE);
$dom=new DOMDocument;
$dom->loadXML($sxe->asXML());
$dom ->saveXML();
$dom->save('Consulta.xml');

$estructuraxml= simplexml_load_file("Consulta.xml"); // Esto en un futuro se ira y sera la llamada del motor

include "ConectarOta.php";
$sql="SELECT hotel,tipoHab,precio,cantidad FROM descuentos where personas ='".$Cantidad."' and fechaEntrada >='".$FechaE."' and fechaSalida <='".$FechaS."'" ;

$resultado=mysqli_query($con,$sql);

?>
<br><h1>HABITACIONES DISPONIBLES</h1>

<table class="default">
<tr>
    <th>Hotel</th>
    <th>Cantidad</th>
    <th>Tipo de habitacion</th>
    <th>Precio</th>
</tr>
   <?php
   
    foreach($parser->result->availibility as $cons) { //OPCION 1 ES LA OPCION DE JAUM
        echo "<tr><td> Juame </td>"; 
        echo "<td>".$cons->quantity."</td>";
        echo "<td>".$cons->type."</td>";
        echo "<td>".$cons->rate."</td>";
        ?>
        <td><a href="ResrvaOta.php?tipo=1&hotel=Jaume&cantidad=<?php echo $cons->quantity?>&thab=<?php echo $cons->type?>&precio=<?php echo $cons->rate?>&fechaInicio=<?php echo $FechaE?>&fechaSalida=<?php echo $FechaS?>""><input type="button" value="reservar"></a></td></tr>
        <?php
    }

  	while ($reg= mysqli_fetch_array($resultado)) {//OPCION 2 ES LA DEL CHANNEL
   	    echo "<tr><td>Channel - ".$reg['hotel']."</td>";
	    echo "<td>".$reg['cantidad']."</td>";
        echo "<td>".$reg['tipoHab']."</td>";
	    echo "<td>".$reg['precio']."</td>";
        ?>
        <td><a href="ResrvaOta.php?tipo=2&hotel=<?php echo $reg['hotel']?>&cantidad=<?php echo $reg['cantidad']?>&thab=<?php echo $reg['tipoHab']?>&precio=<?php echo $reg['precio']?>&fechaInicio=<?php echo $FechaE?>&fechaSalida=<?php echo $FechaS?>""><input type="button" value="reservar"></a></td></tr>
        <?php
	 }

     foreach($estructuraxml->consulta as $cons) {//OPCION 3 ES LA DEL MOTOR
        echo "<tr><td> Motor - ".$cons->hotel."</td>";
        echo "<td>".$cons->cantidad."</td>";
        echo "<td>".$cons->tipoHab."</td>";
        echo "<td>".$cons->precio."</td>";
        ?>
       <td><a href="ResrvaOta.php?tipo=3&hotel=<?php echo $cons->hotel?>&cantidad=<?php echo $cons->cantidad?>&thab=<?php echo $cons->tipoHab?>&precio=<?php echo $cons->precio?>&fechaInicio=<?php echo $FechaE?>&fechaSalida=<?php echo $FechaS?>"><input type="button" value="reservar"></a></td></tr>
       <?php
    }	

   ?>
</table>	
</body>
</html>





