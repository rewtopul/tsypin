<?php
include 'config.php';
?>
<?php
$paring="SELECT auto.id, auto.name,auto.year, auto.country, user_id, users.username From auto JOIN users ON auto.user_id=users.id";

$output = mysqli_query($connection, $paring);

while ($line = mysqli_fetch_assoc ($output)) {
	echo 'id товра:'.$line['id'].'<br>';
	echo 'Название мшины:'.$line['name'].'<br>';
	echo 'Год выпуска:'.$line['year'].'<br>';
	echo 'Страна производитель:'.$line['country'].'<br>';
	echo 'id клиента:'.$line['user_id'].'<br>';
	echo 'Имя клиента:'.$line['username'].'<br><br>';
}

?>