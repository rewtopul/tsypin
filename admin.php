<html>
<head>
<title></title>
<h1><strong></strong></h1>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<form method="post">
<div>
<label></label>
<input type="text" name="username" required>
</div>
<div>
<label></label>
<input type="password" name="password"  pattern=".{6,12}" placeholder="(6 - 12 символов)"  required>
</div>
<div>
<label></label>
<input type="password" name="password2"  pattern=".{6,12}" placeholder="(6 - 12 символов)"  required>
</div>
<div>
<label></label>
<input type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required>
</div>
<div>
<label></label>
<input type="text" name="name">
</div>
<input type="submit" name="registration"
value="Регистрация">
</form>
</div>
</body>
</html>