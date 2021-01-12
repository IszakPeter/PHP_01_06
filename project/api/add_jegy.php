<?php 
require_once('sqlConection.php');
$conn=new MySqlConection('proba');
session_start();
if( isset( $_SESSION['user_id'])) {
    if(isset($_POST['tanulo'])&&isset($_POST['tantargy'])&&isset($_POST['datum'])&&isset($_POST['jegy'])){
        $tanulo=$_POST['tanulo'];
        $tantargy=$_POST['tantargy'];
        $datum=$_POST['datum'];
        $jegy=$_POST['jegy'];
        $sql="INSERT INTO osztalyzat (tanuloID, tantargyID, datum, jegy) VALUES ( ".$tanulo.", ".$tantargy.", '".$datum."', ".$jegy.");";
        $res= $conn->NoQuery($sql);
        if($res === TRUE)
            echo "{\"type\":\"success\",\"header\":\"adato\",\"message\":\"sikerült felvenni\",\"liveTime\":30}";
        else 
            echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"nem sikerült felvenni\",\"liveTime\":30}";   
    }
    else echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"Ha nem küldesz el mindent mit vársz ?<br/>Mi vagyok? gondolat olvasó?\"}";
}
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy jegyet rögzíthes be kell jelentkezned\",\"liveTime\":30}";

?>