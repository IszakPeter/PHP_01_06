<?php 
require_once('sqlConection.php');
session_start();
if( isset( $_SESSION['user_id'])) {
        $conn=new MySqlConection('proba');
        $sql_tanulok="SELECT * FROM tanulo";
        $c=$conn->QueryAsoc($sql_tanulok);
        if(count($c)>0){
            $data="{\"tanulok\":[";
            $tanulok=array();
            foreach($c as $k=>$item){
                $tanulo="{\"id\":\"".$item['id']."\",\"nev\":\"".$item['nev']."\",\"szuletes\":\"".$item['szulDat']."\",\"cim\":\"".$item['cim']."\"}";
                array_push($tanulok,$tanulo);
            }  
            $data.=join(",",$tanulok);
            echo $data."]}";
        }
        else echo "{\"type\":\"warning\",\"header\":\"Adatok\",\"message\":\"nem találtam tanulot\",\"liveTime\":30}";
    }
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy ezt láthasd be kell jelentkezned\",\"liveTime\":30}";
?>


