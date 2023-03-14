<html>
<body>
    <br><h1>Reserva</h1><br>
    <form action= "creacionXML.php" method="get">
        Numero de personas:<input name="personas"><br>
        Cantidad de habitaciones:<input name="cant"><br>
        DNI cliente:<input name="cliente"><br>
        <input  name="tipo" type="hidden" value='1'>
        <input  name="hotel" type="hidden" value=<?php echo $_GET['hotel']?> >
        <input  name="tipoHab" type="hidden" value=<?php echo $_GET['tipoHab']?>>
        <input  name="fechaInicio" type="hidden" value=<?php echo $_GET['fechaInicio']?>>
        <input  name="fechaSalida" type="hidden" value=<?php echo $_GET['fechaSalida']?>>
        <input name="enviar" type="submit" ><br>
    </form>

</body>
</html>