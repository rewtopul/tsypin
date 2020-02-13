<?php
include("config.php");
?>
<?php
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['name'])) {
$username = htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));
$password2 = htmlspecialchars(trim($_POST['password2']));
$email = htmlspecialchars(trim($_POST['email']));
$name = htmlspecialchars(trim($_POST['name']));
//проверяем длинну пароля
if (strlen($password) < 6) {
echo "Пароль должен быть не менее 6 символов";
} else {
	if ($password != $password2) {
		echo "Пароли не совпадают";
	}else{ 
$salt='loremipsumdolorsitamet'; // добавляем соль
$kryp = crypt($password, $salt);//Добовляем шифрование и подсаливаем
$output=mysqli_query($connection, "SELECT * FROM users WHERE username = '{$username}'");
if (mysqli_num_rows($output) > 0) {
echo "такой логин уже есть!";
}else{
$paring="INSERT INTO users SET username='$username', password='$kryp', email='$email', name='$name'";
$output=mysqli_query($connection, $paring);
if (mysqli_affected_rows($connection)==1) {
header('Location: login.php?msg=ok');
}else{
echo "неправильный логин или пароль";
    }
   }
  }
  }
}
?>

<html>
<head>
<title>Регистрация</title>
<h1><strong>Регистраци</strong></h1>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<form method="post">
<div>
<label>Имя пользователя</label>
<input type="text" name="username" required>
</div>
<br>
<div>
<label>Пароль</label>
<input type="password" name="password"  pattern=".{6,12}" placeholder="(6 - 12 символов)"  required>
</div>
<br>
<div>
<label>Пароль еще раз</label>
<input type="password" name="password2"  pattern=".{6,12}" placeholder="(6 - 12 символов)"  required>
</div>
<br>
<div>
<label>Email</label>
<input type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required>
</div>
<br>
<div>
<label>Имя и Фамилия</label>
<input type="text" name="name">
</div>
<br>
<input type="submit" name="registration"
value="Регистрация">
</form>
</div>
</body>
</html>