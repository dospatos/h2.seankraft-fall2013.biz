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

    public function edit ($post_id) {
        echo "this is the edit";
    }

    public function delete ($post_id) {
        echo "this is the delete";
    }


} # End of class
