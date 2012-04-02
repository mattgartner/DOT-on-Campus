<?php

$db = "dev_dots";
$host = "localhost";
$username = "dev_dots";
$password = "dev_dots";

$cid = mysql_connect($host,$username,$password);	

$dotID        = $_POST['dotID'];

$insertdot  = "INSERT INTO spam SELECT * FROM dots WHERE dotID='$dotID';";
$deletequery1 = mysql_db_query($db,"$insertdot",$cid) or die(mysql_error());

$deletedot  = "DELETE FROM dots WHERE dotID='$dotID';";
$deletequery2 = mysql_db_query($db,"$deletedot",$cid) or die(mysql_error());

mysql_close($cid);

?>