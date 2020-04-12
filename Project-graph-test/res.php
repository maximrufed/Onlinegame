<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Результаты</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
<!--    <script src="jquery.js"></script>-->
    <!--    <script type="text/javascript" src="show.js"></script>-->
</head>
<body>
    <div class="w">
        Results
    </div>
    <?php
        include 'menu.php';
    ?>
    <div style="padding: 10px 10px 10px 10px">
    <table>
        <tr><th>Бот 1</th><th>Бот 2</th><th>Победа 1</th><th>Ничья</th><th>Победа 2</th></tr>

    <?php

    $json = json_decode(file_get_contents("data2.json"));

    foreach ($json as $key => $value) {
    //    echo $key . " : " . $value . "<br>";
        echo '<tr>';
        $p1 = '';
        $p2 = '';
        for ($i = 0; ; $i++) {
            if ($key[$i] == '#') {
                $p1 = substr($key, 0, $i);
                $p2 = substr($key, $i + 1, strlen($key) - $i - 1);
                break;
            }
        }
        echo '<td>' . $p1 . '</td><td>' . $p2 . '</td>';
        $v = json_decode($value);
        foreach ($v as $k => $val) {
            echo '<td>' . $val . '</td>';
        }
        echo '</tr>';
    }
    ?>
    </table>
    </div>
</body>