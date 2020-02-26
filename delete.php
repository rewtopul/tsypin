<?php
include 'config.php';

$checkSQL=mysqli_query($connection, 'SELECT * FROM articles')
?>
<?php
while($line = mysqli_fetch_array($checkSQL)) {
echo '<div>
<h3>'.$line['title'].'</h3>
<p>'.$line['text'].'</p>
<p>'.$line['date'].'</p>
<button>
<a href="'.$_SERVER['PHP_SELF'].'?id='.$line["id"].'">
Удалить</a>
</button>
</div>';
}

if(!empty($_GET['id'])) {
$id = $_GET['id'];
$delete_sql = "DELETE FROM articles WHERE id='$id'";
$delete_value = mysqli_query($connection, $delete_sql);
if($delete_value) {
echo "Строка удалена!";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.
$_SERVER['PHP_SELF'].'">';
} else {
echo "Ошибка при удаление!";
}
}
?>


EDIT

<?php
include 'config.php';
?>
<?php
//проверка
if (empty($_GET['id'])) {
die('Цель не была выбрана!');
} else {
$id = $_GET['id'];
//запрос
$request="SELECT * FROM articles WHERE id='$id'";
$output=mysqli_query($connection, $request);
$line=mysqli_fetch_assoc($output);
}
//редактировать запрос
if (!empty($_POST['title'])) {
$title=htmlspecialchars(trim($_POST['title']));
$text=htmlspecialchars(trim($_POST['text']));
$date=htmlspecialchars(trim($_POST['date']));
$edit="UPDATE articles
SET title='".$title."',
text='$text',
date='$date'
WHERE id='$id'";
$edit_db=mysqli_query($connection, $edit);
if($edit_db) {
echo "успешно отредактировано, перенаправление <a href=\"content.php\"> назад </a>";
die();
} else {
echo "какая-то ерунда";
}

}


?>
<div style="height:300px;">
<form method="post">
<div>
<label>Title</label>
<textarea type="text" name="title" required>
<?php echo $line['title'];?></textarea>
</div>
<div>
<label>Text</label>
<textarea type="text" name="text" required>
<?php echo $line['text'];?></textarea>
</div>
<div>
<label>Date</label>
<input type="date" name="date"
value="<?php echo $line['date'];?>" required>
</div>
<input type="submit" name="submit" value="Редактировать">
</form>
</div>