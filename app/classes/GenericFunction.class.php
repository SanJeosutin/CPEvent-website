<?php

class GenericFunction{

    static function uploadData($name){
        $errMsg = array();
        $allowedTypes = ["jpg", "jpeg", "png"];

        $fileName = basename($_FILES[$name]['name']);
        $targetDir = "./files/temp_Photos/";
        $targetFile = $targetDir . $fileName;
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        $fileSize = $_FILES[$name]['size'];
        $tempFile = $_FILES[$name]['tmp_name'];

        $isUploaded = move_uploaded_file($tempFile, $targetFile);
            
        if($isUploaded){
            return $targetFile;
        }
    }

    static function sanitiseInput($data){
        $input = trim($data);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}

?>