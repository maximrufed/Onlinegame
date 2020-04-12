<?php

$time_bot = 1.5;

$way_to_bots = '';
$map1 = array();
$map2 = array();
$map3 = array();
$n = 0;
$p1 = '';
$p2 = '';
$msg = '';
$winner = -1;

function create_map() {
    global $n, $map1, $map2, $map3, $p1, $p2, $msg, $winner;
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $map1[$i][$j] = 'e';
        }
    }
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n + 1; $j++) {
            $map2[$i][$j] = 'e';
        }
    }
    for ($i = 0; $i < $n + 1; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $map3[$i][$j] = 'e';
        }
    }
    $obj = array(
        "map1" => $map1,
        "map2" => $map2,
        "map3" => $map3,
        "n" => $n,
        "p1" => $p1,
        "p2" => $p2,
        "msg" => $msg,
        "win" => $winner
    );

    $json = json_encode($obj);
    file_put_contents("map.json", $json);
}

function end_game() {
    global $n, $map1, $map2, $map3;
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($map1[$j][$i] == 'e') return 0;
        }
    }
//    $map2 = array();
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n + 1; $j++) {
            if ($map2[$i][$j] == 'e') return 0;
        }
    }
//    $map3 = array();
    for ($i = 0; $i < $n + 1; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($map3[$i][$j] == 'e') return 0;
        }
    }
    return 1;
}

function put_map($turn) {
    global $n, $map1, $map2, $map3, $p1, $p2, $msg, $way_to_bots, $winner;
    $obj = array(
        "map1" => $map1,
        "map2" => $map2,
        "map3" => $map3,
        "n" => $n,
        "p1" => $p1,
        "p2" => $p2,
        "msg" => $msg,
        "win" => $winner
    );

    if ($turn) {
        $arr = array(
            'e'=> 0,
            'g'=> 1,
            'r'=> 2
        );
    } else {
        $arr = array(
            'e'=> 0,
            'g'=> 2,
            'r'=> 1
        );
    }

    $json = json_encode($obj);
    file_put_contents("map.json", $json);

    // PHP_EOL
    $f = fopen($way_to_bots . "map.txt", "w");

    fwrite($f, strval($n) . PHP_EOL);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            fwrite($f, $arr[$map1[$i][$j]] . ' ');
        }
        fwrite($f, PHP_EOL);
    }
    fwrite($f, PHP_EOL);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n + 1; $j++) {
            fwrite($f, $arr[$map2[$i][$j]] . ' ');
        }
        fwrite($f, PHP_EOL);
    }
    fwrite($f, PHP_EOL);
    for ($i = 0; $i < $n + 1; $i++) {
        for ($j = 0; $j < $n; $j++) {
            fwrite($f, $arr[$map3[$i][$j]] . ' ');
        }
        fwrite($f, PHP_EOL);
    }

    fclose($f);

}

function check($x, $y, $v) {
    global $n, $map1, $map2, $map3;
    if (($map2[$x][$y] != "e") && ($map2[$x][$y + 1] != "e") && ($map3[$x][$y] != "e") && ($map3[$x + 1][$y] != "e")) {
            $map1[$x][$y] = $v;
        return 1;
    }
    return 0;
}

function put($type, $x, $y, $v) {
    global $n, $map1, $map2, $map3;
    $ans = 0;
    if ($type == 2) {
        $map2[$x][$y] = $v;
        if ($y > 0) {
            $ans |= check($x, $y - 1, $v);
        }
        if ($y < $n) {
            $ans |= check($x, $y, $v);
        }
    }
    if ($type == 3) {
        $map3[$x][$y] = $v;
//        echo "try - " . $x . "<br>";
        if (intval($x) > 0) {
//            echo "<br>check " . ($x - 1) . " " . $y . "<br>";
            $ans |= check($x - 1, $y, $v);
        }
        if ($x < $n) {
            $ans |= check($x, $y, $v);
        }
    }
    return $ans;
}

set_time_limit(120);
$max_size = 10;
$is_game = ((int)file_get_contents('isgame.txt'));
$value = 0;
// $t = 3;

//echo '$isgame - ' . $is_game . '<br>';

$eps = 1e-8;

//create_map();
//put_map();
if (isset($_POST['n']) && !$is_game
    && isset($_POST['p1'], $_POST['p2'])) {
    $p1 = strval($_POST['p1']);
    $p2 = strval($_POST['p2']);
    $n = intval($_POST['n']);
    $t = 0;
//    $winner = 0;
    $who = array(
        0=>($way_to_bots . $p1),
        1=>($way_to_bots . $p2)
    );
    $who_map = array(
        0=>'r',
        1=>'g'
    );
    if ($n >= 1 && $n <= $max_size && $p1 != '' && $p2 != '') {
//        $time = time() + microtime();
        $t = 0;
        create_map();
        put_map($t);
        $counter = 12;//$n * ($n + 1) + $n * ($n + 1);
        while (1 && $counter > 0) {

//            check(0, 0, "r");
            if (end_game()) {
                $c1 = 0;
                $c2 = 0;
                for ($i = 0; $i < $n; $i++) {
                    for ($j = 0; $j < $n; $j++) {
                        if ($map1[$i][$j] == 'r') {
                            $c1 += 1;
                        }
                        else $c2++;
                    }
                }
                if ($c1 > $c2) $winner = 0;
                if ($c1 < $c2) $winner = 1;
                if ($c1 == $c2) $winner = 2;
                break;
            }
            $value = file_get_contents($way_to_bots . "map.txt");
            $cmd = $who[$t] . " args file-name";
//            echo "cmd = " . $cmd . "<br>";
            $time_start = time() + microtime();
            exec($cmd, $output, $rv);
            $time_start = time() + microtime() - $time_start;
//            echo strval($time_start) + '<br>';
            if ($time_start - $time_bot > $eps) {
                $msg = 'Time limit';
                $winner = !$t;
                break;
            }



            $file = $way_to_bots . 'turn.txt';
            $f = fopen($file, "r") or
            die("File $file does not exist!");
            $items = Array();
            while (($data = fgets($f)) !== false) {
                $items0 = explode(" ", $data);
                foreach ($items0 as $item)
                    if (is_numeric(trim($item))) $items[] = $item;
            }
            fclose($f);
            if (count($items) != 3) {
                $winner = 1 - $t;
                $msg = 'Incorrect turn';
                break;
            }
//            foreach ($a as $item) echo $item . ' ';
            $type = intval($items[0]);
            $x = intval($items[1]);
            $y = intval($items[2]);
//            echo sprintf("x - %s : %s - <br>", $x, $items[1]);
//            echo "y - " . $y . "<br>";
//            echo "type - " . $type . "<br>";
//            echo "bot1 - " . $who[0] . "<br>";
//            echo "bot2 - " . $who[1] . "<br>";
            $ch_turn = 0;
            if (($type == 1 && $x >= 1 && $y >= 1 && $x <= $n && $y <= $n + 1) || ($type == 2 && $x >= 1 && $y >= 1 && $x <= $n + 1 && $y <= $n)) {
                $x--;
                $y--;
                if ($type == 1) {
                    if ($map2[$x][$y] == 'e') {
                        $ch_turn |= put(2, $x, $y, $who_map[$t]);
//                        $map2[$x][$y] = $who_map[$t];
                        put_map($t);
                    } else {
                        $winner = 1 - $t;
//                        $msg = "Incorrect turn [type, x, y]- {" . $type . ", " . $x . ", " . $y . "}";
                        $msg = "Incorrect turn";
                        break;
                    }
                } else {
                    if ($map3[$x][$y] == 'e') {
                        $ch_turn |= put(3, $x, $y, $who_map[$t]);
//                        $map3[$x][$y] = $who_map[$t];
                        put_map($t);
                    } else {
                        $winner = 1 - $t;
//                        $msg = "Incorrect turn [type, x, y]- {" . $type . ", " . $x . ", " . $y . "}";
                        $msg = "Incorrect turn";
                        break;
                    }
                }
            } else {
                $winner = 1 - $t;
                $msg = "Incorrect turn";
                break;
            }
//            $counter--;

//            $time_start = time() + microtime() - $time_start;
            if (!$ch_turn) $t = !$t;

            sleep(1);
        }


        if ($winner == 0) {
//            echo "1 wins<br>";
        } else {
//            echo "2 wins<br>";
        }
//        $t = !$t;
//        echo $winner;
        if ($winner == 0) {
            $msg = 'Красные победили! ' . $msg;
        } else
        if ($winner == 1) {
            $msg = 'Зелёные победили! ' . $msg;
        } else
        if ($winner == 2) {
            $msg = 'Ничья! ' . $msg;
        }
        put_map($t);


//        if (isset($_POST['p1'], $_POST['p2'], $_POST['res']) && $_POST['p1'] != '' && $_POST['p2'] != '') {
	$p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        if ($p1 != $p2) {
//            
//            $res = intval($_POST['res']);
            $res = intval($winner);
            $json = json_decode(file_get_contents("data2.json"));
            if ($res >= 0 && $res <= 2) {
                $text = $_POST['p1'] . '#' . $_POST['p2'];
                if (isset($json->$text)) {
                    $j = json_decode($json->$text);
                    if ($res == 0) {
                        $j->w1 += 1;
                    } else if ($res == 1) {
                        $j->w3 += 1;
                    } else if ($res == 2) {
                        $j->w2 += 1;
                    }
                    $json->$text = json_encode($j);
                } else {
                    $text = $_POST['p2'] . '#' . $_POST['p1'];
                    if (isset($json->$text)) {
                        $j = json_decode($json->$text);
                        if ($res == 0) {
                            $j->w1 += 1;
                        } else if ($res == 1) {
                            $j->w3 += 1;
                        } else if ($res == 2) {
                            $j->w2 += 1;
                        }
                        $json->$text = json_encode($j);
                    } else {
                        $j = array("w1" => 0, "w2" => 0, "w3" => 0);
                        if ($res == 0) {
                            $j['w1'] += 1;
                        } else if ($res == 1) {
                            $j['w3'] += 1;
                        } else if ($res == 2) {
                            $j['w2'] += 1;
                        }
                        $json->$text = json_encode($j);
                    }
                }
                file_put_contents('data2.json', json_encode($json));
            }

        }

    }

//    echo $msg . '<br>';
//    put_map($t);
//    while ($value > 0) {
//        $value--;
//			$value = file_get_contents("map.txt");
//            $cmd = "bot1.exe args file-name";
//			exec($cmd,$output,$rv);
        // echo strval($value);
//        echo('<br>' . $value);
//        file_put_contents('map.txt', strval($value));
//        sleep(1);
//    }
//    file_put_contents('isgame.txt', '0');
}
?>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Новая игра</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <script src="jquery.js"></script>
<!--    <script type="text/javascript" src="show.js"></script>-->
</head>
<body>
    <div class="w">
        Run the game
    </div>
    <?php
    include 'menu.php';
    ?>
<form action = "run.php" method = "post">
    <div>
        <div class="bot1">
            <div class="ww">Choose first bot</div>
                <?php
                $files = glob('*.exe');
                foreach($files as $file) {
                    echo '<p><input name="p1" type="radio" value="' . $file . '" checked>' . $file . '</p>';
                }
                ?>
        </div>
        <div class="bot1">
            <div class="ww">Choose second bot</div>
                <?php
                $files = glob('*.exe');
                foreach($files as $file) {
                    echo '<p><input name="p2" type="radio" value="' . $file . '" checked>' . $file . '</p>';
                }
                ?>
        </div>
    </div>
    <div class="input">
        <input class = "" id="POST-name" type="text" name="n" placeholder="Размер поля" required>
        <input type="submit" value="Запустить игру">
    </div>
</form>
<!---->
<!--<form action="run.php" method="post">-->
<!--	<div class="input_form">-->
<!--        <input id="POST-name" type="text" name="n" placeholder="Write map size here" required>-->
<!--    </div>-->
<!--    <div class="input_form">-->
<!--        <input id="POST-name" type="text" name="p1" placeholder="Write name of first bot here" required>-->
<!--    </div>-->
<!--    <div class="input_form">-->
<!--        <input id="POST-name" type="text" name="p2" placeholder="Write name of second bot here" required>-->
<!--    </div>-->
<!--    <div class="input_form">-->
<!--        <input type="submit" value="Run">-->
<!--    </div>-->
<!--</form>-->

</body>

