<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sean
 * Date: 10/8/13
 * Time: 8:18 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<h2>Posts</h2>

<?php if (isset($_GET["updated"])) { ?>
    <div class="alerttext">Post was saved!</div>
<?php }?>

<p>
    <a href="posts/create">Create New Post</a>
</p>

<p>Your most recent posts</p>
<?php foreach($my_posts_list AS $currentpost) { ?>
        <div class='postframe'>
            <?php
            $post_text = siteutils::linkriverhashtags(stripslashes($currentpost['post_text']));
            echo $post_text;
            ?>
        </div>
<?php } ?>

<br/>
<p>Posts from boaters you're following</p>
<?php foreach($followed_posts_list AS $currentpost) { ?>
    <div class='postframe'>
        <?php
            echo '<span style="color:red">'.stripslashes($currentpost['first_name']).' '.stripslashes($currentpost['last_name'].':</span> ');
            $post_text = siteutils::linkriverhashtags(stripslashes($currentpost['post_text']));
            echo $post_text;

        ?>
    </div>
<?php } ?>

