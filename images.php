<?php
include ('config.php');

if (is_array($_FILES) && array_key_exists('f', $_FILES) && $_FILES['f'] ['error'] == 0) {
	$fileInfo = $_FILES['f'];
	if (move_uploaded_file($fileInfo['tmp_name'], 'uploaded/'.$fileInfo['name'])) {
		mysqli_query($connection, "INSERT INTO images SET name = '".
		mysqli_real_escape_string($connection, $fileInfo['name'])."'");
	}
}
?>

<html>
<head>
	<title>Images</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div>
		<form method="post" enctype="multipart/form-data">
	<div>
		<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
	<div>
		<label>Загрузить файл:</label>
	</div>
	<div>
		<input type="file" name="f">
	</div>
	<div>
		<input type="submit" value="Upload">
	</div>
</div>
</form>
</div>

</body>
</html>
<?php
$result=mysqli_query($connection, "SELECT * FROM images ORDER BY id DESC");
foreach ($result as $img) {
	echo "<div><img src=\"uploaded/".$img['name']."\"></div>";
}

?>