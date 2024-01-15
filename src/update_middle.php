<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516816-final';
    const USER = 'LAA1516816';
    const PASS = 'Pass1226';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>キャラクター特集</title>
</head>
<body>
    <?php
    echo '<form action="update_output.php?id=', $_GET['id'], '" method="post">';
    ?>
    <h1>アニメキャラ更新</h1>
    <div class = "top">
        <a href="index.php">トップへ戻る</a>
        <a href="#" onclick="history.back()">前ページへ戻る</a>
    </div>
    <hr><br>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from kyara where kyara_id=?');
        $sql->execute([$_GET['id']]);
        foreach($sql as $row){
            $sql2=$pdo->prepare('select * from title where title_id=?');
            $sql2->execute([$row['title_id']]);
            echo $row['kyara_id'], '<br>';
            foreach($sql2 as $row2){
                $sql3=$pdo->query('select * from title');
                echo 'タイトル：<select name="title_name">';
                echo '<option value=""></option>';
                foreach($sql3 as $row3){
                    echo '<option value="', $row3['title_name'] ,'">', $row3['title_name'] ,'</option>'; 
                }
            }
            echo '</select><br>';
            echo 'キャラ名：<input type="text" name="kyara_name" value="', $row['kyara_name'], '"><br>';
            echo '　説明　：<textarea cols="50" rows="10" name="explanation">', $row['kyara_explanation'], '</textarea>';
            echo '<br><br>';
        }
        echo '<button type = "submit">更新</button>';
    ?>
    </form>
</body>
</html>