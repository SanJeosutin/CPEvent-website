<?php
class API{
    /*
        *$arg_0 : url       [type: string]
        *$arg_1 : type      [type: string]
        *$arg_2 : data      [type: array]
    */

    static function makeRequest(){
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $connection = curl_init();
        curl_setopt($connection, CURLOPT_URL, $arg_0);
        if(!isset($arg_1)) return;
        
        switch ($arg_1){
            case 'QUERY':
                curl_setopt($connection, CURLOPT_POST, true);
                curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query($arg_2));
                break;
            
            case 'HEADER':
                curl_setopt($connection, CURLOPT_HTTPHEADER, $arg_2);
                break;
            
            default:
                return;
        }

        curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($connection);
        curl_close($connection);
        return json_decode($response);
    }
}
