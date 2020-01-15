<?php
date_default_timezone_set('Europe/Tallinn');
$fname='Sergey';
$sname='Tsypin';
$course='SKTVRp19';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Мой первый PHP</title>
</head>
<body>
	<h1>Первый PHP</h1>
    <p>
      <?php
          echo 'Имя: '.$fname. '<br>'. 'Фамилия: '.$sname.'<br>'. 'Группа: '.$course.'<br>';//Выводим в браузер
          echo date('d.m.Y  G:i:s');//Выводим дату и время:  Y четырёх значное число года, G:i- 24 часа и минуты
      ?>
    </p> 
	  <?php
	   function hello($fname='Sergey', $sname='Tsypin' ){
	   	return "Hello $fname, $sname !!!";
	   }
	   echo hello();

	  ?>
</body>
</html>