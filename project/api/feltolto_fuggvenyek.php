<?php
        function toFilename($s){
            return preg_replace('/[^A-Za-z0-9\-]/', '', $s); 
        }

const errors= array(
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);
function Fajl_feltolt($files,$target_dir,$file_field){
    $file=$files[$file_field];
    if($file['error']>0){
        echo "Hiba: ".errors[$file['error']];
        return false;
    }
    else{
        $target_dir=$target_dir."/".$file['name'];
        if(is_uploaded_file($file["tmp_name"])){
            if(move_uploaded_file($file["tmp_name"],$target_dir)){
                echo"minden ok";
                return true;
            }
        }
        else echo "csak okosan ezzel a valamivel:".$file['name'];
    }
    return false;
}
function Kep_feltolt($files,$target_dir,&$target_filename,$file_field){
    $file=$files[$file_field];
    if($file['error']>0){
        //echo "Hiba: ".errors[$file['error']];
        return false;
    }
    else{
        $ch=getimagesize($file['tmp_name']);
        if($ch!==false){
            $type= strtolower($ch["mime"]);
            if($type=="image/jpeg"||$type=="image/png"||$type=="image/gif"||$type=="image/jpg"){
                $target=$target_dir."/".$target_filename.".".explode("/",$type)[1];

                if(is_uploaded_file($file["tmp_name"])){
                    if(move_uploaded_file($file["tmp_name"],$target)){
                        //echo"minden ok";
                        $target_filename=  $target;
                        return TRUE;
                    }
                }
                else echo "csak okosan ezzel a valamivel:".$file['name'];
            }
            else echo" ezeket támogatom: jpeg, png, gif, jpg"; 
        }
        else echo "ez nem kép";

      }
    return false;
}

?>