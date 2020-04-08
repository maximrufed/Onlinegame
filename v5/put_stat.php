<?php
if (isset($_POST['p1'], $_POST['p2'], $_POST['res']) && $_POST['p1'] != '' && $_POST['p2'] != '') {
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $res = intval($_POST['res']);
    $json = json_decode(file_get_contents("data2.json"));
    if ($res >= 0 && $res <= 2) {
        $text = $_POST['p1'] . '#' . $_POST['p2'];
        if (isset($json[$text])) {
            if ($res == 0) {
                $json[$text]['w1'] += 1;
            } else if ($res == 1) {
                $json[$text]['w3'] += 1;
            } else if ($res == 2) {
                $json[$text]['w2'] += 1;
            }
        } else {
            $text = $_POST['p2'] . '#' . $_POST['p1'];
            if (isset($json[$text])) {
                if ($res == 0) {
                    $json[$text]['w1'] += 1;
                } else if ($res == 1) {
                    $json[$text]['w3'] += 1;
                } else if ($res == 2) {
                    $json[$text]['w2'] += 1;
                }
            } else {
                $json[$text] = array('w1' => 0, 'w2' => 0, 'w3' => 0);
                if ($res == 0) {
                    $json[$text]['w1'] += 1;
                } else if ($res == 1) {
                    $json[$text]['w3'] += 1;
                } else if ($res == 2) {
                    $json[$text]['w2'] += 1;
                }
            }
        }
    }
}
?>