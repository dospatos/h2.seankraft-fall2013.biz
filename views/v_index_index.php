<h2>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h2>

<p>
    The site to help whitewater boaters connect and find out the only thing there is to know.

    <br/><br/>
    What's running and who's running it?


</p>

<?php if($user) { ?>
    <a href="/users">Find other boaters to follow!</a>

<?php } ?>