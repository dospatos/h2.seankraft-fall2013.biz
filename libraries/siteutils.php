<?php

class siteutils {
    /*-------------------------------------------------------------------------------------------------
    Purpose: Remove any HTML tags that are posted
    Params: $data Array or String
    Returns: Array or String - escaped data

    Ex:
    $_POST = $utils->sanitize($_POST);
    -------------------------------------------------------------------------------------------------*/
    public static function clean_html($data) {

        if(is_array($data)){

            foreach($data as $k => $v){
                if(is_array($v)){
                    $data[$k] = strip_tags($v);
                } else {
                    $data[$k] = strip_tags($v);
                }
            }

        } else {
            $data = strip_tags($data);
        }

        return $data;
    }
}

?>