<?php 
require_once('sqlConection.php');
$conn=new MySqlConection('proba');
if(isset($_POST)){
    $jegyId=$_POST['jegyId'];
    $jegy=$_POST['jegy'];
    $datum="";
    if (isset($_POST['datum']))
        $datum= ", datum='". $_POST['datum']."'";  
    $sql="UPDATE osztalyzat SET  jegy = ".$jegy.$datum." WHERE `id`=".$jegyId.";";
    if($res === TRUE){
        echo "{'status':'siker','message':'Sikeresen frissítetted a jegyet!'}";
    }
    else{
        echo "{'status':'hiba','message':`".$res."`";
    }
}
?>