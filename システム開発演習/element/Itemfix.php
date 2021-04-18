<?php
ob_start();
?>
<?php include ("file/db_conn.php"); ?>
<?php
    if(isset($_POST["logout"])){
        session_unset();
        header("Location: Log.php");
    }
    if(isset($_POST["item"])){
        header("Location: Item.php");
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>商品修正</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1 {
            width:500px;
                font-family:"メイリオ" ;
                padding: 0.25em;
                margin: 0 auto 0 auto;
                padding: 1rem 2rem;
                color: #fff;
                background: #7fff00;
                -webkit-box-shadow: 5px 5px 0 #008000;
                box-shadow: 5px 5px 0 #008000;
        }
        .box1 {
            width: 500px;
            height: 50px;
            margin-left: 430px;
        }
        .box2 {
            width: 240px;
            height: 50px;
            margin-left: 430px;
            display: inline;
        }
        .box3 {
            width: 240px;
            height: 50px;
            margin-left: 21px;
            display: inline;
        }
        .box4 {
            width: 200px;
            height: 50px;
            margin-left: 575px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3>担当者：<?php echo $_SESSION['logeduser']['UserName']; ?></h3>
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
                <input type="submit" class="btn btn-secondary btn-lg" value="戻る" name="item">
                <input type="submit" class="btn btn-secondary btn-lg" value="ログアウト" name="logout">
            </span>
        </nav>
    </form>
    <hr color="000000" size="3">
    <br>
    <br>
    <br>
    <br>
    <h1>商品修正</h1>
    <br>
    <?php
    $id = $_SESSION['iceid'];
            $stmt = $db->prepare('select * from ices where iceid='.$id);
            $stmt->execute();
            $result = $stmt->fetch();
     if(isset($_POST["fix"])){
         $abc = $_POST["icename"];
         $def = $_POST["icestock"];
         $ghi = $_POST["Price"];
         $stmt = $db->query("update ices set icename = '$abc' where iceid = ".$id);
         $stmt = $db->query("update ices set icestock = '$def' where iceid = ".$id);
         $stmt = $db->query("update ices set Price = '$ghi' where iceid = ".$id);
echo <<<EOM
<script>
window.location.href='Item.php';
//アラート
alert('修正しました');
</script>
EOM;
            $db = null;
     }
    ?>
    <form method="post">
        <input type="text" class="box1" name="icename" maxlength="30" value="<?php echo $result['icename'];?>">
        <br>
        <br>
        <br>
        <div style="display:inline-flex">
            <input type="text" class="box2" name="icestock" maxlength="5" value="<?php echo $result['icestock'];?>">
            <input type="text" class="box3" name="Price" maxlength="5" value="<?php echo $result['Price'];?>">
        </div>
        <br>
        <br>
        <br>
        <input type="submit" class="box4" name="fix" value="修正">
    </form>
</body>
</html>
