<?php
/**
 * Template Name: Recent DOTs
 * Description: 
 *
 * @package WordPress
 */
get_header(); 

?>	
				<h5 class="heading top">Recent DOTs</h5>
	<?php 
include 'db.php';

$con = mysql_connect("localhost",$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);



?>
<script type="text/javascript">
  twttr.anywhere(function (T) {
    T("#tbox").tweetBox();
  });
</script>
		<script type="text/javascript">
jQuery(document).ready(function(){  
   jQuery("#recentdots").jPaginate({
   	items: 10,
   	next: "Next",
     previous: "Previous",
     active: "active",
     pagination_class: "pagination",
     minimize: false,
     nav_items: 6,
	cookies: true
   	}); 
    });  
</script>
<div id="recentdots">

			<?php
$recentdots = mysql_query("SELECT * FROM dots ORDER BY dotID desc LIMIT 0 , 100;");

while($row = mysql_fetch_array($recentdots))
  {
  echo "<div class='dot-wrap' id='dot-" . $row['dotID'] . "'>";
    echo "<div class='dot-top'><span class='dot-author'>" . $row['dotName'] . "</span><span class='dot-time timeago' title='" . $row['dotTime'] . "'></span> <div class='right'><span class='share'><a href='http://twitter.com/share' class='twitter-share-button' data-count='none' data-text='My DOT: " . $row['dotText'] . " (Submitted by: " . $row['dotName'] . ")' data-via='dotoncampus' data-related='dotoncampus'>Tweet</a></span><a style='display:none;' class='do-this' href='#'>Do This</a></div>";
        global $current_user; get_currentuserinfo(); if ($current_user->user_level == 10 ) {
			    echo "<form class='deletedot' id='deletedot-" . $row['dotID'] . "' method='post' action='" . get_bloginfo ( 'template_directory' ) . "/delete.php'><input type='hidden' name='dotID' id='dotID' value='" . $row['dotID'] . "'><input type='image' src='http://assets.dotoncampus.com/images/delete.gif' /></form>";
			  }
  echo "</div><div class='dot-content'>" . $row['dotText'] . "</div>";
  echo "<div class='dot-categories'><ul>";
  if($row['dotEnvironmental'] == 1) {echo '<span class=\'label notice\'>Environmental</span>'; }
  if($row['dotEconomic'] == 1) {echo '<span class=\'label notice\'>Economic</li>'; }
  if($row['dotSocial'] == 1) {echo '<span class=\'label notice\'>Social</li>'; }

  echo "</ul>";

  echo "</div></div>";
  }
 
?>

			</div> <!-- .span10 -->
		</div> <!-- .row -->


<?php get_sidebar(); ?>
	</div> <!-- .content -->
</div> <!-- .container -->
<?php get_footer(); ?>
