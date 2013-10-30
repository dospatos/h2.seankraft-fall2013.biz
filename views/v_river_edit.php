<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sean
 * Date: 10/30/13
 * Time: 8:31 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<form method='POST' action='/rivers/p_riversave<?php echo $currentriver["river_id"] ?>'>
    <fieldset>
        <legend>River Profile</legend>
        <p>Name: <?php echo stripslashes($currentriver["river_name"]); ?> </p>
    </fieldset>


    <input type='submit' value='Save River'>

</form>