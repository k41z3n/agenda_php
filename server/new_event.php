<?php
require('./conexion.php');
session_start();
// echo $_SESSION['user'] ;
if (isset($_SESSION['user'])) {
  $con = new ConectorBD();
  if ($con->initConexion('agenda')=="OK") {
	$titulo		= $_POST['titulo'];
	$start_date	= $_POST['start_date'];
	$end_date	= $_POST['end_date'];
	$start_hour	= $_POST['start_hour'];
	$end_hour	= $_POST['end_hour'];
	$allDay		= $_POST['allDay'];

    $data['titulo']			='"'.$titulo.'"';
    $data['fecha_inicio']	='"'.$start_date.'"';
    $data['fecha_fin']		='"'.$end_date.'"';
    $data['hora_inicio']	='"'.$start_hour.'"';
    $data['hora_fin']		='"'.$end_hour.'"';
    $data['user_id']		='"'.$_SESSION['user'].'"';

    if ( $allDay=="true") {
      $data['allDay'] = 1;
    }else {
      $data['allDay'] = 0;
    }

    if( $con->insertData('eventos',$data) ) {
      $response['msg'] ="OK";
    }else {
      $response['msg'] = "No se pudo añadir el registro";
    }
  }else {
    $response['msg'] = "No se ha podido establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No se ha iniciado sesión";
}
echo json_encode($response);
 ?>