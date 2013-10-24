<?php

class siteutils {
    /*-------------------------------------------------------------------------------------------------
    Class contains any utils that need to be globally available
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

    public static function getuserprofile($id) {
        $q = "SELECT user_id, first_name, last_name, email, location, profile_text, profile_pic
        FROM users
        WHERE user_id  = " . $id;

        return DB::instance(DB_NAME)->select_row($q);
    }
}

?>