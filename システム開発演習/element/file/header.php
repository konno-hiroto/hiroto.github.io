<?php
ob_start();
?>
<style>
    header.header{
        position: absolute; left: 0; right: 0; top: 0; width: 100%; height: 10%; box-shadow: 0px 0px 5px 2px grey;
        background-image: linear-gradient(grey, white);
    }
    header.header_aux{
        width: 100%; height: 10%;
    }
    div.header_staff{
        position: absolute; height: 100%; width: 15%; left: 1%; top: 50%; transform: translate(0%, -50%);
        text-align: center;
    }
    div.header_left{
        position: absolute; height: 100%; width: 10%; left: 1%; top: 50%; transform: translate(0%, -50%);
    }
    div.header_right{
        position: absolute; height: 100%; width: 10%; right: 1%; top: 50%; transform: translate(0%, -50%);
    }
    div.header_2right{
        position: absolute; height: 100%; width: 10%; right: 12%; top: 50%; transform: translate(0%, -50%);
    }
    button.botan{
        position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        width: 90%; height: 60%; border-radius: 15px;
        border-color: grey; color: #404040; 
        font-size: 14px; font-weight: bold;
    }
    button.botan:hover{
        background-color: grey; color: white; transition: 0.5s;
    }
</style>
<?php
if(isset($_POST["backMenuBtn"])){
    header("Location: Menu.php");
}
if(isset($_POST["logoutBtn"])){
    session_unset();
    header("Location: Log.php");
}
if(isset($_POST["mentenansuBtn"])){
    header("Location: Master.php");
}
if(isset($_POST["backItemBtn"])){
    header("Location: Item.php");
}
if(isset($_POST["backUserBtn"])){
    header("Location: User.php");
}
if(isset($_POST["backRecBtn"])){
    header("Location: Reciept.php");
}
?>
<form method="post">
    <header class="header_aux"></header>
    <header class="header">
        <div class="header_right">
            <button class="botan" type="submit" name="logoutBtn">ログアウト</button>
        </div>
        <?php
            if(basename($_SERVER['PHP_SELF']) == 'Menu.php' || basename($_SERVER['PHP_SELF']) == 'Menu.php') { 
        ?>
                <div class="header_staff">
                    <?php echo "担当者：".$_SESSION['logeduser']['UserName']; ?>
                </div>
                <?php if($_SESSION['logeduser']['Authority'] == 1){ ?>
                    <div class="header_2right">
                        <button class="botan" type="submit" name="mentenansuBtn">メンテナンス</button>
                    </div>
                <?php } ?>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'Money.php' || basename($_SERVER['PHP_SELF']) == 'Money.php') {
        ?>
                <div class="header_staff">
                    <?php echo "担当者：".$_SESSION['logeduser']['UserName']; ?>
                </div>
                <div class="header_2right">
                    <button class="botan" type="submit" name="backMenuBtn">メニュー</button>
                </div>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'Rec.php' || basename($_SERVER['PHP_SELF']) == 'Rec.php') {
        ?>
                <div class="header_staff">
                    <?php echo "担当者：".$_SESSION['logeduser']['UserName']; ?>
                </div>
                <div class="header_2right">
                    <button class="botan" type="submit" name="backMenuBtn">メニュー</button>
                </div>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'Master.php' || basename($_SERVER['PHP_SELF']) == 'Master.php') {
        ?>
                <div class="header_left">
                    <button class="botan" type="submit" name="backMenuBtn">メニュー</button>
                </div>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'Item.php' || basename($_SERVER['PHP_SELF']) == 'Item.php' || basename($_SERVER['PHP_SELF']) == 'Reciept.php' || basename($_SERVER['PHP_SELF']) == 'Reciept.php' || basename($_SERVER['PHP_SELF']) == 'User.php' || basename($_SERVER['PHP_SELF']) == 'User.php') {
        ?>
                <div class="header_left">
                    <button class="botan" type="submit" name="backMenuBtn">ホーム</button>
                </div>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'UserDetail.php' || basename($_SERVER['PHP_SELF']) == 'UserDetail.php' ||
            basename($_SERVER['PHP_SELF']) == 'UserRegister.php' || basename($_SERVER['PHP_SELF']) == 'UserRegister.php') {
        ?>
                <div class="header_left">
                    <button class="botan" type="submit" name="backUserBtn">戻る</button>
                </div>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'ItemDetail.php' || basename($_SERVER['PHP_SELF']) == 'ItemDetail.php' || basename($_SERVER['PHP_SELF']) == 'ItemRegister.php' || basename($_SERVER['PHP_SELF']) == 'ItemRegister.php') {
        ?>
                <div class="header_left">
                    <button class="botan" type="submit" name="backItemBtn">戻る</button>
                </div>

        <?php
            } else if(basename($_SERVER['PHP_SELF']) == 'ReciptMonth.php' || basename($_SERVER['PHP_SELF']) == 'ReciptMonth.php' || basename($_SERVER['PHP_SELF']) == 'ReciptProduct.php' || basename($_SERVER['PHP_SELF']) == 'ReciptProduct.php') {
        ?>
                <div class="header_left">
                    <button class="botan" type="submit" name="backRecBtn">戻る</button>
                </div>
        <?php
            }
        ?>
    </header>
</form>