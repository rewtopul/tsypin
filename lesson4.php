<?php
include 'config.php';
?>
<form method="get" action="">
Поиск <input type="text" name="search">
<input type="submit" value="Поиск...">
<select id="select" name="where">
<option>Name</option>
<option>Email</option>
<option>Phone</option>
</select>
</form>

<?php

if (!empty ($_GET['search'])) {
$search=$_GET ['search'];
$search=htmlspecialchars(trim ($search));

$fields=['Name'=>'Name', 'Email'=>'Email', 'Phone'=>'Phone'];
$field='Name';

if(array_key_exists($_GET['where'],$fields)) {
$field=$fields[$_GET['where']];
}

$query = "SELECT * FROM clients WHERE {$field} LIKE '%{$search}%'";
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
echo $line['Name'].' --- '.$line['Email'].' --- '.$line['Phone'].' <br> ';
echo '<br>';
}


mysqli_free_result($output);
mysqli_close($connection);

}

?>