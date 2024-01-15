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
    <h1>アニメキャラ更新</h1>
    <div class = "top">
        <a href="index.php">トップへ戻る</a>
    </div>
    <hr><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from title where title_name=?');
        $sql->execute([$_POST['title_name']]);
        foreach($sql as $row){
            $sql2=$pdo->prepare('update kyara set title_id=?, kyara_name=?, kyara_explanation=? where kyara_id=?');
            $sql2->execute([$row['title_id'], $_POST['kyara_name'], $_POST['explanation'], $_GET['id']]);
        }
    ?>
    <h2>更新完了！</h2>
</body>
</html>