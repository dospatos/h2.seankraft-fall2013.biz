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
    <div class="alerttext">Profile was updated!</div>
<?php }?>

<form method='POST' action='/users/p_profileedit/<?php echo $currentuser["user_id"] ?>' enctype="multipart/form-data">
    <fieldset>
        <legend>Edit Profile: <?php echo $currentuser["first_name"] + $currentuser{"last_name"} ?></legend>

        <p>First Name<br>
            <input type='text' name='first_name' value='<?php echo $currentuser["first_name"] ?>'>
        </p>

        <p>
            Last Name<br>
            <input type='text' name='last_name' value='<?php echo $currentuser["last_name"]; ?>'>
        </p>
        <p>
            Email<br>
            <input type='text' name='email' value='<?php echo $currentuser["email"]; ?>'>
            <br>
        </p>
        <p>
            Location<br/>
            <input type='text' name='location' value='<?php echo $currentuser["location"]; ?>'
        </p>
        <br>
        <p>
            Describe what's important about yourself...<br/>
            <textarea cols='40' row='10' name='profile_text'><?php echo $currentuser["profile_text"]; ?></textarea>
        </p>
        <br/>
        <p>
            Choose a profile image
            <input name="profile_pic" accept="image/jpeg" type="file">
        <p>Current Profile picture: <img src='/uploads/avatars/<?php echo $currentuser["avatar"] ?>' style='height:200px;width:200px' alt='profile picture'/></p>
        </p>
        <br>

        <input type='submit' value='Update Profile'>
    </fieldset>
</form>