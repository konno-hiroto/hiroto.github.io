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
	<title>商品詳細</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
         h1{
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
        #p1{
            font-size: 30px;
            display:inline;
            margin-left: 400px;
        }
        #hr1{
            width:550px;
        }
        .info1{
            margin-left: 30px;
             width:500px;
            height:40px;
            border:none;
        }
        .info2{
            margin-left: 25px;
             width:500px;
            height:40px;
            border:none;
        }
        .info3{
            margin-left: 55px;
             width:500px;
            height:40px;
            border:none;
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
 
  <h1>商品詳細</h1>
  <br>
  <p id="p1">商品名</p>
  <input type="text" class="info1" name="s1" readonly="readonly" />
  <hr id="hr1"  color="a9a9a9" size="3">
  
  <p id="p1">在庫数</p>
  <input type="text" class="info2" name="s2" readonly="readonly" />
  <hr id="hr1" color="a9a9a9" size="3">
  
  <p id="p1">値段</p>
  <input type="text" class="info3" name="s3" readonly="readonly" />
  <hr id="hr1" color="a9a9a9" size="3">
  
  
  



</body>
</html>