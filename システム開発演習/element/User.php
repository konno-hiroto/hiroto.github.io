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
    <title>ユーザー管理画面</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1 {
             width:500px;
                font-family:"メイリオ" ;
                padding: 0.25em;
                margin: 0 auto 0 auto;
                padding: 1rem 2rem;
                color: #fff;
                background: #66CCFF;
                -webkit-box-shadow: 5px 5px 0 #0066FF;
                box-shadow: 5px 5px 0 #0066FF;
        }
        .box0 {
            width: 400px;
            height: 200px;
            margin-left: 480px;
        }
        .box1 {
            width: 150px;
            height: 50px;
            border-radius: 30px;
            background:aqua;
        }
        .box2 {
            width: 150px;
            height: 50px;
            border-radius: 30px;
              background:aqua;
        }
        .box3 {
            width: 150px;
            height: 50px;
            border-radius: 30px;
             background:aqua;
        }
        .box4 {
            width: 250px;
            height: 70px;
            margin-left: 550px;
            border-radius: 30px;
             background:aqua;
        }
        .info {
            margin-left: 450px;
        }
    </style>
    <?php
        if(isset($_POST['detail'])){
            $userid  = $_POST["id"];
            $_SESSION["userid"]=$userid;
            header('location: UserDetail.php');
        }
    if(isset($_POST['fix'])){
            $userid  = $_POST["id"];
            $_SESSION["userid"]=$userid;
            header('location: Userfix.php');
        }
    if(isset($_POST['delete'])){
            $userid  = $_POST["id"];
            $_SESSION["userid"]=$userid;
            header('location: User.php');
        }
    
    
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
    <h1>ユーザー管理画面</h1>
    <br>
    <?php
    //ユーザー詳細
    $stmt = $db->query('select * from users');
    echo "<form method='post' action='User.php'>";
    echo "<select class='box0' size='5' name='id'>";
		while($result = $stmt->fetch()){
            if($result['enabled']==1){
			print '<option value='.$result['userid'].">".$result['UserName']."</option>";
            }
    }
        print "</select>";
     //ユーザー削除
    if(isset($_POST["id"])){
    $id = $_SESSION['userid'];
            $stmt = $db->prepare('select * from users where userid='.$id);
            $stmt->execute();
            $result = $stmt->fetch();
     if(isset($_POST["delete"])){
         if($_POST["hidden"]==2){
         $stmt = $db->query("update users set enabled = 0 where userid = ".$id);
         }
  $db = null;
     }
    }
?>
    <br>
    <br>
    <div class="info">
        <input type="submit" class="box1" name="detail" value="詳細">
        <input type="submit" class="box2" name="fix" value="修正">
        <button type="submit" class="box3" name="delete" onclick="kakunin()">削除</button>
        <input type="hidden" name="hidden" id="hidden">
    </div>
    <?php
    echo "</form>";
    ?>
    <form method="post" action="UserRegister.php">
        <input type="submit" class="box4" name="userregister" value="ユーザー登録">
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