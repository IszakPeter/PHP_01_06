<?php
require_once('sqlConection.php');
$conn=new MySqlConection('proba');
session_start();
if(isset($_SESSION["user_id"])){
    if(isset($_GET['jegy_id'])){
        $jegy_id=$_GET['jegy_id'];
        $sql_torol="DELETE FROM osztalyzat WHERE id =".$jegy_id." LIMIT 1;";       
        $res= $conn->NoQuery($sql_torol);
        if($res === TRUE){
            echo "{\"type\":\"success\",\"header\":\"Adatok\",\"message\":\"sikerült tötrölni\",\"liveTime\":30}";
        }
        else echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"nem sikerült tötrölni\",\"liveTime\":30}";        
    }
    else echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"Ha nem küldesz el mindent mit vársz ?<br/>Mi vagyok? gondolat olvasó?\"}";

}
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy törölhes be kell jelentkezned\",\"liveTime\":30}";




?>