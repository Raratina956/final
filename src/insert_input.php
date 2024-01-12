<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516816-final';
    const USER = 'LAA1516816';
    const PASS = 'Pass1226';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャラクター特集</title>
</head>
<body>
    <form action="insert_output.php" method="post">
    <h1>アニメキャラ登録</h1>
    <a href="#" onclick="history.back()">トップへ戻る</a>
    <hr><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from title');
        echo 'タイトル：<select name="title">';
        foreach($sql as $row){
            echo '<option value="', $row['title_name'] ,'">', $row['title_name'] ,'</option>'; 
        }
        echo '</select><br>';
        echo '名前　　：<input type="text" name="name"><br>';
        echo '説明　　：<textarea cols="50" rows="10" name="explanation"></textarea><br>';
        echo '<button type = "submit">登録</button>';
    ?>
    </form>
</body>
</html>