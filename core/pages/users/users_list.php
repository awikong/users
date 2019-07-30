<?php
	
	//Если была нажата кнопка 'Удалить'
	if (isset($_POST['delete'])) {
		
		$id = key($_POST['delete']);
		
		mysqli_query($connection, "DELETE FROM `users` WHERE `id` = '{$id}'");
		
		header('Location: /');
		
	}
	
	// Сортировка пользователей
	$sort_name = 'ASC';
	$sort_date = 'DESC';
	
	if (isset($_GET['name'])) {
		
		if ($_GET['name'] == 'ASC') {
			
			$order_by		= 'ORDER BY `name` ASC';
			$sort_name	= 'DESC';
			
		} else {
			
			$order_by		= 'ORDER BY `name` DESC';
			$sort_name	= 'ASC';
			
		}
		
	} else if (isset($_GET['date'])) {
		
		if ($_GET['date'] == 'DESC') {

			$order_by		= 'ORDER BY `date` DESC';
			$sort_date	= 'ASC';
			
		} else {
			
			$order_by		= 'ORDER BY `date` ASC';
			$sort_date	= 'DESC';
			
		}
		
	} else {
		
		$order_by = 'ORDER BY `date` DESC';
		
	}
	
	
	//Функция выводящая список пользователей
	function users($connection, $order_by) {

		$users = mysqli_query($connection, "SELECT * FROM `users` {$order_by}");
		
		if ($users->num_rows != '0') {
			
			while($user = mysqli_fetch_assoc($users)) {
			
				$id 		= $user['id'];
				$name 	= $user['name'];
				$phone 	= $user['phone'];
				$email 	= $user['email'];
				$date 	= $user['date'];
				
				echo "
					<div class=\"user\">
					<span class=\"user_name\">{$name}</span>
					<span class=\"user_phone\">{$phone}</span>
					<span class=\"user_email\">{$email}</span>
					<span class=\"user_date\">{$date}</span>
					<form method=\"post\">
						<button type=\"submit\" name=\"delete[{$id}]\">
							<img src=\"template/images/delete.png\" alt=\"Удалить пользователя\">
						</button>
					</form>
					<a href=\"/edit?id={$id}\" class=\"user_edit\" title=\"Редактировать пользователя\">
						<img src=\"template/images/edit.png\" alt=\"Редактировать пользователя\">
					</a>
				</div>
				";
				
			}
			
		} else {
			
			echo "<div class=\"user_not\">Список пользователей пуст.</div>";
			
		}
		
	}

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>База пользователей</title>
		<?php require 'template/header.php'; ?>
	</head>
	<body>
		<?php require 'template/top_menu.php'; ?>
		<div class="width_960px">
			<div class="content">
				<div class="filter">
					<span>Фильтр:</span>
					<a href="/index.php?name=<?php echo $sort_name; ?>">По алфавиту</a>
					<a href="/index.php?date=<?php echo $sort_date; ?>">По дате регистрации</a>
				</div>
				<div class="panel">
					<span class="panel_name">Имя</span>
					<span class="panel_phone">Телефон</span>
					<span class="panel_email">E-Mail</span>
					<span class="panel_date">Дата регистрации</span>
				</div>
				<?php users($connection, $order_by); ?>
				<div style="clear: both;"></div>
			</div>
			<?php require 'template/footer.php'; ?>
		</div>
	</body>
</html>