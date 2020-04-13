<!DOCTYPE html>
<head>
   
    <meta charset="utf-8">
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<?php
header("Content-Type: text/html; charset=UTF-8");
include 'menu.php';
?>
<div class="w">
    Submit
</div>
<div class="big">
<form action="upload_2.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file[]" multiple>
	<br>
	<input type="submit" style="margin: 6px 0px 0px 0px;" value="Отправить">
</form>
</div>
</body>