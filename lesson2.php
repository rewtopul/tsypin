<?php
include 'config.php';

//запрос
$query='SELECT * FROM clients';
$output = mysqli_query($connection, $query);
echo mysqli_error($connection);

//вывод
while ($line= mysqli_fetch_row($output)){
//var_dump($line);
echo '<div style="padding-bottom:10px;">';
echo '<strong>Имя: </strong>'.$line[1].'<br>';
echo '<strong>E-mail: </strong>'.$line[2].'<br>';
echo '<strong>Телефон: </strong>'.$line[3].'<br>';
echo '</div>';
}
mysqli_free_result($output);
mysqli_close($connection);
?>
