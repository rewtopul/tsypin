<?php
include 'config.php';
?>
<?php
//просмотр
if(empty($_GET['id'])) {
die ('Цель не была выбрана!');
} else {
$id = $_GET['id'];
//запрос
$checkSQL=mysqli_query($connection, "SELECT * FROM articles WHERE id='$id'");
$sql = "SELECT * FROM articles WHERE id='$id'";
$output = mysqli_query($connection, $sql);
$line = mysqli_fetch_assoc($output);

}

while($line = mysqli_fetch_array($checkSQL)) {
echo '<div>
<h3>'.$line['title'].'</h3>
<p>'.$line['text'].'</p>
<p>'.$line['date'].'</p>
</div>';
}

?>

<a href="content.php">Назад</a>
