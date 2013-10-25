<?php

class posts_controller extends base_controller {

    /*-------------------------------------------------------------------------------------------------

    -------------------------------------------------------------------------------------------------*/
    public function __construct() {
        parent::__construct();
    }

    /*-------------------------------------------------------------------------------------------------
    Accessed via http://localhost/posts/index
    Show a list of the latest posts
    -------------------------------------------------------------------------------------------------*/
    public function index() {

        # Any method that loads a view will commonly start with this
        # First, set the content of the template with a view file
        $this->template->content = View::instance('v_posts_index');

        $q = "SELECT  post_id, post_text, user_id
        FROM posts WHERE user_id=".$this->user->user_id." ORDER BY post_id DESC";


        $posts = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content->posts_list = $posts;

        # Now set the <title> tag
        $this->template->title = "Posts";

        # CSS/JS includes
        /*
        $client_files_head = Array("");
        $this->template->client_files_head = Utils::load_client_files($client_files);

        $client_files_body = Array("");
        $this->template->client_files_body = Utils::load_client_files($client_files_body);
        */

        # Render the view
        echo $this->template;
    } # End of method

    public function read($post_id) {
        echo "this is the read function";
    }

    public function create() {
        $this->template->content = View::instance('v_posts_create');

        # Now set the <title> tag
        $this->template->title = "Posts";

        # CSS/JS includes
        /*
        $client_files_head = Array("");
        $this->template->client_files_head = Utils::load_client_files($client_files);

        $client_files_body = Array("");
        $this->template->client_files_body = Utils::load_client_files($client_files_body);
        */

        # Render the view
        echo $this->template;
    }

    public function p_postsave () {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Save the post for the user
        $_POST['user_id'] = $this->user->user_id;

        $returned_id = DB::instance(DB_NAME)->insert('posts', $_POST);

        if(!$returned_id) {

        } else {
            Router::redirect("/posts?updated=true");
        }

    }

    public function delete ($post_id) {
        echo "this is the delete";
    }


} # End of class
