<?php
ob_start();
?>
<?php include ("file/db_conn.php"); ?>
<?php
    if(isset($_POST["logout"])){
        session_unset();
        header("Location: Log.php");
    }
    if(isset($_POST["user"])){
        header("Location: User.php");
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <form method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3>担当者：<?php echo $_SESSION['logeduser']['UserName']; ?></h3>
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
                <input type="submit" class="btn btn-secondary btn-lg" value="戻る" name="user">
                <input type="submit" class="btn btn-secondary btn-lg" value="ログアウト" name="logout">
            </span>
        </nav>
    </form>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>ユーザー登録</title>
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
        .box1 {
            width: 500px;
            height: 50px;
            margin-left: 430px;
        }
        .box2 {
            width: 500px;
            height: 50px;
            margin-left: 430px;
        }
        .box3 {
            width: 200px;
            height: 50px;
            margin-left: 575px;
        }
        #radio-btn {
            text-align: center;
        }
        .div-btn {
            text-align: center;
        }
        #radio-btn1,
        #radio-btn2 {
            margin-left: 50px;
            margin-right: 50px;
        }
    </style>
</head>
<body>
    <hr color="000000" size="3">
    <br>
    <br>
    <br>
    <br>
    <h1>ユーザー登録</h1>
    <br>
    <?php
     if(isset($_POST["register"])){
         $abc = $_POST["UserName"];
         $def = $_POST["password"];
         $ghi = $_POST["Authority"];
         $stmt = $db->prepare('insert into users (UserName, password, Authority, enabled) values (:UseName,:password,:Authority,1)');
         $stmt->bindValue(':UseName', $abc);
         $stmt->bindValue(':password', $def);
         $stmt->bindValue(':Authority', $ghi);
         $stmt->execute();
echo <<<EOM
<script>
window.location.href='User.php';
//アラート
alert('"$abc"を登録しました');
</script>
EOM;
            $db = null;
     }
    ?>
    <form method="POST" action="UserRegister.php">
        <input type="text" class="box1" name="UserName" maxlength="30" placeholder="登録したいユーザー名を30文字以内で入力してください">
        <br>
        <br>
        <br>
        <input type="text" class="box2" name="password" maxlength="30" placeholder="登録したいパスワードを30文字以内で入力してください">
        <br>
        <br>
        <div class="div-btn">
            <span id="radio-btn1"> <input type="radio" name="Authority" value="r1">一般</span>
            <span id="radio-btn2"><input type="radio" name="Authority" value="r2">管理者</span>
        </div>
        <br>
        <br>
        <input type="submit" class="box3" id="button" name="register" value="登録">
    </form>
</body>
</html>
