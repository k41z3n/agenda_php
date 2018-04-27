<?php
require('./conexion.php');
session_start();
// echo $_SESSION['user'] ;
if (isset($_SESSION['user'])) {
  $con = new ConectorBD();
  $id = $_POST['id'];
  if ($con->initConexion('agenda')=="OK") {
    if ($con->eliminarRegistro('eventos', 'id='.$id)) {
      $response['msg'] ="OK";
    }else {
      $response['msg'] = "No se puede actualizar el registro";
    }
  }else {
    $response['msg'] = "Error al establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No ha iniciado sesión";
}
echo json_encode($response);
 ?>