<?php
require('./conexion.php');
session_start();
// echo $_SESSION['user'] ;

if (isset($_SESSION['user'])) {
  $con = new ConectorBD();
  if ($con->initConexion('agenda')=="OK") {
  	
	$id 		= $_POST['id'];
	$start_date = $_POST['start_date'];
	$start_hour = $_POST['start_hour'];

	$end_date 	= $_POST['end_date'];
	$end_hour 	= $_POST['end_hour'];

    if( $start_date != ''){
    	$data['fecha_inicio']	= '"'.$start_date.'"';
    }

    if( $end_date != ''){
    	$data['fecha_fin']	= '"'.$end_date.'"';
    }

    if ( $con->actualizarRegistro('eventos',$data ,'id='.$id) ) {
      $response['msg']= "OK";
    }else {
      $response['msg']= "No se puede actualizar el registro ❌";
    }
  }else {
    $response['msg'] = "Error al establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No ha iniciado sesión";
}
echo json_encode($response);
