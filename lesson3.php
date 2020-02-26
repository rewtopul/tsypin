<?php
include 'config.php';
?>
<form method="get" action="">
Поиск <input type="text" name="search">
<input type="submit" value="Поиск...">
</form>

<?php

if (!empty ($_GET['search'])) {
$search=$_GET ['search'];
$search=htmlspecialchars(trim ($search));
$query='SELECT * FROM clients WHERE name LIKE "%'.$search.'%"';
$output=mysqli_query($connection, $query);
$results=mysqli_num_rows($output);

echo '<strong>Поиск по: </strong>'.$search. '<br>';
echo '<strong>Ответы: </strong><br>';
if ($results == 0) {
echo "Ответов найдено!";
}
else {
echo "Найдено - ".$results.' ответов'.'<br>';
}

while ($line=mysqli_fetch_assoc($output)) {
echo $line['Name'].' --- '.$line['E-mail'].' --- '.$line['Phone'].' <br> ';
echo '<br>';
}


mysqli_free_result($output);
mysqli_close($connection);

}

?>
