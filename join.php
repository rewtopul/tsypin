<?php
include 'config.php';
?>
<?php
$paring="SELECT goods.id, goods.title, clients_id, clients.name From goods JOIN clients ON goods.clients_id=clients.id";

$output = mysqli_query($connection, $paring);

while ($line = mysqli_fetch_assoc ($output)) {
	echo 'id товра:'.$line['id'].'<br>';
	echo 'Название товара:'.$line['title'].'<br>';
	echo 'id клиента:'.$line['clients_id'].'<br>';
	echo 'Имя клиента'.$line['name'].'<br><br>';
}

?>