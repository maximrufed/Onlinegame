<?php
if (isset($_POST['p1'], $_POST['p2']) && $_POST['p1'] != '' && $_POST['p2'] != '') {
    $text = $_POST['p1'] . '#' . $_POST['p2'];
    $json = json_decode(file_get_contents("data2.json"));
    if (isset($json[$text])) {
        echo $json[$text];
    } else {
        echo json_encode(array('w1' => 0, 'w2' => 0, 'w3' => 0));
    }
} else {
    echo json_encode(array('w1' => 0, 'w2' => 0, 'w3' => 0));
}

?>