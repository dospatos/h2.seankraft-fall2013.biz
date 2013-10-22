<?php
/**
 * Created by JetBrains PhpStorm.
 * User: skraft
 * Date: 10/15/13
 * Time: 3:42 PM
 * To change this template use File | Settings | File Templates.
 */
?>


<form method='POST' action='/users/p_profilefollow/<?php echo $current_user["user_id"] ?>'>
    <fieldset>
        <legend>Boater Profile</legend>
        <p>Name: <?php echo $current_user["first_name"]; ?> <?php echo $current_user["last_name"] ?></p>
        <p>Email: <?php echo $current_user["email"]; ?></p>
        <p>Location: <?php echo $current_user["location"]; ?></p>
        <p>Description: <?php echo $current_user["profile_text"]; ?></p>
    </fieldset>


    <input type='submit' value='Follow!'>

</form>