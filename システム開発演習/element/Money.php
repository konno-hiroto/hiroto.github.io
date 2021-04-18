<?php
ob_start();
?>
<?php include ("file/db_conn.php"); ?>
<?php
    if(isset($_POST["logout"])){
        session_unset();
        header("Location: Log.php");
    }
    if(isset($_POST["menu"])){
        header("Location: Menu.php");
    }
?>
<?php
    if(isset($_POST['toRec'])){
        if($_POST['text'] === ""){
            echo "<script>alert('受取金額が入力されていません');</script>";
        } else if($_POST["text2"] < 0){
            echo "<script>alert('受取金額がたりません');</script>";
        } else {
            $_SESSION['text'] = $_POST['text'];
            $_SESSION['text2'] = $_POST['text2'];
            header("Location: Rec.php");
            $userid = $_SESSION['logeduser']['userid'];
            $date = date("Y-m-d H:i:s");
            $total = $_SESSION['total'];
            $recieved = $_SESSION['text'];
            $balance = $_SESSION['text2'];
            
            $k1size = $_SESSION["k1"][0];
            $k1ice = $_SESSION["k1"][1];
            $k1cup = $_SESSION["k1"][2];
            $k1fee = $_SESSION["totaleach"][0];
            
            $k2size = $_SESSION["k2"][0];
            $k2ice = $_SESSION["k2"][1];
            $k2cup = $_SESSION["k2"][2];
            $k2fee = $_SESSION["totaleach"][1];
            
            $k3size = $_SESSION["k3"][0];
            $k3ice = $_SESSION["k3"][1];
            $k3cup = $_SESSION["k3"][2];
            $k3fee = $_SESSION["totaleach"][2];
            
            $k4size = $_SESSION["k4"][0];
            $k4ice = $_SESSION["k4"][1];
            $k4cup = $_SESSION["k4"][2];
            $k4fee = $_SESSION["totaleach"][3];
            
            $k5size = $_SESSION["k5"][0];
            $k5ice = $_SESSION["k5"][1];
            $k5cup = $_SESSION["k5"][2];
            $k5fee = $_SESSION["totaleach"][4];
            
            $k1icep = explode("  ", $k1ice);
            $k2icep = explode("  ", $k2ice);
            $k3icep = explode("  ", $k3ice);
            $k4icep = explode("  ", $k4ice);
            $k5icep = explode("  ", $k5ice);
            
            $iceUpdate1 = "update ices set icestock = icestock-1 WHERE icename = '$k1icep[0]'";
            $db->query($iceUpdate1);
            $iceUpdate2 = "update ices set icestock = icestock-1 WHERE icename = '$k2icep[0]'";
            $db->query($iceUpdate2);
            $iceUpdate3 = "update ices set icestock = icestock-1 WHERE icename = '$k3icep[0]'";
            $db->query($iceUpdate3);
            $iceUpdate4 = "update ices set icestock = icestock-1 WHERE icename = '$k4icep[0]'";
            $db->query($iceUpdate4);
            $iceUpdate5 = "update ices set icestock = icestock-1 WHERE icename = '$k5icep[0]'";
            $db->query($iceUpdate5);
            
            $iceUpdated1 = "update ices set icestock = icestock-1 WHERE icename = '$k1icep[1]'";
            $db->query($iceUpdated1);
            $iceUpdated2 = "update ices set icestock = icestock-1 WHERE icename = '$k2icep[1]'";
            $db->query($iceUpdated2);
            $iceUpdated3 = "update ices set icestock = icestock-1 WHERE icename = '$k3icep[1]'";
            $db->query($iceUpdated3);
            $iceUpdated4 = "update ices set icestock = icestock-1 WHERE icename = '$k4icep[1]'";
            $db->query($iceUpdated4);
            $iceUpdated5 = "update ices set icestock = icestock-1 WHERE icename = '$k5icep[1]'";
            $db->query($iceUpdated5);
            
            $iceUpdatet1 = "update ices set icestock = icestock-1 WHERE icename = '$k1icep[2]'";
            $db->query($iceUpdatet1);
            $iceUpdatet2 = "update ices set icestock = icestock-1 WHERE icename = '$k2icep[2]'";
            $db->query($iceUpdatet2);
            $iceUpdatet3 = "update ices set icestock = icestock-1 WHERE icename = '$k3icep[2]'";
            $db->query($iceUpdatet3);
            $iceUpdatet4 = "update ices set icestock = icestock-1 WHERE icename = '$k4icep[2]'";
            $db->query($iceUpdatet4);
            $iceUpdatet5 = "update ices set icestock = icestock-1 WHERE icename = '$k5icep[2]'";
            $db->query($iceUpdatet5);
            
            $cupUpdate1 = "update cups set cupstock = cupstock-1 WHERE cupname = '$k1cup'";
            $db->query($cupUpdate1);
            $cupUpdate2 = "update cups set cupstock = cupstock-1 WHERE cupname = '$k2cup'";
            $db->query($cupUpdate2);
            $cupUpdate3 = "update cups set cupstock = cupstock-1 WHERE cupname = '$k3cup'";
            $db->query($cupUpdate3);
            $cupUpdate4 = "update cups set cupstock = cupstock-1 WHERE cupname = '$k4cup'";
            $db->query($cupUpdate4);
            $cupUpdate5 = "update cups set cupstock = cupstock-1 WHERE cupname = '$k5cup'";
            $db->query($cupUpdate5);
            
            $insertEarning = "insert into earningses values('', $userid, '$date', '$total', '$recieved', '$balance');";
            $db->query($insertEarning);
            
            $earningsid = $db->query("select max(earningsid) as sda from earningses;");
            $resultEarningsId = $earningsid->fetch();
            $earningslastId = $resultEarningsId[0];
            
            $iceid1 = $db->query("select * from ices where icename = '$k1icep[0]'");
            $resultice1 = $iceid1->fetch();
            $resulticeid1 = $resultice1['iceid'];
            $iceid2 = $db->query("select * from ices where icename = '$k2icep[0]'");
            $resultice2 = $iceid2->fetch();
            $resulticeid2 = $resultice2['iceid'];
            $iceid3 = $db->query("select * from ices where icename = '$k3icep[0]'");
            $resultice3 = $iceid3->fetch();
            $resulticeid3 = $resultice3['iceid'];
            $iceid4 = $db->query("select * from ices where icename = '$k4icep[0]'");
            $resultice4 = $iceid4->fetch();
            $resulticeid4 = $resultice4['iceid'];
            $iceid5 = $db->query("select * from ices where icename = '$k5icep[0]'");
            $resultice5 = $iceid5->fetch();
            $resulticeid5 = $resultice5['iceid'];
            
            $iceidd1 = $db->query("select * from ices where icename = '$k1icep[1]'");
            $resulticedd1 = $iceidd1->fetch();
            $resulticeidd1 = $resulticedd1['iceid'];
            $iceidd2 = $db->query("select * from ices where icename = '$k2icep[1]'");
            $resulticedd2 = $iceidd2->fetch();
            $resulticeidd2 = $resulticedd2['iceid'];
            $iceidd3 = $db->query("select * from ices where icename = '$k3icep[1]'");
            $resulticedd3 = $iceidd3->fetch();
            $resulticeidd3 = $resulticedd3['iceid'];
            $iceidd4 = $db->query("select * from ices where icename = '$k4icep[1]'");
            $resulticedd4 = $iceidd4->fetch();
            $resulticeidd4 = $resulticedd4['iceid'];
            $iceidd5 = $db->query("select * from ices where icename = '$k5icep[1]'");
            $resulticedd5 = $iceidd5->fetch();
            $resulticeidd5 = $resulticedd5['iceid'];
            
            $iceidt1 = $db->query("select * from ices where icename = '$k1icep[2]'");
            $resulticet1 = $iceidt1->fetch();
            $resulticeidt1 = $resulticet1['iceid'];
            $iceidt2 = $db->query("select * from ices where icename = '$k2icep[2]'");
            $resulticet2 = $iceidt2->fetch();
            $resulticeidt2 = $resulticet2['iceid'];
            $iceidt3 = $db->query("select * from ices where icename = '$k3icep[2]'");
            $resulticet3 = $iceidt3->fetch();
            $resulticeidt3 = $resulticet3['iceid'];
            $iceidt4 = $db->query("select * from ices where icename = '$k4icep[2]'");
            $resulticet4 = $iceidt4->fetch();
            $resulticeidt4 = $resulticet4['iceid'];
            $iceidt5 = $db->query("select * from ices where icename = '$k5icep[2]'");
            $resulticet5 = $iceidt5->fetch();
            $resulticeidt5 = $resulticet5['iceid'];
            
            $cupid1 = $db->query("select * from cups where cupname = '$k1cup'");
            $resultcup1 = $cupid1->fetch();
            $resultcupid1 = $resultcup1['cupid'];
            $cupid2 = $db->query("select * from cups where cupname = '$k2cup'");
            $resultcup2 = $cupid2->fetch();
            $resultcupid2 = $resultcup2['cupid'];
            $cupid3 = $db->query("select * from cups where cupname = '$k3cup'");
            $resultcup3 = $cupid3->fetch();
            $resultcupid3 = $resultcup3['cupid'];
            $cupid4 = $db->query("select * from cups where cupname = '$k4cup'");
            $resultcup4 = $cupid4->fetch();
            $resultcupid4 = $resultcup4['cupid'];
            $cupid5 = $db->query("select * from cups where cupname = '$k5cup'");
            $resultcup5 = $cupid5->fetch();
            $resultcupid5 = $resultcup5['cupid'];
            if(empty($resulticeidd1)){
                $resulticeidd1 = "NULL";
            }
            if(empty($resulticeidt1)){
                $resulticeidt1 = "NULL";
            }
            if(empty($resulticeidd2)){
                $resulticeidd2 = "NULL";
            }
            if(empty($resulticeidt2)){
                $resulticeidt2 = "NULL";
            }
            if(empty($resulticeidd3)){
                $resulticeidd3 = "NULL";
            }
            if(empty($resulticeidt3)){
                $resulticeidt3 = "NULL";
            }
            if(empty($resulticeidd4)){
                $resulticeidd4 = "NULL";
            }
            if(empty($resulticeidt4)){
                $resulticeidt4 = "NULL";
            }
            if(empty($resulticeidd5)){
                $resulticeidd5 = "NULL";
            }
            if(empty($resulticeidt5)){
                $resulticeidt5 = "NULL";
            }
            $insertOrders1 = 
                "insert into orders values('', '$earningslastId', '$resulticeid1', '$resulticeidd1', '$resulticeidt1', '$resultcupid1', '$k1size', '$k1fee');";
            $db->query($insertOrders1);
            $insertOrders2 = 
                "insert into orders values('', '$earningslastId', '$resulticeid2', '$resulticeidd2', '$resulticeidt2', '$resultcupid2', '$k2size', '$k2fee');";
            $db->query($insertOrders2);
            $insertOrders3 = 
                "insert into orders values('', '$earningslastId', '$resulticeid3', '$resulticeidd3', '$resulticeidt3', '$resultcupid3', '$k3size', '$k3fee');";
            $db->query($insertOrders3);
            $insertOrders4 = 
                "insert into orders values('', '$earningslastId', '$resulticeid4', '$resulticeidd4', '$resulticeidt4', '$resultcupid4', '$k4size', '$k4fee');";
            $db->query($insertOrders4);
            $insertOrders5 = 
                "insert into orders values('', '$earningslastId', '$resulticeid5', '$resulticeidd5', '$resulticeidt5', '$resultcupid5', '$k5size', '$k5fee');";
            $db->query($insertOrders5);
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
           body{
                background:grey;
            }
            .title {
                width:500px;
                font-size: 32px;
                text-align : center;
                  color: #6cb4e4;
                  text-align: center;
                  padding: 0.25em;
                  border-top: solid 2px #6cb4e4;
                  border-bottom: solid 2px #6cb4e4;
                  background: -webkit-repeating-linear-gradient(-45deg, #f0f8ff, #f0f8ff 3px,#e9f4ff 3px, #e9f4ff 7px);
                  background: repeating-linear-gradient(-45deg, #f0f8ff, #f0f8ff 3px,#e9f4ff 3px, #e9f4ff 7px);
                  border: solid 3px #6091d3;/*線*/
                  border-radius: 10px;/*角の丸み*/
                  display: block;
                margin: 0 auto 0 auto;
            }
            .name{
                position: absolute;
                right: 0%; width: 40%; height: 100%; 
            }
            #click{
                position: absolute;
                left: 48%; width: 30%; height: 100%;                 
            }
            .textbox{
                  position: absolute;
                right: 45%; width: 40%; height: 100%; 
            }
            #button1{
            font-size: 50px;
              display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: red;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button2{
                font-size: 50px;
              display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: yellow;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button3{
                font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: lime;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button4{
            font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: green;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button5{
                font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: purple;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button6{
                font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: green;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button7{
            font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: navy;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button8{
                font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: blue;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
                
            }
            #button9{
            font-size: 50px;
                 display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: fuchsia;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button10{
            font-size: 50px;
            display: inline-block;
              text-decoration: none;
              background: #87befd;
              color: olive;
              width: 20%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
            #button11{
                color:crimson;
            font-size: 300%;
            display: inline-block;
              text-decoration: none;
              background: #87befd;
              width: 42%;
              height: 13%;
              line-height: 80%;
              border-radius: 50%;
              text-align: center;
              overflow: hidden;
              transition: .4s;
              border: none;
              outline: none;
            }
          h2 {
              position: relative;
              display: inline-block;
              background: #fa4141;     
              padding: 1rem 3rem;
              color: #fff;
              border-radius: 100vh;
                   
            }
            h2:before {
              position: absolute;
              top: calc(50% - 7px);
              left: 10px;
              width: 14px;
              height: 14px;
              content: '';
              border-radius: 50%;
              background: #fff;
            }  
            #text1{
            height: 10%;
            vertical-align: middle;
            }
            #text{
            height: 10%;
            vertical-align: middle;
            }
            #text2{
            height: 10%;
            vertical-align: middle;
            }
            #goukei{
                  background-image: -webkit-gradient(linear, right top, left top, from(#9be15d), to(#00e3ae));
              background-image: -webkit-linear-gradient(right, #9be15d 0%, #00e3ae 100%);
              background-image: linear-gradient(to left, #9be15d 0%, #00e3ae 100%);    
            }
             #uketori{
                  background-image: -webkit-gradient(linear, right top, left top, from(#9be15d), to(#00e3ae));
              background-image: -webkit-linear-gradient(right, #9be15d 0%, #00e3ae 100%);
              background-image: linear-gradient(to left, #9be15d 0%, #00e3ae 100%);    
            }
             #oturi{
                  background-image: -webkit-gradient(linear, right top, left top, from(#9be15d), to(#00e3ae));
              background-image: -webkit-linear-gradient(right, #9be15d 0%, #00e3ae 100%);
              background-image: linear-gradient(to left, #9be15d 0%, #00e3ae 100%);    
            }
        </style>
    </head>
    <body>
        <form method="post">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <h3 class="text-light">担当者：<?php echo $_SESSION['logeduser']['UserName']; ?></h3>
                <ul class="navbar-nav mr-auto"></ul>
                <span class="navbar-text">
                    <input type="submit" class="btn btn-secondary btn-lg" value="メニュー" name="menu">
                    <input type="submit" class="btn btn-secondary btn-lg" value="ログアウト" name="logout">
                </span>
            </nav>
        </form>
        <div class="title">お会計</div>
        <div class="kakoi">
            <div align="center" id="click">
                <input type="button" value=1 id="button1" onclick="edit(this)">
                <input type="button" value=2 id="button2" onclick="edit(this)">
                <input type="button" value=3 id="button3" onclick="edit(this)"><br>
                <input type="button" value=4 id="button4" onclick="edit(this)">
                <input type="button" value=5 id="button5" onclick="edit(this)">
                <input type="button" value=6 id="button6" onclick="edit(this)"><br>
                <input type="button" value=7 id="button7" onclick="edit(this)">
                <input type="button" value=8 id="button8" onclick="edit(this)">
                <input type="button" value=9 id="button9" onclick="edit(this)"><br>
                <input type="button" value=0 id="button10" onclick="edit(this)">
                <input type="button" value="C" id="button11" onclick="calc()">
            </div>
        </div>
        <form method="post" action="Money.php">
            <div align="center" class="textbox">
            <div class="goukei">
                <h2 id="goukei">合計金額</h2> <input type="text" id="text1" value="<?php echo $_SESSION['total']; ?>">
            </div>
            <div class="uketori">
                <h2 id="uketori">受取金額</h2> <input type="text" id="text" name="text">
            </div>
            <div class="oturi">
                <h2 id="oturi">おつり</h2> <input type="text" id="text2" name="text2">
            </div>
            <br><br><br><br>
            <div class="name">
            <button type="submit"　id="button1" onclick="rec()" name="toRec">
                <p>レシート</p>
            </button>
            </div>
        </form>
        <br><br><br>
        <script language="javascript" type="text/javascript">
            var result = document.getElementById("text");
            var sum1 = document.getElementById("text1");
            var change1 = document.getElementById("text2");
            function edit(elem){
                result.value = result.value + elem.value;
                change1.value = Number(result.value) - Number(sum1.value);
            }
            function calc(){
                result.value = "";
                change1.value = "";
            }
            
        </script>
        
    </body>
</html>