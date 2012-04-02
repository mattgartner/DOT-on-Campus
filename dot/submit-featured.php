<?php
/**
 * Template Name: Submit a Featured DOT
 * Description: 
 *
 * @package WordPress
 */
get_header(); 

?>	
				<h5 class="heading top">Submit a Featured DOTs</h5>
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
        				<div id="submitdot-home">              
					<form id="submitdot" name="submitdot" method="get" action="<?php bloginfo('template_directory') ?>/featured-form.php">
					<fieldset>
						<div id="submit-fields">
							<div class="input">
              						<textarea class="xxlarge" id="dot" name="dot" rows="3" tabindex="1" required="required" min="10" placeholder="My DOT is to..."></textarea>
              						<span class="help-block">Enter your DOT above</span>
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
              					<textarea class="xxlarge" id="dot-impact" name="dot-impact" rows="3" tabindex="2" min="10" placeholder="This DOT will save..."></textarea>
              					<span class="help-block">Enter an impact</span>
              				</div>
              				
              				<div class="input">
              						<textarea class="xxlarge" id="dot-impact-tweet" name="dot-impact-tweet" rows="3" tabindex="3" min="10" placeholder="I just pledged to..."></textarea>
              						<span class="help-block">Enter a Tweet-able impact</span>
              					</div>
              					
              					
						<div class="input">
						<input class="btn info submit" alt="Submit" value="Submit a featured DOT" type="submit">
						</div>
						</fieldset>
</form>        
<div class="success" style="display: none;"><img src="http://assets.dotoncampus.com/images/loading.gif"/><p>Thanks for submitting your DOT!</p></div> 

			</div> <!-- .span10 -->
		</div> <!-- .row -->


<?php get_sidebar(); ?>
	</div> <!-- .content -->
</div> <!-- .container -->
<?php get_footer(); ?>
