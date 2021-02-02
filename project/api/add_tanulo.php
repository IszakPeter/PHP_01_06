<?php 
require_once('sqlConection.php');
require_once('feltolto_fuggvenyek.php');
$conn=new MySqlConection('proba');
session_start();
if( isset( $_SESSION['user_id'])) {
    if(isset($_POST['nev'])&&isset($_POST['szulDat'])&&isset($_POST['cim'])){
        $nev=$_POST['nev'];
        $szulDat=$_POST['szulDat'];
        $cim=$_POST['cim'];
        $picfile=tofilename($nev.$szulDat) ;
        $res=FALSE;
      //  http://10.1.1.13/project/root/prof_pic/dsfds2021-02-03.jpeg
        if(Kep_feltolt($_FILES,"../root/prof_pic",$picfile,'profil')){
            $picfile= str_replace("../root/",'',$picfile);
            $sql="INSERT INTO tanulo  VALUES (null,'".$nev."', '".$szulDat."', '".$cim."','$picfile');";
            $res= $conn->NoQuery($sql);
        }
        if($res === TRUE)
            echo "{\"type\":\"success\",\"header\":\"Adatok\",\"message\":\"sikerült felvenni\",\"liveTime\":30}";
        else 
            echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"nem sikerült felvenni\",\"liveTime\":30}";   
    }
    else echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"Ha nem küldesz el mindent mit vársz ?<br/>Mi vagyok? gondolat olvasó?\"}";
}
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy jegyet rögzíthes be kell jelentkezned\",\"liveTime\":30}";
?>