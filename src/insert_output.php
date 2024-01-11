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
    <h1>アニメキャラ登録</h1>
    <a href="index.php">トップへ戻る</a>
    <hr><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from title where title_name=?');
        $sql->execute([$_POST['title']]);
        foreach($sql as $row){
            $sql2=$pdo->prepare('insert into kyara(title_id, kyara_name, kyara_explanation) value(?,?,?)');
            $sql2->execute([$row['title_id'], $_POST['name'], $_POST['explanation']]);
        }
    ?>
    <h2>登録完了！</h2>
</body>
</html>