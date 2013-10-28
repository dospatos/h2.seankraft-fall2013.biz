<?php
/**
 * Created by JetBrains PhpStorm.
 * User: skraft
 * Date: 10/15/13
 * Time: 3:42 PM
 * To change this template use File | Settings | File Templates.
 */
?>

<?php if (isset($_GET["updated"])) { ?>
    <div class="alerttext">You're now following this user!</div>
<?php } elseif($following) {?>
    <div class="alerttext">You're following this user!</div>
<?php } ?>

<form method='POST' action='/users/p_profilefollow/<?php echo $currentuser["user_id"] ?>'>
    <fieldset>
        <legend>Boater Profile</legend>
        <p>Name: <?php echo stripslashes($currentuser["first_name"]); ?> <?php echo stripslashes($currentuser["last_name"]) ?></p>
        <p>Email: <?php echo stripslashes($currentuser["email"]); ?></p>
        <p>Location: <?php echo stripslashes($currentuser["location"]); ?></p>
        <p>Description: <?php echo stripslashes($currentuser["profile_text"]); ?></p>
        <p>Profile picture: <img src='/uploads/avatars/<?php echo $currentuser["avatar"] ?>' style='height:200px;width:200px' alt='profile picture'/></p>
    </fieldset>

    <?php if(!$following) {//hide the follow button if we're following?>
        <input type='submit' value='Follow!'>
    <?php } ?>

</form>