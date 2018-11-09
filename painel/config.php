<?php
	require 'environment.php';
	define("BASE_URL","http://localhost:8080/LojaVirtual/painel");
	global $config;

	$config =array();
	if(ENVIRONMENT == 'development'){

		$config['dbname'] = 'loja';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'Loop';
		$config['dbpass'] = 'programar';
	}else{

		$config['dbname'] = 'loja';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}

	$config['status_pgto'] = array(
		'1' => 'Aguardando Pgto.',
		'2' => 'Aprovado.',
		'3' => 'Cancelado.'
		
	);



?>