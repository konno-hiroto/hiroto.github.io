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
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>ユーザー詳細</title>
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
        #p1 {
            font-size: 30px;
            display: inline;
            margin-left: 300px;
        }
        #hr1 {
            width: 800px;
        }
        .info1 {
            margin-left: 30px;
            width: 500px;
            height: 40px;
            border: none;
        }
        .info2 {
            margin-left: 25px;
            width: 500px;
            height: 40px;
            border: none;
        }
        .info3 {
            margin-left: 30px;
            width: 500px;
            height: 40px;
            border: none;
        }
        .info4 {
            margin-left: 120px;
            width: 500px;
            height: 40px;
            border: none;
        }
    </style>
</head>
<body>
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
    <hr color="000000" size="3">
    <br>
    <br>
    <br>
    <br>
    <h1>ユーザー詳細</h1>
    <br>
    <?php
    $id = $_SESSION['userid'];             
            $stmt = $db->query("select * from users where userid =$id");
            $result = $stmt->fetch();
            if($result["Authority"]==0){
                $ans="一般";
            }else{
                $ans="管理者";
            };
     ?>
    <p id="p1">ユーザー名</p>
    <input type="text" class="info1" name="t1" readonly="readonly" value="<?php echo $result['UserName']; ?>" />
    <hr id="hr1"  color="a9a9a9" size="3">
   <p id="p1">ユーザーID</p>
   <input type="text" class="info2" name="t2" value="<?php echo $result['userid']; ?>" readonly="readonly" />
   <hr id="hr1" color="a9a9a9" size="3">
   <p id="p1">パスワード</p>
   <input type="text" class="info3" name="t3" value="<?php echo $result['password']; ?>" readonly="readonly" />
   <hr id="hr1" color="a9a9a9" size="3">
   <p id="p1">役職</p>
   <input type="text" class="info4" name="t4" value="<?php echo $ans;?>" readonly="readonly" />
   <hr id="hr1" color="a9a9a9" size="3">
</body>
</html>
