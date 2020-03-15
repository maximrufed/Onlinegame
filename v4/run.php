<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<form action="run.php" method="post">
	<p>Number: <input id="POST-name" type="text" name="run">
	<input type="submit" value="Run"><p>
</form>

<?php
    set_time_limit(60);
	echo "Hello, this is page where you can run new game<br>";
	echo '<br>';
	$isgamenow = ((int) file_get_contents('isgame.txt'));
	$value = 0;
	// $t = 3;
	
	echo '$isgamenow - ' . $isgamenow . '<br>';
	if ($isgamenow == 0 && isset($_POST['run']) && ((int) $_POST['run']) >= 0 && ((int) $_POST['run']) <= 100) {
		file_put_contents('isgame.txt', '1');
		$value = ((int) $_POST['run']);
		echo strval($value);
		while ($value > 0) {
		    $value--;
//			$value = file_get_contents("map.txt");
//            $cmd = "bot1.exe args file-name";
//			exec($cmd,$output,$rv);
			// echo strval($value);
			echo ('<br>' . $value);
			file_put_contents('map.txt', strval($value));
			sleep(1);
		}
		file_put_contents('isgame.txt', '0');
	} else {
		echo 'Incorrect value or game is in process';
	}
?>
