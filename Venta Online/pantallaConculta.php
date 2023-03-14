<html>
<head>
</head>
<body>

<br><h1>HABITACIONES DISPONIBLES</h1>

<table class="default">
<tr>
    <th>Hotel</th>
    <th>Tipo de habitacion</th>
    <th>Cantidad</th>
</tr>
   <?php
	$estructuraxml= simplexml_load_file("xmlConsulta.xml");
    foreach($estructuraxml->consulta as $cons) {
        echo "<tr><td>".$estructuraxml->Hotel."</td>";
        echo "<td>".$cons->tipoHab."</td>";
        echo "<td>".$cons->cantidad."</td>";
        ?>
        <td><a href="pantallaReserva.php?hotel=<?php echo $cons->hotel?>&tipoHab=<?php echo $cons->tipoHab?>&cantidad=<?php echo $cons->cantidad?>&fechaInicio=<?php echo $estructuraxml->FechaInicio?>&fechaSalida=<?php echo $estructuraxml->FechaSalida?>"> Reservar</a></td></tr>
    <?php
    }	
   ?>
</table>	
</body>
</html>