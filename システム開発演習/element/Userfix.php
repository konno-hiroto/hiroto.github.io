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
    <title>ユーザー修正</title>
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
    <h1>ユーザー修正</h1>
    <br>
    <?php
    $id = $_SESSION['userid'];
            $stmt = $db->prepare('select * from users where userid='.$id);
            $stmt->execute();
            $result = $stmt->fetch();
     if(isset($_POST["fix"])){
         $abc = $_POST["UserName"];
         $def = $_POST["password"];
         $ghi = $_POST["Authority"];
         $stmt = $db->query("update users set UserName = '$abc' where userid = ".$id);
         $stmt = $db->query("update users set password = '$def' where userid = ".$id);
         $stmt = $db->query("update users set Authority = '$ghi' where userid = ".$id);
echo <<<EOM
<script>
window.location.href='User.php';
//アラート
alert('修正しました');
</script>
EOM;
            $db = null;
     }
    ?>
    <form method="post">
        <input type="text" class="box1" name="UserName" maxlength="30" value="<?php echo $result['UserName']; ?>">
        <br>
        <br>
        <br>
        <input type="text" class="box2" name="password" maxlength="30" value="<?php  echo $result['password']; ?>">
        <br>
        <br>
        <div class="div-btn">
            <span id="radio-btn1"> <input type="radio" name="Authority" value=0 <?php $result['Authority']==0 ? 'checked' : ' ' ?>>一般</span>
            <span id="radio-btn2"><input type="radio" name="Authority" value=1 <?php $result['Authority']==1 ? 'checked' : ' ' ?>>管理者</span>
        </div>
        <br>
        <br>
        <input type="submit" class="box3" id="button" name="fix" value="修正">
    </form>
</body>
</html>