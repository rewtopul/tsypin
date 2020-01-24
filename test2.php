<?php
include 'config.php';
 $checkSQL=mysqli_query($connection, 'SELECT * FROM articles');
 ?>

 <?php
 while ($line=mysqli_fetch_array($checkSQL)) {
 echo'<div>
 <h3>'.$line['title'].'</h3>
 <p>'.$line['text'].'</p>
 <p>'.$line['date'].'</p>
 </div>';
 }
 ?>