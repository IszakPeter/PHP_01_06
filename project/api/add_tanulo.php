<?php 
require_once('sqlConection.php');
$conn=new MySqlConection('proba');
session_start();
if( isset( $_SESSION['user_id'])) {
    if(isset($_POST['nev'])&&isset($_POST['szulDat'])&&isset($_POST['cim'])){
        $nev=$_POST['nev'];
        $szulDat=$_POST['szulDat'];
        $cim=$_POST['cim'];
        $sql="INSERT INTO tanulo  VALUES (null,'".$nev."', '".$szulDat."', '".$cim."');";
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