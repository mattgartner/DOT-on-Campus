<?php
/**
 * Template Name: Featured DOTs
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
<style type="text/css">
.featured-dot-form {display:none;}
input.submit {left:0;}
</style>
<script type="text/javascript">
  twttr.anywhere(function (T) {
    T("#tbox").tweetBox();
  });
</script>
<div id="recentdots">
				
				
			<?php
$recentdots = mysql_query("SELECT * FROM featured ORDER BY dotID desc LIMIT 0 , 10;");

while($row = mysql_fetch_array($recentdots))
  {
  echo "<div class='dot-wrap' id='dot-" . $row['dotID'] . "'>";
    echo "<div><a id='dot-" . $row['dotID'] . "' class='do-this' href='#'>Do This</a>";
    if(!empty($row['dotImpact'])) {
	    echo "<a data-controls-modal='featured-modal-" . $row['dotID'] . "' data-backdrop='static' class='impact'>See the Impact</a> </div>";
	} else {
		echo "</div>";
	}
    if(!empty($row['dotImpact'])) {
    echo "<div id='featured-modal-" . $row['dotID'] . "' class='modal hide fade'>";
		echo "<div class='modal-header'><a href='#' class='close'>×</a>";
		echo "<h3>" . $row['dotText'] . "</h3></div>";
			echo "<div class='modal-body'>";
				echo $row['dotImpact'];
			echo "</div><div class='modal-footer'><a href='http://twitter.com/share' class='twitter-share-button' data-count='horizontal' data-text='" . $row['dotImpactTweet'] . "' data-via='dotoncampus' data-related='dotoncampus' data-url='http://dotoncampus.com/'>Tweet</a></div></div>";
	}
    echo "<div class='dot-content'>" . $row['dotText'] . "</div>";
  echo "<div class='dot-categories'><ul>";
  if($row['dotEnvironmental'] == 1) {echo '<span class=\'label notice\'>Environmental</span>'; }
  if($row['dotEconomic'] == 1) {echo '<span class=\'label notice\'>Economic</span>'; }
  if($row['dotSocial'] == 1) {echo '<span class=\'label notice\'>Social</span>'; }

  echo "</ul>";
  
  echo "<div class='user-input-dot-" . $row['dotID'] . "'><form id='featured-dot-" . $row['dotID'] . "' class='featured-dot-form' name='featureddot' method='get' action='http://totaljapmove.com/wp-content/themes/dot/do-dot.php'><fieldset><div class='input'><input class='large' id='name-" . $row['dotID'] . "' name='featured-name' size='30' type='text' required='required' min='3' placeholder='Your Name'></div><div class='input'><input class='large' id='email-" . $row['dotID'] . "' name='featured-email' size='30' type='email' required='required' placeholder='Your Email'></div><input type='hidden' id='dot-" . $row['dotID'] . "' name='featured-dot' value='" . $row['dotText'] . "' ></input><input type='hidden' id='dotid' name='featured-dotid' value='" . $row['dotID'] . "' ></input>";
  if($row['dotEnvironmental'] == 1) {echo "<input type='hidden' name='featured-cat_environmental' id='cat_environmental' value='1'>";}
  if($row['dotEconomic'] == 1) {echo "<input type='hidden' name='featured-cat_economic' id='cat_economic' value='1'>";}
  if($row['dotSocial'] == 1) {echo "<input type='hidden' name='featured-cat_social' id='cat_social' value='1'>";}
  
  echo "<input class='btn info submit' alt='Submit' value='Do This DOT' type='submit'></fieldset></form></div>";

  echo "</div></div>";
  }
 
?>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("a.do-this").click(function(event) {
        //alert(event.target.id);
        var id = event.target.id;
        jQuery('#featured-'+id).slideToggle();
        return false;
    });
    jQuery('.featured-dot-form').ajaxForm(function() { 
		jQuery('.featured-dot-form').resetForm();		
	});
});

</script>

			</div> <!-- .span10 -->
		</div> <!-- .row -->


<?php get_sidebar(); ?>
	</div> <!-- .content -->
</div> <!-- .container -->
<?php get_footer(); ?>
