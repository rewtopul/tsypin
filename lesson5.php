<?php
include 'config.php';
?>
<div style="height: 300px;">
<form method="post">
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

<?php
if ($_SERVER['REQUEST_METHOD'] =='POST') {  
if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['date'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $text = htmlspecialchars(trim($_POST['text']));
    $date = htmlspecialchars(trim($_POST['date']));
}
$query="INSERT INTO articles(title,text,date) VALUES('".$title."','".$text."','".$date."')";
$output=mysqli_query($connection, $query);
//количество ответов на за прос
$result=mysqli_affected_rows($connection);
// mysqli_affected_rows()--Проверяет сколько запросов было сделано
if ($result == 1) {
	echo "Запись успешно добавлена";
} else {
	echo "Запись не добавлена";
}

//Закрываем соединение
 mysqli_close ($connection);
 }
 ?>