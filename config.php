<?php
//вводим наши данные
$db_server='localhost';//название сервера
$db_database='bd_clients';//название нашей базы
$db_user='root';//при необходимости
$db_password='';// вводим пароли если нужно
//соединение с базой
$connection = mysqli_connect($db_server, $db_user, $db_password, $db_database);
mysqli_select_db($connection,"bd_clients");
//контроль соединения
if(!$connection) {
	die("Не удалось подключиться к базе данных");// если подключится появиться пустая страница
}
?>

