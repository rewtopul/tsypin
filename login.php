<?php
include ('config.php');
?>
<?php
session_start();
if (isset($_SESSION['authentication'])) {
header('Location: content.php');
exit();
}
if (!empty($_POST['username']) && !empty($_POST['password'])) {
$username = htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));
$salt='loremipsumdolorsitamet';
$kryp = crypt($password, $salt);
$paring = "SELECT * FROM users WHERE username = '$username' AND password = '$kryp'";
$output = mysqli_query ($connection, $paring);
if (mysqli_num_rows($output) ==1) {
$_SESSION['authentication'] = 'whatever';
header('Location: content.php');
} else {
echo "неправильный логин или пароль";
}
}
?>
<html>
<head>
<title>Вход</title>
<h1><strong>Вход</strong></h1>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<form method="post">
<div>
<label>Имя пользователя</label>
<input type="text" name="username" required>
</div>
<div>
<label>Пароль</label>
<input type="password" name="password"  pattern=".{6,12}" placeholder="(6 - 12 символов)"  required>
</div>

<input type="submit" name="registration"
value="Зарегистрироваться">
