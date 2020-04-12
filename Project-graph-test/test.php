<?php

function create($n) {
    $map1 = array();
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $map1[$i][$j] = 'e';
        }
    }
    $map2 = array();
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n + 1; $j++) {
            $map2[$i][$j] = 'e';
        }
    }
    $map3 = array();
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
    );

    $json = json_encode($obj);
    file_put_contents("map.json", $json);
}

$value = file_get_contents('./bots/map.txt');
$cmd = "bot3.exe args file-name";
echo $value . '<br>';
echo $cmd . '<br>';
exec($cmd,$output,$rv);

//$file = 'turn.txt';
//$f = fopen($file, "r") or
//die("File $file does not exist!");
//$a = Array();
//while (($data = fgets($f)) !== false) {
//    $a0 = explode(" ", $data);
//    foreach ($a0 as $item)
//        if (is_numeric(trim($item))) $a[] = $item;
//}
//fclose($f);
//foreach ($a as $item) echo $item . ' ';

?>
