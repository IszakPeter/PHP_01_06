<?php
require_once('sqlConection.php');
require_once('print_o.php');
session_start();

if(isset($_POST['username'])||isset($_POST['password'])){
    if(isset($_POST['username'])&&isset($_POST['password'])){

    $conn=new MySqlConection('proba');
        $sql_login="SELECT * FROM admin WHERE `user` ='".$_POST['username']."' and psw ='".$_POST['password']."'" ;
        $c=$conn->QueryAsoc($sql_login);
        if (count($c)==1){
            $_SESSION["user_id"]=$c[0]['id'];
            $_SESSION["user_name"]=$c[0]['user'];
            echo "{\"name\":\"".$_SESSION["user_name"]."\" }";
        }
        else echo "{\"header\":\"Felhasználó\",\"type\":\"error\",\"message\":\"hibás felhasználó vagy jelszó\"}";
    }
    else echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"Ha nem küldesz el mindent mit vársz ?<br/>Mi vagyok? gondolat olvasó?\"}";
}
else{
        if( !isset( $_SESSION['user_id'])) echo "{\"type\":\"info\",\"header\":\"Felhasználó\",\"message\":\"nincs senki bejelentkezve\"}";
        else     echo "{\"name\":\"".$_SESSION["user_name"]."\" }";
}   

?>