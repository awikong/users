<?php

	//Объявляем массив с данными для подключения к базе данных.
	$config = array (
		'server'		=> 'localhost',
		'user'			=> '',
		'password'	=> '',
		'name'			=> 'awikong'
	);
	
	//Объявляем переменную с соединением с базой данных.
	$connection = mysqli_connect(
		$config['server'],
		$config['user'],
		$config['password'],
		$config['name']
	);
	
	//Если соединением неудачное, выводим ошибку.
	if ( $connection == false ) {
		echo mysqli_connect_error();
		exit;
	}
	
	//Устанавливаем кодировку базы данных UTF8.
	mysqli_set_charset($connection, 'UTF8');

?>