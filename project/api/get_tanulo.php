<?php 
require_once('sqlConection.php');
session_start();
if( isset( $_SESSION['user_id'])) {
        $dId=$_GET['diakId'];
        $conn=new MySqlConection('proba');
        $sql_tanulok="SELECT * FROM tanulo WHERE id=$dId" ;
        $c=$conn->QueryAsoc($sql_tanulok);
        if(count($c)==1){   
            $item=$c[0];        
                echo "{\"id\":\"".$item['id']."\",\"nev\":\"".$item['nev']."\",\"szuletes\":\"".$item['szulDat']."\",\"cim\":\"".$item['cim']."\",\"profile_pic\":\"".$item['pic']."\"}";
        }
        else echo "{\"type\":\"warning\",\"header\":\"Adatok\",\"message\":\"nem találtam tanulot\",\"liveTime\":30}";
    }
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy ezt láthasd be kell jelentkezned\",\"liveTime\":30}";
?>


