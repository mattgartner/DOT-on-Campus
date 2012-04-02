<?php
/**
 *
 * Displays all of the <head> section and everything up until <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<!DOCTYPE html>
<!-- HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script language=javascript>
<!--
if ((nsavigator.userAgent.match(/iPhone/i)) || (nsavigator.userAgent.match(/iPad/i)) || (nsavigator.userAgent.match(/iPod/i)) || (sscreen.width <= 699)) {
   location.replace("http://dotoncamp.us/");
}
-->


</script>

<?php 
@include("mobile_detect.php");
$detect = new Mobile_Detect();
if ($detect->isMobile() && isset($_COOKIE['mobile']))
{
$detect = "false";
}
elseif ($detect->isMobile())
{
header("Location:http://dotoncamp.us");
}
?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="http://assets.dotoncampus.com/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 940px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 50px -20px 0; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        margin: -20px -20px 20px;
        border-top:1px solid #DDD;
        background:url('http://assets.dotoncampus.com/images/header-map.png') #FFF no-repeat;
        background-position: top right;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }

    </style>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"> </script>
<script type="text/javascript" src="http://assets.dotoncampus.com/js/modernizr.js"> </script>
<script type="text/javascript" src="http://assets.dotoncampus.com/js/timeago.min.js"> </script>
<script type="text/javascript" src="http://assets.dotoncampus.com/js/js-paginate.js"> </script>
<script type="text/javascript" src="http://assets.dotoncampus.com/js/bootstrap-combo.js"> </script>
<script type="text/javascript" src="http://assets.dotoncampus.com/js/jquery.form.js"> </script>

<script type="text/javascript"> 
jQuery(document).ready(function() {
    //using : Modernizr.placeholder && Modernizr.min && Modernizr.required && Modernizr.email,
    //Modernizr.input[attribute]
    //Modernizr.inputtypes[type]

if (Modernizr.input.placeholder) {
    jQuery('.help-block').remove();
}

	jQuery("span.timeago").timeago();
	
	function schoolSlide() {
		jQuery('html, body').animate({scrollTop:0}, 'slow');
		jQuery("#schools-dropdown").slideDown('slow');	
	}
		
	//jQuery("a.brand").hover(schoolSlide);
	
	jQuery("#schools-close").click(function() {
		jQuery("#schools-dropdown").slideUp('slow');
		return false;
	});
	
   $('.deletedot').ajaxForm(function() { 
				alert('deleted');
            });
    	
	
});
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		
<div class="topbar">
	<div class="fill">
		<div class="container">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="http://assets.dotoncampus.com/images/default-footer-logo.png" /></a>			
			<?php if ( of_get_option('school_name') ) { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span id="school-name"><?php echo of_get_option('school_name'); ?></span></a>
                        <?php } ?>
			<ul class="nav pull-right">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</ul>
		</div> <!-- .container -->
	</div> <!-- .fill -->
</div> <!-- .topbar -->
<div id="schools-dropdown">
<ul class="container">
<li><a href="#">Syracuse University</a></li>
<li><a href="#">George Washington University</a></li>
<li><a href="#">Washington University in St. Louis</a></li>

<a class="btn" id="schools-close" href="#">Close</a>
</ul>
</div>


<div class="container">
	<div class="content">
		<div class="page-header">
			<h2>Connecting the DOTs towards a better world</h2>
			<h4>Move past a movement based on fear. DOT is the collective impact of billions of small actions. It's about big thinking and small changes. It's about opportunity instead of obligation. It's about creativity.</h4>
			<div id="dot-button"><button class="btn info">Do One Thing</button></div>
		</div> <!-- #page-header -->
		<div class="row">
			<div class="span10"> <!-- Start of Main page -->