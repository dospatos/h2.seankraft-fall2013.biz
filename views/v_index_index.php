<h2>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h2>

<p>
    The site to help whitewater boaters connect and find out the only thing there is to know.

    <br/>
    <p>What's running and who's running it?</p>
    <img src='/images/banner.png' alt='whitewater on the Beerkill' title='Jeff Piche on the Beerkill Creek'/>
    <h3>This site features</h3>
    <ul>
        <li>Support for user profiles</li>
        <li>Users can upload avatars</li>
        <li>Hashtags to identify rivers used in posts</li>
    </ul>

</p>

<?php if($user) { ?>
    <a href="/users">Find other boaters to follow!</a>
<?php } ?>