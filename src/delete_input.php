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
    <h1>アニメキャラ削除</h1>
    <div class = "top">
        <a href="index.php">トップへ戻る</a>
    </div>
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
            echo '<div class="explanation">',$row['kyara_explanation'], '</div>';
            echo '<a href = "delete_output.php?id=', $row['kyara_id'], '">削除</a>';
            echo '<br>';
        }
    ?>
    </form>
</body>
</html>