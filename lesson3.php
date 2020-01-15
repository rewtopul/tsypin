<?php
include 'config.php';//соединение с нашей базой данных

?>

<form method="get" action="">
 Поиск<input type="text" name="search">
 <input type="submit" value="поиск...">
</form>

<?php

if (!empty ($_GET ['search'])) {//метод после ввода поиска, в последствие предлогает то что наберали в поиске.
	$search = $_GET ['search'];
	$search = htmlspecialchars(trim($search));//удалят разные символы,  ищет по БУКВЕ.
	//Запрос
	$query = 'SELECT * FROM tb_clients WHERE name LIKE "%'.$search.'%"';
	$output = mysqli_query($connection,$query);//функция выводит наш результат из запроса к базе данных
	$results = mysqli_num_rows($output);//Количество ответов на запрос
	echo 'Поиск по ключевому слову: '.$search. '<br>';
	echo 'Ответы:  <br>';
	//Количество найденныых ответов
		if ($results == 0) {
			echo"Ответов не найдено";
		}
		else {
			echo 'Найдено - '. $results.'ответов'.'<br>';
		}

	while ($line=mysqli_fetch_assoc($output)) {
		echo $line['name'].';  '.$line['e-mail'].';  '.$line['phone'].'<br> ';
		echo '<br>';
		
			}

	mysqli_free_result($output);//прерывает запрос(вычищает результат)
    mysqli_close($connection);//прерывает соединение с базой

}

?>

