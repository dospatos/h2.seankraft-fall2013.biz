<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sean
 * Date: 10/30/13
 * Time: 8:31 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<h2>Edit River</h2>
<?php if (isset($_GET["updated"])) { ?>
    <div class="alerttext">River was updated!</div>
<?php }?>

<form method='POST' action='/rivers/p_riversave/<?php echo $currentriver["river_id"] ?>'>
    <fieldset>
        <legend>River Profile</legend>
        <p>River Name<br>
            <input type='text' name='river_name' value='<?php echo stripslashes($currentriver["river_name"]) ?>'>
        </p>
        <p>River Class<br>
            <input type='text' name='river_class' value='<?php echo stripslashes($currentriver["river_class"]) ?>'>
        </p>
        <p>Description<br>
            <textarea cols='40' row='10' name='descr'><?php echo stripslashes($currentriver["descr"]) ?></textarea>
        </p>
        <p>GPS Coordinates of put-in<br>
            <input type='text' name='gps_coordinates_putin' value='<?php echo stripslashes($currentriver["gps_coordinates_putin"]) ?>'>
        </p>
        <p>GPS Coordinates of take-out<br>
            <input type='text' name='gps_coordinates_takeout' value='<?php echo stripslashes($currentriver["gps_coordinates_takeout"]) ?>'>
        </p>
        <p>
            <?php if (isset($currentriver["gps_coordinates_putin"]) && isset($currentriver["gps_coordinates_putin"])) { //show the link if we have it?>
                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=<?php echo $currentriver["gps_coordinates_putin"] ?>&amp;daddr=<?php echo $currentriver["gps_coordinates_takeout"] ?>&amp;num=1&amp;t=h&amp;gl=us&amp;ie=UTF8&amp;z=12&amp;iwloc=near&amp;output=embed"></iframe>
                        <br /><small><a target="_new" href="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=<?php echo $currentriver["gps_coordinates_putin"] ?>&amp;daddr=<?php echo $currentriver["gps_coordinates_takeout"] ?>&amp;num=1&amp;t=h&amp;gl=us&amp;ie=UTF8&amp;z=12&amp;iwloc=near&amp;output=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
            <?php } ?>
        </p>
        <!--https://maps.google.com/?saddr=41.511901,-73.949179&daddr=41.506283,-73.955949-->
        <p>American Whitewater River ID<br>
            <input type='text' name='aw_river_id' value='<?php echo stripslashes($currentriver["aw_river_id"]) ?>'>
            <?php if (isset($currentriver["aw_river_id"])) { //show the link if we have it?>
                <a href='http://www.americanwhitewater.org/content/River/detail/id/<?php echo stripslashes($currentriver["aw_river_id"]) ?>' target="_new">View river on American Whitewater</a>
            <?php } ?>
        </p>
    </fieldset>

    <input type='submit' value='Save River'>

</form>