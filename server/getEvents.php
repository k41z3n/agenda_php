<?php
require('./conexion.php');
session_start();
// echo $_SESSION['user'] ;
if (isset($_SESSION['user'])) {
  $con = new ConectorBD();
  if ($con->initConexion('agenda')=="OK") {
    $resultado = $con->consultar(['eventos'], ['*'], 'WHERE user_id ="'.$_SESSION['user'].'"');
    if ($resultado) {
      $i=0;
      while ($fila = $resultado->fetch_assoc()) {
        $response['eventos'][$i]['id']=$fila['id'];
        $response['eventos'][$i]['titulo']=$fila['titulo'];
        if ($fila['allDay']==1) {
          $response['eventos'][$i]['allDay']=true;
          $response['eventos'][$i]['start']=$fila['fecha_inicio'];
          $response['eventos'][$i]['end']=$fila['fecha_fin'];
        }else {
          $response['eventos'][$i]['allDay']=false;
          $response['eventos'][$i]['start']=$fila['fecha_inicio']." ".$fila['hora_inicio'];
          $response['eventos'][$i]['end']=$fila['fecha_fin']." ".$fila['hora_fin'];
        }
        $i++;
      }
      $response['msg'] = "OK";
    }
  }else {
    $response['msg'] = "Error al establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No ha iniciado sesión";
}
echo json_encode($response);
?>