<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>King's bots battle</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
<!--    <script src="jquery.js"></script>-->
    <!--    <script type="text/javascript" src="show.js"></script>-->
</head>
<body>
    <form method = "POST" action="res.php">
	<button class="but1" href>Clear</button>
	<input type="hidden" name="clear" value="1">
    </form>
    <?php
        include 'menu.php';
    ?>
    <div class="w">
        Results
    </div>
    <div style="padding: 10px 10px 10px 10px; font-family: Arial;">
    <table>
        <tr><th>Bot 1</th><th>Bot 2</th><th>Win 1</th><th>Draw</th><th>Win 2</th></tr>

    <?php
    if (isset($_POST['clear']) && intval($_POST['clear']) == 1) {
        file_put_contents("data2.json", '{}');
    }
    
    
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
        echo '<td><in>' . $p1 . '</in></td><td><in>' . $p2 . '</in></td>';
        $v = json_decode($value);
        foreach ($v as $k => $val) {
            echo '<td><in>' . $val . '</in></td>';
        }
        echo '</tr>';
    }
    ?>
    </table>
    </div>
</body>