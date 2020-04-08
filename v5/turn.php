<?php
$n = 0;
$k = 0;
$id = '';
if (isset($POST['type'], $POST['x'], $POST['y'])) {
    $x = intval($_POST['x']);
    $y = intval($_POST['y']);
    $type = strval($_POST['type']);
    if ($x > 0 && $x < 10 && $y > 0 && $y <= 10 && ($type == '1' || $type == '0')) {
        $map = array();
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $map[$i][$j] = 0;
            }
        }
        $obj = array(
            "map" => $map,
            "n" => $n,
            "k" => $k
        );
        $json = json_encode($obj);
        $mysql = new mysqli('localhost', 'root', 'usbw', 'tictac');
        if ($mysql->connect_error) {
            die('Connect error (' . $mysql->connect_errno . ')' . $mysql->connect_error);
        }
        $z = "INSERT INTO `tictac`.`games` (`id`, `p1`, `p2`, `time`, `cash`, `turn`) VALUES ('" . $_POST['id'] . "', '', '', '', '" . $json . "', '0')";
        if (mysqli_query($mysql, $z)) {
            echo "Map has done sucsessful<br>";
//                header('Location: index.php');
        } else {
            echo 'error, try one more time';
        }
    } else {
        echo "incorrect values";
    }
} else {
    echo "not enough values";
}

?>

    <div>
        <form action="index.php"
        <p><input type="submit" value="Main menu"></p>
        </form>
    </div>


<?php
    if (isset($POST['type'], $POST['x'], $POST['y'])) {

    }

?>