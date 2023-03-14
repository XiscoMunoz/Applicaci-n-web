<html>
<head>
</head>
<body>
<?php

    $condicion=$_GET['Enviar'];
    $contraseña=$_GET['password'];
    $nombre=$_GET['Usuario'];
    
    include "ConectarOta.php";
    
    if($condicion == 1){//Usuario existente

    $cons="SELECT * FROM usuario WHERE nombre='".$nombre."'";
   
  	$resultat=mysqli_query($con,$cons);
    
      if(mysqli_num_rows($resultat)>0){//Mira si existe el nombre

        $reg= mysqli_fetch_array($resultat);
        
        if($reg[1]==$contraseña){//Mira si coincide la contraseña
            header("Location:MenuChannel.html");
        }else{
            header("Location:Login.html");
        } 
      }else{
   
        header("Location:Login.html");
      } 
    }
    else{//Nuevo usuario
      $cons="Insert into usuario(nombre,password) values('".$nombre."','".$contraseña."')";
  	  $resultat=mysqli_query($con,$cons); 
      header("Location:MenuChannel.html");
    }
    
?>
   

</body>
</html>
