<?php
ob_start();
?>
<?php include ("file/db_conn.php"); ?>
<?php
    if(isset($_POST["logout"])){
        session_unset();
        header("Location: Log.php");
    }
    if(isset($_POST["master"])){
        header("Location: Master.php");
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>商品管理</title>
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
        .box0 {
            width: 400px;
            height: 200px;
            margin-left: 480px;
        }
        .box1 {
            width: 150px;
            height: 50px;
        }
        .box2 {
            width: 200px;
            height: 50px;
             border-radius: 30px;
            background:#7fff00 ;
        }
        .box3 {
            width: 200px;
            height: 50px;
             border-radius: 30px;
            background:#7fff00;
        }
        .box4 {
            width: 250px;
            height: 70px;
            margin-left: 550px;
             border-radius: 30px;
            background:#7fff00;
        }
        .info {
            margin-left: 480px;
        }
    </style>
    <?php
    if(isset($_POST['fix'])){
            $iceid  = $_POST["id"];
            $_SESSION["iceid"]=$iceid;
            header('location: Itemfix.php');
        };
    if(isset($_POST['delete'])){
            $iceid  = $_POST["id"];
            $_SESSION["iceid"]=$iceid;
            header('location: Item.php');
        };
    ?>
</head>
<body>
    <form method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3>担当者：<?php echo $_SESSION['logeduser']['UserName']; ?></h3>
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
                <input type="submit" class="btn btn-secondary btn-lg" value="メンテナンス" name="master">
                <input type="submit" class="btn btn-secondary btn-lg" value="ログアウト" name="logout">
            </span>
        </nav>
    </form>
    <hr color="000000" size="3">
    <br>
    <br>
    <br>
    <br>
    <h1>商品管理画面</h1>
    <br>
    <?php
    $stmt = $db->query('select * from ices ');
    echo "<form method='post' action='Item.php'>";
    echo "<select class='box0' size='5'name='id'>";
		while($result = $stmt->fetch()){
            if($result['enabled']==1){
			print '<option value='.$result['iceid'].">".$result['icename'].' '.$result['icestock']."個".' '.$result['Price']."円"."</option>";
		}
        }
		print "</select>";
    //商品削除
    if(isset($_POST["id"])){
    $id = $_SESSION['iceid'];
            $stmt = $db->prepare('select * from ices where iceid='.$id);
            $stmt->execute();
            $result = $stmt->fetch();
     if(isset($_POST["delete"])){
         if($_POST["hidden"]==2){
         $stmt = $db->query("update ices set enabled = 0 where iceid = ".$id);       
         }
$db = null;
     }   
    }
?>
    <br>
    <br>
    <div class="info">
        <input type="submit" class="box2" name="fix" value="修正">
        <input type="submit" class="box3" name="delete" onclick="kakunin()" value="削除">
        <input type="hidden" name="hidden" id="hidden">
    </div>
    <br>
    <?php
   echo "</form>";
    ?>
    <form action="ItemRegister.php" method="post">
        <input type="submit" class="box4" name="productregister" value="商品登録">
    </form>
</body>
<script>
    var res;
    function kakunin() {
        res = confirm("削除しますか？");
        if (res == true) {
            document.getElementById('hidden').value = '2';
        } else {
            alert('キャンセルしました');
        }
    }
</script>
</html>
