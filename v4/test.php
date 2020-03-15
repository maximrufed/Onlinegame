<?php
$map1 = array();
$n = 6;
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

?>
