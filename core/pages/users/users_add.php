<?php
	
	//Если была нажата кнопка 'Добавить пользователя'
	if (isset($_POST['add'])) {
		
		$name 	= $_POST['name'];
		$phone 	= $_POST['phone'];
		$email 	= $_POST['email'];
		
		mysqli_query($connection, "INSERT INTO `users` (`name`, `phone`, `email`, `date`) VALUES ('{$name}', '{$phone}', '{$email}', now())");
		
		header('Location: /');
		
	}

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>База пользователей - Добавление пользователя</title>
		<?php require 'template/header.php'; ?>
	</head>
	<body>
		<?php require 'template/top_menu.php'; ?>
		<div class="width_960px">
			<div class="content">
				<div class="content_header">
					Добавление пользователя
				</div>
				<div class="block_form_left">
					<div>Имя:</div>
					<div>Телефон:</div>
					<div>E-Mail:</div>
				</div>
				<form method="POST" class="block_form_right">
					<input type="text" name="name" placeholder="Введите имя" required />
					<input type="text" name="phone" placeholder="Введите телефон" required />
					<input type="text" name="email" placeholder="Введите E-Mail" required />
					<div style="clear: both;"></div>
					<button type="submit" name="add">Добавить пользователя</button>
				</form>
				<div style="clear: both;"></div>
			</div>
			<?php require 'template/footer.php'; ?>
		</div>
	</body>
</html>