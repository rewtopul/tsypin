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