<?php

  require('conexion.php');
  
  $con = new ConectorBD();

  if ($con->initConexion('agenda')=='OK') {

    echo "conection ✔️ <br>";
    $item = '8';
    // $result = $con->consultar(['usuarios'], ['user','password'], 'WHERE user="'.$user.'"');
    if (  $resultado = $con->consultar(['eventos'], ['*'], 'WHERE id='.$item )  ) {
      echo "Se consultaron los registros exitosamente ✔️<br>";
      while ( $fila = $resultado->fetch_assoc() ) {
       echo "👉🏽 ".$fila['id']." | " .$fila['titulo']." | ".$fila['fecha_inicio']." | ".$fila['fecha_fin']." | ".$fila['user_id']."<br>";
      }
    }else{
    	echo " ❌ Hubo un problema y los registros no fueron consultados";
    }

  }else {
    echo " ❌ Se presentó un error en la conexión";
  }




 ?>
