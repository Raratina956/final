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
    <h1>アニメキャラ一覧</h1>
    <div class = "top">
        <a href="index.php">トップへ戻る</a>
    </div>
    <hr><br>
    <form action="list.php" method="post">
        カテゴリー検索
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from title');
        echo 'タイトル：<select name="title">';
        echo '<option value=""></option>';
        foreach($sql as $row){
            echo '<option value="', $row['title_name'] ,'">', $row['title_name'] ,'</option>';
        }
        echo '<input type="submit" value="検索"><br>';
        if(isset($_POST['keyword'])){
            $sql4=$pdo->prepare('select * from title where title_name=?');
            $pdo->execute([$_POST['titile']]);
            foreach($sql4 as $row3){
                $sql3=$pdo->prepare('select * from kyara where title_id=?');
                $pdo->execute([$_row3['title_id']]);
            }
        }else{
            $sql3=$pdo->query('select * from kyara');
        }
        foreach($sql3 as $row){
            $sql2=$pdo->prepare('select * from title where title_id=?');
            $sql2->execute([$row['title_id']]);
            echo $row['kyara_id'], '：';
            foreach($sql2 as $row2){
                echo '<a href="', $row2['title_link'], '" target="_blank">', $row2['title_name'],'</a>：';
            }
            echo $row['kyara_name'], '<br>';
            echo '<div class="explanation">',$row['kyara_explanation'], '</div>';
            echo '<br><br>';
        }
    ?>
    </form>
</body>
</html>