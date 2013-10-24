<?php
/*

*/
class utils_controller {
    public function __construct() {
        # there is nothing to do here yet, as the util constructor does not need a lot of fucntionality yet
    }
    public function profilepic($id) {
        if ((isset($id))) { //if ID is null show the user a generic image
            $id = DB::instance(DB_NAME)->sanitize($id);
        } else {
            $id = $this->user->user_id;
        }

        $current_user = siteutils::getuserprofile($id);

        header('Content-Type: image/jpeg');
        #header("Content-Disposition: attachment; filename=profilepic.jpg");
        echo get_image_data($current_user["profile_pic"]);

    }

}