<?php
include("config.php");
?>
<?php
session_start();//
if (isset($_SESSION['authentication'])) {
    header ('Location: content.php');
    exit ();
}
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $salt='loremipsumdolorsitamet'; // добавляем соль
    $kryp = crypt($password, $salt);//Добовляем шифрование и подсаливаем
    $paring = "SELECT * FROM users WHERE username = '$username' AND password = '$kryp'";
    $output = mysqli_query ($connection, $paring);

    if (mysqli_num_rows ($output) ==1) {
        $_SESSION ['authentication'] = 'whatever';
    header('Location: content.php');
    }else {
    echo "не правильный логин или пароль";
    }
 }

?>



<html>
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <h1><strong>Вход</strong></h1>
    <link rel="stylesheet" href="style.css"> <!--форма для поключения CSS-->
</head>
<body>
    <form method = "post"> <!-- Метод для регистрации-->
        <div>
            <label>Имя пользователя</label>
            <input type = "text" name = "username" required>
        </div>
        <br>

        <div>
            <label>Пароль</label>
        <input type = "password" name = "password" required
        pattern = ".{6,12}" placeholder = "(6 - 12 символов)" required>
       </div>
       <br>
       <input type="submit" value="Вход">
       <a href="registration.php">Зарегистрираваться</a>
    
</form>

</body>
</html>