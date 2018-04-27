<?php
	require('./conexion.php');
	$con = new ConectorBD();
	if ($con->initConexion('agenda')=='OK') {
		$user = $_POST['username'];
		// $user = 'lermittovar@gmail.com';
		$pass = $_POST['password'];
		// $pass = '123456';

		$response['msg']="conecto";

		$result = $con->consultar(['usuarios'], ['user','password'], 'WHERE user="'.$user.'"');

		// if ($result->num_rows == 1 && password_verify($pass, $result->fetch_assoc()['password'])) {
		if ($result->num_rows == 1 ) {
			session_start();
			$_SESSION['user']=$user;
			$response['msg']="OK";
		}else{
			$response['msg']="BAD";
		}

	}else {
	  $response['msg'] = "No se ha podido conectar con la base de datos";
	}

	$con->cerrarConexion();
	echo json_encode($response);
 ?>
