<?php
/**
 * Created by JetBrains PhpStorm.
 * User: skraft
 * Date: 10/24/13
 * Time: 1:51 PM
 * To change this template use File | Settings | File Templates.
 */

header('Content-Type: image/jpeg');
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("h2_seankraft-fall2013_biz") or die(mysql_error());
$data = mysql_query("SELECT profile_pic from users where user_id = ".$_GET["ID"])
or die(mysql_error());
while($info = mysql_fetch_array( $data ))
{
    $picdata = $info['profile_pic'];
    if ($picdata != null) {
        echo $picdata;
    } else {echo "This is shit";}
}


?>