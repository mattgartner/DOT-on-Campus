<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); 

include 'db.php';

$con = mysql_connect("localhost",$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);


$recentdots = mysql_query("SELECT * FROM dots ORDER BY dotID desc LIMIT 0 , 5;");


?>
<script>
jQuery(document).ready(function(){
			jQuery('#submitdot').ajaxForm(function() { 
				jQuery('#submitdot').resetForm();
				jQuery('#submitdot').queue(function() {
					$(this).fadeOut(200);
					$(this).dequeue();
					$(this).delay(2000).fadeIn(1000);
				});
				jQuery('div.success').queue(function() {
					$(this).fadeIn(500);
					$(this).dequeue();
					$(this).delay(1500).hide(100);
				});		
			}); 
	});
        </script>
        
        	<h5 class="heading top">Submit a DOT</h5>
				<div id="submitdot-home">              
					<form id="submitdot" name="submitdot" method="post" action="<?php bloginfo('template_directory') ?>/submitdot.php">
					<fieldset>
						<div id="submit-fields">
							<div class="input">
              						<textarea class="xxlarge" id="dot" name="dot" rows="3" tabindex="1" required="required" min="10" placeholder="My DOT is to..."></textarea>
              						<span class="help-block">Enter your DOT above</span>
              					</div>
    							<div class="input">						
								<input class="large" id="name" name="name" size="30" type="text" tabindex="2" required="required" min="3" placeholder="Your Name">
								<span class="help-block">Your name</span>
							</div>
    							<div class="input">
								<input class="large" id="email" name="email" size="30" type="email" tabindex="3" required="required" placeholder="Your Email">
								<span class="help-block">Your e-mail</span>
							</div>
    						</div>	
						<div id="categories">
							<span>Choose a Category:</span>
							<ul class="inputs-list">
								<li>
									<label>
										<input type="checkbox" name="cat_environmental" id="cat_environmental" value="1">
										<span>Environmental</span>
									</label>
								</li>
								
								<li>
									<label>
										<input type="checkbox" name="cat_economic" id="cat_economic" value="1">
										<span>Economic</span>
									</label>
								</li>
								
								<li>
									<label>
										<input type="checkbox" name="cat_social" id="cat_social" value="1">
										<span>Social</span>
									</label>
								</li>
							</ul>
						</div>
						
						<div class="input">
						<input class="btn info submit" alt="Submit" value="Submit your DOT" type="submit">
						</div>
						</fieldset>
</form>        
<div class="success" style="display: none;"><img src="http://assets.dotoncampus.com/images/loading.gif"/><p>Thanks for submitting your DOT!</p></div> 
      				</div>
                <div id="recentdots">

			<script type="text/javascript">
  twttr.anywhere(function (T) {
    T("#tbox").tweetBox();
  });

</script>
			<?php
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
  if($row['dotEconomic'] == 1) {echo '<span class=\'label notice\'>Economic</span>'; }
  if($row['dotSocial'] == 1) {echo '<span class=\'label notice\'>Social</span>'; }

  echo "</ul>";

  echo "</div></div>";
  }
 
?>
<div id="see-more"><a href="<?php get_bloginfo ( 'url' ) ?>/recent">See More</a></div>

			</div> <!-- .span10 -->
		</div> <!-- .row -->


<?php get_sidebar(); ?>
	</div> <!-- .content -->
</div> <!-- .container -->
<?php get_footer(); ?>
