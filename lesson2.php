<?php
include 'config.php';

//добовляем запрос
$query = 'SELECT * FROM tb_clients';
$output = mysqli_query($connection, $query);
echo mysqli_error($connection);

//Вывод
while ($line = mysqli_fetch_row($output)) {
	//var_dump($line);
	echo'<div style="padding-bottom: 10px;">';
	echo'<strong>Имя: </strong>'.$line[1].'<br>';
	echo'<strong>Э-почта: </strong>'.$line[2].'<br>';
	echo'<strong>Телефон: </strong>'.$line[3].'<br>';
	echo'</div>';
	

	}
mysqli_free_result($output);//прерывает запрос
mysqli_close($connection);//прерывает соединение с базой
?>
