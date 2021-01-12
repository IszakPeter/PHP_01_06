<?php 
require_once('sqlConection.php');
session_start();
if( isset( $_SESSION['user_id'])) {
    $conn=new MySqlConection('proba');
    $sql_jegyek="SELECT id, nev,  case  when szakmai=1 then \"Szakmai\" ELSE \"Általános\" END AS `type`  FROM tantargy; ";
    $c=$conn->QueryAsoc($sql_jegyek);
    if(count($c)>0){
        $data="{\"tantargyak\":[";
        $jegyek=array();
        foreach($c as $k=>$item){
            $jegy="{\"id\":\"".$item['id']."\",\"nev\":\"".$item['nev']."\",\"type\":\"".$item['type']."\"}";
            array_push($jegyek,$jegy);
        }  
        $data.=join(",",$jegyek);
        echo $data."]}";
    }
    else echo "{\"type\":\"warning\",\"header\":\"Adatok\",\"message\":\"nem találtam jegyet\",\"liveTime\":30}";
}
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy ezt láthasd be kell jelentkezned\",\"liveTime\":30}";
    
?>