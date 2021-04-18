<?php 
session_start();
try{
    $db = new PDO('mysql:host=localhost; dbname=icecreamproject', 'root', 'admin');
}catch(PDOException $e){
    echo "<script>alert('connection failed');</script>";
    echo "<div class='alert alert-danger'>データベース接続できません！</div>";
}
?>