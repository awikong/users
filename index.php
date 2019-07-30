<?php 

	//Подключаем скрипт соединения с базой данных.
	require 'core/config.php'; 

	//Удаляем из текущего URL первый симовл '/'.
	$url = substr($_SERVER['REQUEST_URI'], 1);
	
	//Удаляем из строки всё после знака '?'.
	$page_url = stristr($url, '?', TRUE);
	
	//Проверяем удалилось ли у нас что то после знака '?', если нет то продолжаем.
	if ($page_url == FALSE) {
		
		//Обновляем переменную.
		$page_url = $url;
		
	}
	
	//Ищем совпадение ссылки с разделом.
	switch ($page_url) {
		
		//Список пользователей
		case '':
		case 'index.php':
		case 'index.html':
		case 'index.htm':
		case 'index':
			require 'core/pages/users/users_list.php'; 
			break;
		
		//Добавить нового пользователя
		case 'add':
			require 'core/pages/users/users_add.php'; 
			break;
		
		//Редактировать пользователя
		case 'edit':
			require 'core/pages/users/users_edit.php'; 
			break;

		//Не существующая страница
		default:
			require 'core/pages/404.html'; 
			break;
				
	}
	
?>