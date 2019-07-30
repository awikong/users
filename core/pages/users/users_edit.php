<?php
	
	// Получаем информацию о пользователе
	$id = $_GET['id'];
	
	$user = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '{$id}'"));
	
	$name 	= $user['name'];
	$phone 	= $user['phone'];
	$email 	= $user['email'];
	
	//Если была нажата кнопка 'Сохранить настройки'
	if (isset($_POST['save'])) {
		
		$name 	= $_POST['name'];
		$phone 	= $_POST['phone'];
		$email 	= $_POST['email'];
		
		mysqli_query($connection, "UPDATE `users` SET `name` = '{$name}', `phone` = '{$phone}', `email` = '{$email}' WHERE `id` = '{$id}'");
		
		$reply = "<div class=\"ryple\">Настройки пользователя успешно сохранены!<br /><a href=\"/\">Перейти к списку пользователей</a><div style=\"clear: both;\"></div></div>";
		
	}

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>База пользователей - Редактирование пользователя</title>
		<?php require 'template/header.php'; ?>
	</head>
	<body>
		<?php require 'template/top_menu.php'; ?>
		<div class="width_960px">
			<div class="content">
				<div class="content_header">
					Редактирование пользователя
				</div>
				<?php if (isset($reply)) { echo $reply; } ?>
				<div class="block_form_left">
					<div>Имя:</div>
					<div>Телефон:</div>
					<div>E-Mail:</div>
				</div>
				<form method="POST" class="block_form_right">
					<input type="text" name="name" placeholder="Введите имя" value="<?php echo $name; ?>" required />
					<input type="text" name="phone" placeholder="Введите телефон" value="<?php echo $phone; ?>" required />
					<input type="text" name="email" placeholder="Введите E-Mail" value="<?php echo $email; ?>" required />
					<div style="clear: both;"></div>
					<button type="submit" name="save">Сохранить настройки</button>
				</form>
				<div style="clear: both;"></div>
			</div>
			<?php require 'template/footer.php'; ?>
		</div>
	</body>
</html>