<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];
?>

		<div id="secondary" class="widget-area span3" role="complementary">
			<aside id="dotcounter" class="aside">
                	<h5>Total DOTs Submitted</h1>
                    <div id="counter"><?php 
                    $cid = mysql_connect('localhost', database_option('database_user'), database_option('database_pass'));
				
				$totaldots = mysql_query("SELECT * FROM dots", $cid);
				$num_rows = mysql_num_rows($totaldots);

				echo "<span class='counter-number'>$num_rows</span>";
                     ?>
                     </div>
			</aside>
				
			<aside id="whats-your-dot" class="aside">
				<h5>What is DOT?</h5>				
				<div id="modal-from-dom" class="modal hide fade">
					<div class="modal-header">
						<a href="#" class="close">×</a>
						<h3>Choosing your DOT</h3>
					</div>
					<div class="modal-body">
						<iframe width="560" height="315" src="http://www.youtube.com/embed/fLsVwjNQFTU" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<a data-controls-modal="modal-from-dom" data-backdrop="static" ><img src="http://assets.dotoncampus.com/images/what-is-dot-video.png" /></a>
			</aside>

			<aside id="partners" class="aside">
				<h5>Partners</h5>
				<ul>
					<span><li class="susife"><a href="http://susife.org/">SUSIFE</a></li></span>
                        	<span><li class="syracuse"><a href="http://syr.edu">Syracuse University</a></li></span>
                    </ul>
			</aside>
			
			<aside id="blog" class="aside">
			<h5>DOT Blog</h5>
			<a href="http://dotoncampus.tumblr.com/"><img src="http://assets.dotoncampus.com/images/contact-bubble.png" /></a>
                    <p><a href="http://dotoncampus.tumblr.com/">Keep up with everything happening on campus with the DOT Blog.</a></p>
			</aside>
		</div><!-- #secondary .widget-area -->
