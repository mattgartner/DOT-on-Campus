<?php
if(isset($_GET['dot']))
{
$submit_featured_dot = $_GET['dot'];
$submit_featured_economic =$_GET['cat_economic'];
$submit_featured_environmental = $_GET['cat_environmental'];
$submit_featured_social = $_GET['cat_social'];
$submit_featured_impact = $_GET['dot-impact'];
$submit_featured_impact_tweet = $_GET['dot-impact-tweet'];

include 'db.php';

$con = mysql_connect("localhost",$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);

$query = "INSERT INTO featured (dotText, dotEconomic, dotEnvironmental, dotSocial, dotImpact, dotImpactTweet) VALUES ('". mysql_real_escape_string($submit_featured_dot) ."', '" . $submit_featured_economic ."', '" . $submit_featured_environmental . "', '" . $submit_featured_social . "', '" . mysql_real_escape_string($submit_featured_impact) . "', '" . mysql_real_escape_string($submit_featured_impact_tweet) . "');";

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
