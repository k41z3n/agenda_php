<?php
	require('./conexion.php');
	$con = new ConectorBD();
  	if ($con->initConexion('agenda')=='OK') {
		$userArray = array(
			array('Lermit Tovar','123456','2000-03-12'),
			array('Lermit Pisano','456789','1999-12-03'),
			array('Lert admin','789123' ,'2015-05-24')
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