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
        $q = "SELECT user_id, first_name, last_name, email, location, profile_text, avatar
        FROM users
        WHERE user_id  = " . $id;

        return DB::instance(DB_NAME)->select_row($q);
    }

    public static function isuserbeingfollowed($followed_user_id, $user_id) {
        //figure out if we're already following the user
        $q = "SELECT 'Y' AS following FROM users_following WHERE followed_user_id=".$followed_user_id." AND user_id=".$user_id;
        $following = DB::instance(DB_NAME)->select_field($q);
        if ($following) {
            return true;
        }
        return false;
    }

}

?>