<?php
if(isset($_POST['dot']))
{
$dot = $_POST['dot'];
$name = $_POST['name']; 
$email = $_POST['email'];
$economic =$_POST['cat_economic'];
$environmental = $_POST['cat_environmental'];
$social = $_POST['cat_social'];

include 'db.php';

$con = mysql_connect("localhost",$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);

$query = "INSERT INTO dots (dotText, dotName, dotEmail, dotEconomic, dotEnvironmental, dotSocial) VALUES ('". mysql_real_escape_string($dot) ."', '". mysql_real_escape_string($name) ."', '". mysql_real_escape_string($email) ."', '" . $economic ."', '" . $environmental . "', '" . $social . "');";

$result = mysql_query($query);
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}
mysql_free_result($result);

mysql_close($con);

}
else {
header('Location: http://dotoncampus.com/');

}

?>
