<?php
include 'config.php';
 ?>
 <?php
 //Проверка
 if(empty($_GET['id'])) {
 	die ('Цель не была выбрана!');
 } else {
 	$id = $_GET['id'];
 // Запрос
    $request="SELECT * FROM articles WHERE id='$id'";
    $output = mysqli_query($connection, $request);
    $sline = mysqli_fetch_assoc($output);
 // Редактировать запрос
    if (!empty($_POST['title'])) {
    	$title = htmlspecialchars(trim($_POST['title']));
    	$text = htmlspecialchars(trim($_POST['text']));
    	$date = htmlspecialchars(trim($_POST['date']));
    }
 }

 ?>


 while ($line=mysqli_fetch_array($checkSQL)) {
 echo'<div>
 <h3>'.$line['title'].'</h3>
 <p>'.$line['text'].'</p>
 <p>'.$line['date'].'</p>
 <button>
 <a href="edit.php?id='.$line["id"].'">обновить</a>
 </button>
 </div>';
 }
 ?>
 
<form method="post">
<div>
<label>Title</label>
<input type="text" name="title"
value="<?php echo $line['title'];?>"requeed>
</div>
<div>
<label>Text</label>
<input type="text" name="text" rows="5"
value="<?php echo $line['text'];?>"requeed>
</div>
<div>
<label>Date</label>
<input type="date" name="date"
value="<?php echo $line['date'];?>"requeed>
</div>
<div><button type= "submit" value="edit">редактировать</button></div>


</form>
</div>
</body>
</html>