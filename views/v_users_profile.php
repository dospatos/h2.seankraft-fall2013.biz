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

<form method='POST' action='/users/p_profileedit/<?php echo $user["user_id"] ?>'>

    First Name<br>
    <input type='text' name='first_name' value='<?php echo $user["first_name"] ?>'>
    <br><br>

    Last Name<br>
    <input type='text' name='last_name' value='<?php echo $user["last_name"] ?>'>
    <br><br>

    Email<br>
    <input type='text' name='email' value='<?php echo $user["email"] ?>'>
    <br><br>

    <br><br>

    <input type='submit' value='Update User'>

</form>