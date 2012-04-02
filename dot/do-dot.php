<?php
if(isset($_GET['featured-dot']))
{
$featured_dot = $_GET['featured-dot'];
$featured_name = $_GET['featured-name']; 
$featured_email = $_GET['featured-email'];
$featured_economic = $_GET['featured-cat_economic'];
$featured_environmental = $_GET['featured-cat_environmental'];
$featured_social = $_GET['featured-cat_social'];
$featured_dotid = $_GET['featured-dotid'];

include 'db.php';

//$con = mysql_connect("localhost",$username,$password);
/*if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);*/

$link = mysqli_connect("localhost", $username, $password, $database);
if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }
  
$query = "INSERT INTO dots (dotText, dotName, dotEmail, dotEconomic, dotEnvironmental, dotSocial) VALUES ('". mysql_real_escape_string($featured_dot) ."', '". $featured_name ."', '". mysql_real_escape_string($featured_email) ."', '" . $featured_economic ."', '" . $featured_environmental . "', '" . $featured_social . "'); ";
	
$query .= "UPDATE featured SET dotCount = (dotCount + 1) WHERE dotID = '" . $featured_dotid ."';";

$result = mysqli_multi_query($link, $query);
//$result = mysql_query($query);
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
