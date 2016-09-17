<?php
$dir = "../".$_POST["dir"];
$arrFiles = array();

if (file_exists($dir)){
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $nameFile = explode(".",$file);

                if((count($nameFile) > 1) && ($nameFile[1] == "sb" )){

                    array_push($arrFiles,  str_replace("../", "",$dir)."/".$file);
                }
            }
        }

        closedir($handle);
    }
}
echo json_encode($arrFiles, JSON_PRETTY_PRINT);

?>