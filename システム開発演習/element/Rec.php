<?php
ob_start();
?>
<?php session_start(); ?>
<?php
    if(isset($_POST["logout"])){
        session_unset();
        header("Location: Log.php");
    }
    if(isset($_POST["menu"])){
        header("Location: Menu.php");
    }
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body>
        <form method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3>担当者：<?php echo $_SESSION['logeduser']['UserName']; ?></h3>
            <ul class="navbar-nav mr-auto"></ul>
            <span class="navbar-text">
                <input type="submit" class="btn btn-secondary btn-lg" value="メニュー" name="menu">
                <input type="submit" class="btn btn-secondary btn-lg" value="ログアウト" name="logout">
            </span>
        </nav>
        </form>
        <?php
        echo "<center>";
        echo "合計金額：".$_SESSION['total']."<br>";
        echo "受取金額：".$_SESSION['text']."<br>";
        echo "おつり：".$_SESSION['text2']."<br>";
        echo "受付日時：".date("m/d/Y")."<br>";
        echo "</center>";
        ?>
    </body>
</html>
