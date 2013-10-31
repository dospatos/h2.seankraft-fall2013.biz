<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sean
 * Date: 10/8/13
 * Time: 8:00 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php if ($duplicate_username == true) { ?>
    <div class="alerttext">That email is already in use, try another!</div>
<?php }?>

<form method='POST' action='/users/p_signup'>

    First Name<br>
    <input type='text' name='first_name' value='<?php echo $duplicate_username ? $first_name : "" ?>'/>
    <br><br>

Last Name<br>
    <input type='text' name='last_name' value='<?php echo $duplicate_username ? $last_name : "" ?>'/>
    <br><br>

Email<br>
    <input type='text' name='email' value='<?php echo $duplicate_username ? $email : "" ?>' style='<?php echo $duplicate_username ? "color:red;" : "" ?>'/>
    <br><br>

Password<br>
    <input type='password' name='password'>
    <br><br>

    <input type='submit' value='Sign up'>

</form>