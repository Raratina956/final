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
    <link rel="stylesheet" href="css/index.css">
    <title>キャラクター特集</title>
</head>
<body>
    <form action="insert_output.php" method="post">
    <h1>アニメキャラ登録</h1>
    <div class = "top">
        <a href="index.php">トップへ戻る</a>
    </div>
    <hr><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from title');
        echo 'タイトル：<select name="title">';
        echo '<option value=""></option>';
        echo '<option value="追加">新規追加</option>';
        foreach($sql as $row){
            echo '<option value="', $row['title_name'] ,'">', $row['title_name'] ,'</option>';
        }
        echo '</select><br>';
        echo '　名前　：<input type="text" name="name"><br>';
        echo 'タイトル：<input type="text" name="title_name" placeholder="新規追加のみ入力してください"><br>';
        echo ' ＵＲＬ ：<input type="text" name="url" placeholder="新規追加のみ入力してください"><br>';
        echo '　説明　：<textarea cols="50" rows="10" name="explanation"></textarea><br>';
        echo '<button type = "submit">登録</button>';
    ?>
    </form>
</body>
</html>