<?php

class users_controller extends base_controller {

    /*-------------------------------------------------------------------------------------------------

    -------------------------------------------------------------------------------------------------*/
    public function __construct() {
        parent::__construct();
    }

    /*-------------------------------------------------------------------------------------------------
    Accessed via http://localhost/index/index/
    -------------------------------------------------------------------------------------------------*/
    public function index() {

        # Any method that loads a view will commonly start with this
        # First, set the content of the template with a view file
        $this->template->content = View::instance('v_users_index');


        # Now set the <title> tag
        $this->template->title = "Users";


        $q = "SELECT user_id, first_name, last_name, email
        FROM users";


        $users = DB::instance(DB_NAME)->select_rows($q);

        $this->template->content->users_list = $users;

        # CSS/JS includes
        /*
        $client_files_head = Array("");
        $this->template->client_files_head = Utils::load_client_files($client_files);

        $client_files_body = Array("");
        $this->template->client_files_body = Utils::load_client_files($client_files_body);
        */

        # Render the view
        echo $this->template;
//echo "nice test";
    } # End of method

    public function profileedit($id = null) {

        if ((isset($id)) && ($this->user->user_id == $id)) { //users can only edit their own profile
            $id = DB::instance(DB_NAME)->sanitize($id);
        } else {
            $id = $this->user->user_id;
        }


        $q = "SELECT user_id, first_name, last_name, email, location, profile_text
        FROM users
        WHERE user_id  = " . $id;


        $current_user = DB::instance(DB_NAME)->select_row($q);

        $this->template->content = View::instance('v_users_profile');
        $this->template->content->current_user = $current_user;
        echo $this->template;

    }
    public function p_profileedit($id) {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $_POST['modified'] = Time::now();

        $returned_id = DB::instance(DB_NAME)->update('users', $_POST, 'where user_id ='.$id);

        if(!$returned_id) {


        } else {
            Router::redirect("/users/profileedit/".$id."?updated=true");
        }

    }

    public function profileview($id = null) {

        if ((isset($id))) { //users can only edit their own profile
            $id = DB::instance(DB_NAME)->sanitize($id);
        } else {
            $id = $this->user->user_id;
        }

        $q = "SELECT user_id, first_name, last_name, email, location, profile_text
        FROM users
        WHERE user_id  = " . $id;

        $user = DB::instance(DB_NAME)->select_row($q);

        $this->template->content = View::instance('v_profile_view');
        $this->template->content->current_user = $user;
        echo $this->template;

    }

    public function login($error = NULL , $new_user = false) {
        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Login";
        $this->template->content->error = $error;
        $this->template->content->new_user = isset($_GET['new_user']) ? $_GET['new_user'] : '';
        # Render template
        echo $this->template;
    }

    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token
        FROM users
        WHERE email = '".$_POST['email']."'
        AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't get a token back, it means login failed
        if(!$token) {

            # Send them back to the login page
            Router::redirect("/users/login/error");

            # But if we did, login succeeded!
        } else {

            /*
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/");

        }

    }

    public function signup() {
        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        # Render template
        echo $this->template;
    }

    public function p_signup() {

        # More data we want stored with the user
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Encrypt the password
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

        # For now, just confirm they've signed up -
        # You should eventually make a proper View for this
        Router::redirect("/users/login?new_user=".$_POST['email']);
    }

    public function logout() {

        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");

    }


} # End of class
