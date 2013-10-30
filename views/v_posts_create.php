<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sean
 * Date: 10/8/13
 * Time: 8:19 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<h2>Create a New Post</h2>

<p>
    <form action='/posts/p_postsave' method="post">
        <p>
            <textarea cols='40' rows='5' name='post_text'></textarea>
        </p>
        <ul>
            <li>Hashtags mean rivers and creeks on this site, use underscore for spaces - as in #Beerkill_Creek</li>
        </ul>
        <input type="submit" value="Post"/>
    </form>
</p>