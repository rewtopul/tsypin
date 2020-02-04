<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <form method = "post">
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
    <div>
        <label>Пароль ещё раз</label>
        <input type = "password" name = "password2" required
        pattern = ".{6,12}" placeholder = "(6 - 12 символов)" required>
    </div>
    <br>

    <div>
        <label>Email</label>
        <input type="email" name="email"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
    </div>
    <input type = "submit" name="registration"
    value = "Регистрация">
</form>

</body>
</html>