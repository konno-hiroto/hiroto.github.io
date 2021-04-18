<?php
ob_start();
?>
<?php include ("file/db_conn.php"); ?>
<?php
    if(isset($_POST['login'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        if(empty($userid)) {
            echo "<script>alert('IDを入力してください！');</script>";
        } else if(!filter_var($userid, FILTER_VALIDATE_INT)){
            echo "<script>alert('IDは数字のみにしてください！');</script>";
        } else if(empty($password)){
            echo "<script>alert('パスワードを入力してください！');</script>";
        } else {
            $login = $db->query("select * from users where userid = $userid and password = '$password';");
            $loginResult = $login->fetch();
            if($loginResult == null || $loginResult['enabled'] == 0){
                echo "<script>alert('IDまたはパスワードが違います!');</script>";
            } else {
                header('location: Menu.php');
                $_SESSION['logeduser'] = $loginResult;
            }
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <style>
        .img_area img{
            display:block;
            margin-left:auto;
            margin-right:auto;
        }
    </style>
    <body>
    <div class="img_area">
        <img src="ice1.png" class="sample" alt="いい">
        </div>
        <div class="container w-50 mt-5">
            <div class="container w-75">
                <h1 class="display-4 text-center font-weight-normal">ログイン画面</h1>
                <form method="post" action="Log.php" class="was-validated">
                    <div class="form-group mt-5">
                        <label class="font-weight-light h3">ユーザーID：</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Enter username" name="userid" maxlength="10" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-light h3">パスワード：</label>
                        <input type="password" class="form-control form-control-lg" placeholder="Enter password" name="password" maxlength="10" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group form-check"></div>
                    <input type="submit" name="login" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
        
    </body>
</html>