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
    <form action="update_middle.php" method="post">
    <h1>アニメキャラ更新</h1>
    <a href="#" onclick="history.back()">トップへ戻る</a>
    <hr><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from kyara');
        foreach($sql as $row){
            $sql2=$pdo->prepare('select * from title where title_id=?');
            $sql2->execute([$row['title_id']]);
            echo $row['kyara_id'], '：';
            foreach($sql2 as $row2){
                echo '<a href="', $row2['title_link'], '" target="_blank">', $row2['title_name'],'</a>：';
            }
            echo $row['kyara_name'], '<br>';
            echo $row['kyara_explanation'];
            echo '<a href = "update_middle.php?id=', $row['kyara_id'], '">更新</a>';
            echo '<br><br>';
        }
    ?>
    </form>
</body>
</html>