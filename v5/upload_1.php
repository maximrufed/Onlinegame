<!DOCTYPE html>
<head>
   
    <meta charset="utf-8">
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<html>
<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<form action="index.php">
        <input type="submit" class="back" value="Назад">
    </form>
<form action="upload_2.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file[]" multiple>
	<input type="submit" value="Отправить">
</form>
</html>