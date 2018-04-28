<?php
	require('./conexion.php');
	$con = new ConectorBD();
  	if ($con->initConexion('agenda')=='OK') {
		$userArray = array(
			array('Lermit Tovar','1234','2000-03-12'),
			array('Tovar Lermit','1234','1999-12-03'),
			array('admin','1234' ,'2015-05-24')
		);
		foreach ($userArray as $item) { 
			$hash = password_hash( '"'.$item[1].'"', PASSWORD_DEFAULT);
			$data['user']= '"'.strtolower( str_replace(' ', '', $item[0])).'@gmail.com"';
			$data['password']= '"'.$hash.'"';
			$data['name']= '"'.$item[0].'"';
			$data['birthday']= '"'.$item[2].'"';
			$con->insertData('usuarios', $data);
		}
	}
	$con->cerrarConexion();
?>