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
<html>
    <head>
        <style>
            body{
                    background-color: azure;
                
            }
            p{
                font-family: "MS Pゴシック";
            }
            
            header.menu{
                position: fixed; left: 0; right: 0; top: 0; width: 100%; height: 60px;
                box-shadow: 0px 0px 5px 2px #999;
            }
            div.menu{
                position: absolute;
                top: 50%; left: 5px; transform: translate(0%, -50%);
            }
            div.logout{
                position: absolute;
                top: 50%; right: 5px; transform: translate(0%, -50%);
            }
            button.menu{
                font-size: 14px;
                font-weight: bold;
                width: 125px;
                padding: 8px;
                border-radius: 15px;
                border-color: #404040;
                margin: 0px 5px;
                color: #404040;
                background-color: white;
            }
            button.menu:hover{
                background-color: #404040;
                color: white;
                transition: 0.5s;
            }
            div.test{
                position: fixed; top: 300px; left: 100px;
            }
            .title {
                width:500px;
                font-family:"メイリオ" ;
                padding: 0.25em;
                margin: 0 auto 0 auto;
                padding: 1rem 2rem;
                color: #fff;
                background: #094;
                -webkit-box-shadow: 5px 5px 0 #007032;
                box-shadow: 5px 5px 0 #007032;
            }
            .month1 {
                width:200px;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
                text-align : center;
                color: #fff;
                border-radius: 100vh;
                background-image: -webkit-gradient(linear, right top, left top, from(#9be15d), to(#00e3ae));
                background-image: -webkit-linear-gradient(right, #9be15d 0%, #00e3ae 100%);
                background-image: linear-gradient(to left, #9be15d 0%, #00e3ae 100%);
            }
           .month11 {
                width:200px;
                position: relative;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
            }
            .month11:after{
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 6px;
                content: '';
                border-radius: 3px;
                background-image: -webkit-gradient(linear, right top, left top, from(#2af598), to(#009efd));
                background-image: -webkit-linear-gradient(right, #2af598 0%, #009efd 100%);
                background-image: linear-gradient(to left, #2af598 0%, #009efd 100%);
                                
            }
            .item2 {
                width:200px;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
                text-align : center;
                color: #fff;
                border-radius: 100vh;
                background-image: -webkit-gradient(linear, right top, left top, from(#9be15d), to(#00e3ae));
                background-image: -webkit-linear-gradient(right, #9be15d 0%, #00e3ae 100%);
                background-image: linear-gradient(to left, #9be15d 0%, #00e3ae 100%);
            }
             select{
                width:200px;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
            }
            .month111{
                width:200px;
                text-align : center;
                color: #6cb4e4;
                text-align: center;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
            }
             a{
                text-decoration: none;
            }
            .item22 {
                width:200px;
                position: relative;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
            }
            .item22:after{
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 6px;
                content: '';
                border-radius: 3px;
                background-image: -webkit-gradient(linear, right top, left top, from(#2af598), to(#009efd));
                background-image: -webkit-linear-gradient(right, #2af598 0%, #009efd 100%);
                background-image: linear-gradient(to left, #2af598 0%, #009efd 100%);             
            }
            
             .item222{
                width:200px;
                text-align : center;
                color: #6cb4e4;
                text-align: center;
                padding: 0.25em;
                display: block;
                margin: 0 auto 0 auto;
            }
             .month{
                position: absolute;
                left: 0%; width: 50%; height: 100%;
            
                
            }
             .month0{
                position: absolute;
                left: 50%; width: 50%; height: 100%;
                
            }
            .item{
                position: absolute;
                right: 0%; width: 50%; height: 100%;
                background-color: azure;
            }
              .item0{
                position: absolute;
                right: 50%; width: 50%; height: 100%; 
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="test">
        </div>
          <br>
          <br>
          <br>
        <div class="title"><p>売り上げ表示画面</p></div>
        <br>
        <div align="center" class="month">
        <div class="month0">
        <div class="month1">月単位</div>
        <br>
        <div class="month11">月を選択</div>
        <div class="select">
        <form method="POST" action="ReciptMonth.php">
        <select name="example">
            <option value="01">1月</option>
            <option value="02">2月</option>
            <option value="03">3月</option>
            <option value="04">4月</option>
            <option value="05">5月</option>
            <option value="06">6月</option>
            <option value="07">7月</option>
            <option value="08">8月</option>
            <option value="09">9月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
        </select>
        </div>
        
        
        <div class="month111">
            <input type="submit" value ="単位のレシートを見る"></div>
        </div>
        </form>
        </div>
        
       <div align="center" class="item">
       <div class="item0">
       <div class="item2">商品単位</div>
        <br>
       
        <div class="item22">商品を選択</div>
        <form method="POST" action="ReciptProduct.php">
        <select class="box0" name="icename">
         <?PHP
		$stmt = $db->query('select * from ices ');//値がないのでとりあえずテーブルを取得、箱用意！！

		  while($result = $stmt->fetch())
            {
                echo '<option  value='.$result['iceid'].'>'.$result['icename'].'</option>';
            }    
		$db = null;
        ?>
       
        </select>
        
       
        <div class="item222">
        <input type="submit" value ="商品のレシートを見る"></div>
        </div>
        </form>
        </div>
    </body>
</html>