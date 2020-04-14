<?php
if (isset($_POST['p1'], $_POST['p2']) && $_POST['p1'] != '' && $_POST['p2'] != '') {
    $text = $_POST['p1'] . '#' . $_POST['p2'];
    $json = json_decode(file_get_contents("data2.json"));
    if (isset($json->$text)) {
        echo $json->$text;
    } else {
	$text = $_POST['p2'] . '#' . $_POST['p1'];
        if (isset($json->$text)) {
           $tek = json_decode($json->$text);
           $a = $tek->w3;
           $tek->w3 = $tek->w1; 
           $tek->w1 = $a;
           echo json_encode($tek);
        } else {
            echo json_encode(array('w1' => 0, 'w2' => 0, 'w3' => 0));
        }
    }
} else {
    echo json_encode(array('w1' => 0, 'w2' => 0, 'w3' => 0));
}

?>