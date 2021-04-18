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
<?php
    $iceS = $db->query('select * from ices where enabled = 1');
    $iceB = $db->query('select * from ices where enabled = 1');

    if(isset($_POST['kass'])){
        $k1 = array ($_POST['k1size'], $_POST['k1ice'], $_POST['k1cup']);
        $k2 = array ($_POST['k2size'], $_POST['k2ice'], $_POST['k2cup']);
        $k3 = array ($_POST['k3size'], $_POST['k3ice'], $_POST['k3cup']);
        $k4 = array ($_POST['k4size'], $_POST['k4ice'], $_POST['k4cup']);
        $k5 = array ($_POST['k5size'], $_POST['k5ice'], $_POST['k5cup']);
        
        $total = array ($_POST['k1total'], $_POST['k2total'], $_POST['k3total'], $_POST['k4total'], $_POST['k5total']);
            
        $_SESSION['k1'] = $k1;
        $_SESSION['k2'] = $k2;
        $_SESSION['k3'] = $k3;
        $_SESSION['k4'] = $k4;
        $_SESSION['k5'] = $k5;
        
        $_SESSION['total'] = array_sum($total);
        
        $_SESSION['totaleach'] = ($total);
            
        header("location: Money.php");
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            input[type=text]{
                pointer-events: none;
                border: none;
                border-radius: 0px;
            }
        </style>
        <script>
            function sizeBtn1(){
                var size = document.getElementById("シングル").id;
                document.getElementById("sizeResult").value = size;
                document.getElementById("flavorResult").value = "";
                var iceFee = parseInt(280);
                document.getElementById("iceFee").value = iceFee;
            }
            function sizeBtn2(){
                var size = document.getElementById('ダブル').id;
                document.getElementById("sizeResult").value = size;
                document.getElementById("flavorResult").value = "";
                var iceFee = parseInt(380);
                document.getElementById("iceFee").value = iceFee;
            }
            function sizeBtn3(){
                var size = document.getElementById('トリプル').id;
                document.getElementById("sizeResult").value = size;
                document.getElementById("flavorResult").value = "";
                var iceFee = parseInt(520);
                document.getElementById("iceFee").value = iceFee;
            }
            
            <?php while($result = $iceS->fetch()){ ?>
            function ice<?php echo $result['iceid']; ?>(){
                var flavor = document.getElementById('<?php echo $result['icename']; ?>').id;
                var testflavor = document.getElementById("flavorResult").value;
                if(document.getElementById("sizeResult").value == "シングル"){
                    document.getElementById("flavorResult").value = flavor;
                    
                } else if(document.getElementById("sizeResult").value =="ダブル" && ( testflavor.match( /  /g ) || [] ).length <2){
                    document.getElementById("flavorResult").value += flavor + ("  ");
                    
                } else if(document.getElementById("sizeResult").value =="トリプル"  && ( testflavor.match( /  /g ) || [] ).length <3) {
                    document.getElementById("flavorResult").value += flavor + ("  ");
                    
                } else if(document.getElementById("sizeResult").value == ""){
                    alert("サイズを選択してください");
                }
            }
            <?php } ?>
            
            function cup1(){
                var cup = document.getElementById('コーン').id;
                document.getElementById('cupResult').value = cup;
                var cupFee = parseInt(0);
                document.getElementById("cupFee").value = cupFee;
            }
            function cup2(){
                var cup = document.getElementById('カップ').id;
                document.getElementById('cupResult').value = cup;
                var cupFee = parseInt(0);
                document.getElementById("cupFee").value = cupFee;
            }
            function cup3(){
                var cup = document.getElementById('ワッフルコーン').id;
                document.getElementById('cupResult').value = cup;
                var cupFee = parseInt(40);
                document.getElementById("cupFee").value = cupFee;
            }
            
            function insertKago1() {
                var testflavor = document.getElementById("flavorResult").value;
                if(document.getElementById("sizeResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("cupResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("flavorResult").value === ""){
                    alert("フレーバー選択してください")
                } else if(document.getElementById("sizeResult").value === "ダブル" && (testflavor.match( /  /g ) || [] ).length<2){
                    alert("フレーバー選択してください");
                } else if(document.getElementById("sizeResult").value === "トリプル" && (testflavor.match( /  /g ) || []).length<3){
                    alert("フレーバー選択してください");
                } else {
                    var iceFee = document.getElementById("iceFee").value;
                    var cupFee = document.getElementById("cupFee").value;
                    var totalFee = parseInt(iceFee) + parseInt(cupFee);
                    document.getElementById("kagoResult1_1").value = document.getElementById("sizeResult").value;
                    document.getElementById("kagoResult1_2").value = document.getElementById("flavorResult").value;
                    document.getElementById("kagoResult1_3").value = document.getElementById("cupResult").value;
                    document.getElementById("kagoResult1_4").value = totalFee;
                    document.getElementById("sizeResult").value = "";
                    document.getElementById("flavorResult").value = "";
                    document.getElementById("cupResult").value = "";
                    document.getElementById("iceFee").value = "";
                    document.getElementById("cupFee").value = "";
                    document.getElementById("kagoBtn1").style.display = "none";
                    document.getElementById("kagoDel1").style.display = "";
                    if(document.getElementById("kagoResult2_1").value === ""){
                        document.getElementById("kagoBtn2").style.display = "";
                    } else if(document.getElementById("kagoResult3_1").value === ""){
                        document.getElementById("kagoBtn3").style.display = "";
                    } else if(document.getElementById("kagoResult4_1").value === ""){
                        document.getElementById("kagoBtn4").style.display = "";
                    } else if(document.getElementById("kagoResult5_1").value === ""){
                        document.getElementById("kagoBtn5").style.display = "";value
                    }
                }
            }
            function insertKago2() {
                var testflavor = document.getElementById("flavorResult").value;
                if(document.getElementById("sizeResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("cupResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("flavorResult").value === ""){
                    alert("フレーバー選択してください")
                } else if(document.getElementById("sizeResult").value === "ダブル" && (testflavor.match( /  /g ) || [] ).length<2){
                    alert("フレーバー選択してください");
                } else if(document.getElementById("sizeResult").value === "トリプル" && (testflavor.match( /  /g ) || []).length<3){
                    alert("フレーバー選択してください");
                } else {
                    var iceFee = document.getElementById("iceFee").value;
                    var cupFee = document.getElementById("cupFee").value;
                    var totalFee = parseInt(iceFee) + parseInt(cupFee);
                    document.getElementById("kagoResult2_1").value = document.getElementById("sizeResult").value;
                    document.getElementById("kagoResult2_2").value = document.getElementById("flavorResult").value;
                    document.getElementById("kagoResult2_3").value = document.getElementById("cupResult").value;
                    document.getElementById("kagoResult2_4").value = totalFee;
                    document.getElementById("sizeResult").value = "";
                    document.getElementById("flavorResult").value = "";
                    document.getElementById("cupResult").value = "";
                    document.getElementById("iceFee").value = "";
                    document.getElementById("cupFee").value = "";
                    document.getElementById("kagoBtn2").style.display = "none";
                    document.getElementById("kagoDel2").style.display = "";
                    if(document.getElementById("kagoResult3_1").value === ""){
                        document.getElementById("kagoBtn3").style.display = "";
                    } else if(document.getElementById("kagoResult4_1").value === ""){
                        document.getElementById("kagoBtn4").style.display = "";
                    } else if(document.getElementById("kagoResult5_1").value === ""){
                        document.getElementById("kagoBtn5").style.display = "";
                    }
                }
            }
            function insertKago3() {
                var testflavor = document.getElementById("flavorResult").value;
                if(document.getElementById("sizeResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("cupResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("flavorResult").value === ""){
                    alert("フレーバー選択してください")
                } else if(document.getElementById("sizeResult").value === "ダブル" && (testflavor.match( /  /g ) || [] ).length<2){
                    alert("フレーバー選択してください");
                } else if(document.getElementById("sizeResult").value === "トリプル" && (testflavor.match( /  /g ) || []).length<3){
                    alert("フレーバー選択してください");
                } else {
                    var iceFee = document.getElementById("iceFee").value;
                    var cupFee = document.getElementById("cupFee").value;
                    var totalFee = parseInt(iceFee) + parseInt(cupFee);
                    document.getElementById("kagoResult3_1").value = document.getElementById("sizeResult").value;
                    document.getElementById("kagoResult3_2").value = document.getElementById("flavorResult").value;
                    document.getElementById("kagoResult3_3").value = document.getElementById("cupResult").value;
                    document.getElementById("kagoResult3_4").value = totalFee;
                    document.getElementById("sizeResult").value = "";
                    document.getElementById("flavorResult").value = "";
                    document.getElementById("cupResult").value = "";
                    document.getElementById("iceFee").value = "";
                    document.getElementById("cupFee").value = "";
                    document.getElementById("kagoBtn3").style.display = "none";
                    document.getElementById("kagoDel3").style.display = "";
                    if(document.getElementById("kagoResult4_1").value === ""){
                        document.getElementById("kagoBtn4").style.display = "";
                    } else if(document.getElementById("kagoResult5_1").value === ""){
                        document.getElementById("kagoBtn5").style.display = "";
                    }
                }
            }
            function insertKago4() {
                var testflavor = document.getElementById("flavorResult").value;
                if(document.getElementById("sizeResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("cupResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("flavorResult").value === ""){
                    alert("フレーバー選択してください")
                } else if(document.getElementById("sizeResult").value === "ダブル" && (testflavor.match( /  /g ) || [] ).length<2){
                    alert("フレーバー選択してください");
                } else if(document.getElementById("sizeResult").value === "トリプル" && (testflavor.match( /  /g ) || []).length<3){
                    alert("フレーバー選択してください");
                } else {
                    var iceFee = document.getElementById("iceFee").value;
                    var cupFee = document.getElementById("cupFee").value;
                    var totalFee = parseInt(iceFee) + parseInt(cupFee);
                    document.getElementById("kagoResult4_1").value = document.getElementById("sizeResult").value;
                    document.getElementById("kagoResult4_2").value = document.getElementById("flavorResult").value;
                    document.getElementById("kagoResult4_3").value = document.getElementById("cupResult").value;
                    document.getElementById("kagoResult4_4").value = totalFee;
                    document.getElementById("sizeResult").value = "";
                    document.getElementById("flavorResult").value = "";
                    document.getElementById("cupResult").value = "";
                    document.getElementById("iceFee").value = "";
                    document.getElementById("cupFee").value = "";
                    document.getElementById("kagoBtn4").style.display = "none";
                    document.getElementById("kagoDel4").style.display = "";
                    if(document.getElementById("kagoResult5_1").value === ""){
                        document.getElementById("kagoBtn5").style.display = "";
                    }
                }
            }
            function insertKago5() {
                var testflavor = document.getElementById("flavorResult").value;
                if(document.getElementById("sizeResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("cupResult").value === ""){
                    alert("全部選択されていません");
                } else if(document.getElementById("flavorResult").value === ""){
                    alert("フレーバー選択してください");
                } else if(document.getElementById("sizeResult").value === "ダブル" && (testflavor.match( /  /g ) || [] ).length<2){
                    alert("フレーバー選択してください");
                } else if(document.getElementById("sizeResult").value === "トリプル" && (testflavor.match( /  /g ) || []).length<3){
                    alert("フレーバー選択してください");
                } else {
                    var iceFee = document.getElementById("iceFee").value;
                    var cupFee = document.getElementById("cupFee").value;
                    var totalFee = parseInt(iceFee) + parseInt(cupFee);
                    document.getElementById("kagoResult5_1").value = document.getElementById("sizeResult").value;
                    document.getElementById("kagoResult5_2").value = document.getElementById("flavorResult").value;
                    document.getElementById("kagoResult5_3").value = document.getElementById("cupResult").value;
                    document.getElementById("kagoResult5_4").value = totalFee;
                    document.getElementById("sizeResult").value = "";
                    document.getElementById("flavorResult").value = "";
                    document.getElementById("cupResult").value = "";
                    document.getElementById("iceFee").value = "";
                    document.getElementById("cupFee").value = "";
                    document.getElementById("kagoBtn5").style.display = "none";
                    document.getElementById("kagoDel5").style.display = "";
                }
            }
            
            function kagoDelete1(){
                document.getElementById("kagoResult1_1").value = "";
                document.getElementById("kagoResult1_2").value = "";
                document.getElementById("kagoResult1_3").value = "";
                document.getElementById("kagoResult1_4").value = "";
                kagoBtn1.style.display = "";
                kagoBtn2.style.display = "none";
                kagoBtn3.style.display = "none";
                kagoBtn4.style.display = "none";
                kagoBtn5.style.display = "none";
                kagoDel1.style.display = "none";
            }
            function kagoDelete2(){
                document.getElementById("kagoResult2_1").value = "";
                document.getElementById("kagoResult2_2").value = "";
                document.getElementById("kagoResult2_3").value = "";
                document.getElementById("kagoResult2_4").value = "";
                kagoBtn1.style.display = "none";
                kagoBtn2.style.display = "";
                kagoBtn3.style.display = "none";
                kagoBtn4.style.display = "none";
                kagoBtn5.style.display = "none";
                kagoDel2.style.display = "none";
            }
            function kagoDelete3(){
                document.getElementById("kagoResult3_1").value = "";
                document.getElementById("kagoResult3_2").value = "";
                document.getElementById("kagoResult3_3").value = "";
                document.getElementById("kagoResult3_4").value = "";
                kagoBtn1.style.display = "none";
                kagoBtn2.style.display = "none";
                kagoBtn3.style.display = "";
                kagoBtn4.style.display = "none";
                kagoBtn5.style.display = "none";
                kagoDel3.style.display = "none";
            }
            function kagoDelete4(){
                document.getElementById("kagoResult4_1").value = "";
                document.getElementById("kagoResult4_2").value = "";
                document.getElementById("kagoResult4_3").value = "";
                document.getElementById("kagoResult4_4").value = "";
                kagoBtn1.style.display = "none";
                kagoBtn2.style.display = "none";
                kagoBtn3.style.display = "none";
                kagoBtn4.style.display = "";
                kagoBtn5.style.display = "none";
                kagoDel4.style.display = "none";
            }
            function kagoDelete5(){
                document.getElementById("kagoResult5_1").value = "";
                document.getElementById("kagoResult5_2").value = "";
                document.getElementById("kagoResult5_3").value = "";
                document.getElementById("kagoResult5_4").value = "";
                kagoBtn1.style.display = "none";
                kagoBtn2.style.display = "none";
                kagoBtn3.style.display = "none";
                kagoBtn4.style.display = "none";
                kagoBtn5.style.display = "";
                kagoDel5.style.display = "none";
            }
            
        </script>
    </head>
    <body>
        <form method="POST">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <h3 class="text-light">担当者：<?php echo $_SESSION['logeduser']['UserName']; ?></h3>
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
                <input type="submit" class="btn btn-secondary btn-lg" value="メンテナンス" name="master">
                <input type="submit" class="btn btn-secondary btn-lg" value="ログアウト" name="logout">
            </span>
        </nav>
        
        <div class="container mt-5 pb-5" style="background-color: grey;">
            <div class="row">
                <div class="col-md-4">
                    <div class="btn-group-vertical w-100 h-100">
                        <h3>サイズ選択覧</h3>
                        <input type="button" class="btn btn-primary" value="シングル￥２８０" name="size" id="シングル" onclick="sizeBtn1()">
                        <input type="button" class="btn btn-primary" value="ダブル￥３８０" name="size" id="ダブル" onclick="sizeBtn2()">
                        <input type="button" class="btn btn-primary" value="トリプル￥５２０" name="size" id="トリプル" onclick="sizeBtn3()">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group-vertical w-100 h-100">
                        <h3>フレーバー選択覧</h3>
                        <?php while($result = $iceB->fetch()){ ?>
                            <input type="button" value="<?php echo $result['icename'] ?>" class="btn btn-primary"
                            onclick="ice<?php echo $result['iceid']; ?>()"
                            id="<?php echo $result['icename'] ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group-vertical w-100 h-100">
                        <h3>容器選択覧</h3>
                        <input type="button" class="btn btn-primary" onclick="cup1()" value="コーン" id="コーン">
                        <input type="button" class="btn btn-primary" onclick="cup2()" value="カップ" id="カップ">
                        <input type="button" class="btn btn-primary" onclick="cup3()" value="ワッフルコーン+40¥" id="ワッフルコーン">
                    </div>
                </div>
            </div>
            <div class="container mt-4 text-center"><h2>選択済み商品</h2></div>
                <input type="text" class="col-md-2 form-control-lg" id="sizeResult"><label class="font-weight-bold h3">サイズ,</label>
                <input type="text" class="col-md-5 form-control-lg" id="flavorResult">
                <input type="text" class="col-md-2 form-control-lg" id="cupResult">
                <input type="hidden" class="col-md-2 form-control-lg" id="iceFee">
                <input type="hidden" class="col-md-2 form-control-lg" id="cupFee">
                <input type="button" value="Submit" class="btn btn btn-secondary btn-lg" onclick="insertKago1()" id="kagoBtn1">
                <input type="button" value="Submit" class="btn btn btn-secondary btn-lg" onclick="insertKago2()" id="kagoBtn2" style="display: none;">
                <input type="button" value="Submit" class="btn btn btn-secondary btn-lg" onclick="insertKago3()" id="kagoBtn3" style="display: none;">
                <input type="button" value="Submit" class="btn btn btn-secondary btn-lg" onclick="insertKago4()" id="kagoBtn4" style="display: none;">
                <input type="button" value="Submit" class="btn btn btn-secondary btn-lg" onclick="insertKago5()" id="kagoBtn5" style="display: none;">
            <div class="container mt-5 text-center"><h2>かご</h2></div>
            <div class="container w-75">
                <div class="row">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult1_1" name="k1size">
                    <input type="text" class="col-md-5 form-control-lg" id="kagoResult1_2" name="k1ice">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult1_3" name="k1cup">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult1_4" name="k1total">
                    <input type="button" class="btn btn-danger col-md-1" id="kagoDel1" style="display: none;" onclick="kagoDelete1()" value="削除">
                </div>
                <div class="row">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult2_1" name="k2size">
                    <input type="text" class="col-md-5 form-control-lg" id="kagoResult2_2" name="k2ice">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult2_3" name="k2cup">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult2_4" name="k2total">
                    <input type="button" class="btn btn-danger col-md-1" id="kagoDel2" style="display: none;" onclick="kagoDelete2()" value="削除">
                </div>
                <div class="row">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult3_1" name="k3size">
                    <input type="text" class="col-md-5 form-control-lg" id="kagoResult3_2" name="k3ice">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult3_3" name="k3cup">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult3_4" name="k3total">
                    <input type="button" class="btn btn-danger col-md-1" id="kagoDel3" style="display: none;" onclick="kagoDelete3()" value="削除">
                </div>
                <div class="row">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult4_1" name="k4size">
                    <input type="text" class="col-md-5 form-control-lg" id="kagoResult4_2" name="k4ice">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult4_3" name="k4cup">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult4_4" name="k4total">
                    <input type="button" class="btn btn-danger col-md-1" id="kagoDel4" style="display: none;" onclick="kagoDelete4()" value="削除">
                </div>
                <div class="row">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult5_1" name="k5size">
                    <input type="text" class="col-md-5 form-control-lg" id="kagoResult5_2" name="k5ice">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult5_3" name="k5cup">
                    <input type="text" class="col-md-2 form-control-lg" id="kagoResult5_4" name="k5total">
                    <input type="button" class="btn btn-danger col-md-1" id="kagoDel5" style="display: none;" onclick="kagoDelete5()" value="削除">
                </div>
                <div class="row mt-3">
                    <input type="submit" class="btn btn-success col-md-11" name="kass" value="お会計">
                </div>
            </div>
        </div>
        </form>
    </body>
</html>