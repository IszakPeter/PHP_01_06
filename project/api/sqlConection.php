
<?php

class MySqlConection {
    public $conection;
    public function  __construct($database="",$password = "",$host = "localhost",  $username = "root" ) {
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error){ die("Connection failed: " . $conn->connect_error); }
        else
            $this->conection=$conn;
    }
    public  function QueryAsoc($sql){
        $result=$this->conection->query($sql);
        if($this->conection->errno)
            return  $this->conection->error;
        else {
            while($results[] = $result->fetch_assoc());
            unset($results[count($results)-1]);
            return $results;
        }
    }
    public  function QueryNum($sql){
        $result=$this->conection->query($sql);
        if($this->conection->errno)
            return  $this->conection->error;
        else {
            while ($results[] = $result->fetch_array(MYSQLI_NUM)) ;
            unset($results[count($results) - 1]);
            return array_values($results);
        }
    }

    public  function  NoQuery($sql){
        if ($this->conection->query($sql) === TRUE) {
            return TRUE;
        } else {
            return  "[".$sql . "]-->" . $this->conection->error;
                    
        }
    }
}
 

?>