<?php
include ('config.php');
?>
<?php
//добавление в базу
if ($_SERVER['REQUEST_METHOD']=='POST'){
if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['date'])){
$title = htmlspecialchars(trim($_POST['title']));
$text = htmlspecialchars(trim($_POST['text']));
$date = htmlspecialchars(trim($_POST['date']));
}
//запрос
$query="INSERT INTO articles(title,text,date) VALUES('".$title."','".$text."','".$date."')";
$output=mysqli_query($connection, $query);
//количество ответов на запрос
$result=mysqli_affected_rows($connection);
//mysqli_affected_rows() проверяет, сколько запросов было сделано
if ($result == 1) {
echo "Запись успешно добавлена";
} else {
echo "Запись не добавлена";
}
}
//вывод
$checkSQL=mysqli_query($connection, 'SELECT * FROM articles');
//удаление
if(!empty($_GET['id'])){
//удаляем запрос
$id = $_GET['id'];
$delete_sql = "DELETE FROM articles WHERE id='$id'";
$delete_value = mysqli_query($connection, $delete_sql);
if($delete_value){
echo "Строка удалена!";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
} else {
echo "Ошибка при удаление!";
}
}
?>
<?php
session_start();
if (isset($_SESSION['authentication'])) {
    header ('Location: login.php');
    exit ();
   }
 ?>
<html>
<head>
<title>Content</title>
<meta charset="utf-8">
</head>
<body>
<div style="height:300px;">
<form method="post" action="">
<div>
<label>Title</label>
<input type="text" name="title" required>
</div>
<div>
<label>Text</label>
<textarea type="text" name="text" rows="5" required></textarea>
</div>
<div>
<label>Date</label>
<input type="date" name="date" required>
</div>
<input type="submit" name="submit" value="SEND">

</form>
</div>
<form action = "logout.php" method="post">
	<input type="submit" value="Выйти" name="logout">
</form>
<br>
<?php
while($line = mysqli_fetch_array($checkSQL)){
echo '<div>
<h3>'.$line['title'].'</h3>
<p>'.$line['text'].'</p>
<p>'.$line['date'].'</p>
<button>
<a href="'.$_SERVER['PHP_SELF'].'?id='.$line["id"].'">
удалить</a>
</button>

<button>
<a href="edit.php?id='.$line["id"].'">Обновить</a>
</button>

<button>
<a href="view.php?id='.$line['id'].'">Просмотр</a>
</button>

</div>';
}
?>
</body>
</html>
