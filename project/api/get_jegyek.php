<?php 
require_once('sqlConection.php');
session_start();
if( isset( $_SESSION['user_id'])) {
        $conn=new MySqlConection('proba');
        if(isset($_GET['tanulo']) ){
            $tanulo=$_GET['tanulo'];
            $tantargy_sql="";
            if( isset($_GET['tantargy'])){
                $tantargy_sql= " and tantargyID=". $_GET['tantargy'];
            }
            $sql_jegyek="SELECT osztalyzat.id, tanulo.nev as tanulo, datum, tantargy.nev as tantargy, jegy  FROM osztalyzat INNER JOIN tanulo ON osztalyzat.tanuloID=tanulo.id INNER JOIN tantargy ON osztalyzat.tantargyID=tantargy.id where tanuloID=".$tanulo ." ". $tantargy_sql;
            $c=$conn->QueryAsoc($sql_jegyek);
            if(count($c)>0){
                $data="{\"nev\":\"".$c[0]['tanulo']."\",\"jegyei\":[";
                $jegyek=array();
                foreach($c as $k=>$item){
                    $jegy="{\"id\":".$item['id'].",\"datum\":\"".$item['datum']."\",\"jegy\":".$item['jegy'].",\"tantargy\":\"".$item['tantargy']."\"}";
                    array_push($jegyek,$jegy);
                }  
                $data.=join(",",$jegyek);
                echo $data."]}";
            }
            else echo "{\"type\":\"warning\",\"header\":\"Adatok\",\"message\":\"Nem találtam jegyet\",\"liveTime\":30}";
        }
        else echo "{\"type\":\"error\",\"header\":\"Adatok\",\"message\":\"Ha nem küldesz el mindent mit vársz ?<br/>Mi vagyok? gondolat olvasó?\"}";
    }
else echo "{\"type\":\"warning\",\"header\":\"Felhasználó\",\"message\":\"Hogy ezt láthasd be kell jelentkezned\",\"liveTime\":30}";

?>