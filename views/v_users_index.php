<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sean
 * Date: 10/8/13
 * Time: 7:59 AM
 * To change this template use File | Settings | File Templates.
 */

?>

<div>Current Users (click name to follow):</div>
<?php if($user) { //this block displays the options for the logged-inn user?>
    <!--List of users to follow-->
    <?php foreach($users_list AS $currentuser) {
        if ($user->user_id != $currentuser["user_id"]) {
    ?>

            <div>
                <img src='/uploads/avatars/<?php echo $currentuser["avatar"] ?>' style='height:50px;width:50px' alt='profile picture'/>
                <a href="/users/profileview/<?php echo $currentuser['user_id'] ?>"><?php echo $currentuser['first_name'].' '.$currentuser['last_name'] ?></a>
                <?php if(isset($currentuser["following_user_id"])){echo " - following";} ?>
            </div>
        <?php }} ?>
<?php } else { //This block displays the public option ?>
    <h2>To view other users and to post you must have an account!</h2>
<?php } ?>

