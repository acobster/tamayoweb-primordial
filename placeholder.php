<?php

/*
 * Template Name: Under Construction
 *
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tamayo Web Solutions | Elegant Web Design and Development</title>
    <link href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" rel=stylesheet />
    <link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" rel=stylesheet />
    <link rel="icon" href="pix/favicon.ico" type="image/x-icon" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="Elegant web design and development for your business. Attract customers with a beautiful website, manage it with a powerful backend." />
    
    <?php wp_head(); ?>
    <?php include_once "scripts.php"; ?>
    
</head>

<body>

<div id='bigWrapper'>
    
    <div id='content' class='collapsible  <?php collapsed(); ?>'>

<?php

$tagline = get_the_block('top');

?>

	<article>
		<?php the_block('contact'); ?>
		<aside class='left'>
			<?php the_block('aside'); ?>
		</aside>
	</article>

<!-- FOOTER -->

    </div><!-- #content -->

    <div id='smWrapper'>
    
    <div id='wrapperR' class='wrapper'>
	<div id='wrapperL' class='wrapper'>
	    
	    <div id='left' class='column'>
		<div id='leftTop' class='top collapsible <?php collapsed(); ?>'>
		    <div>
		    <img id='logo' src='<?php bloginfo('stylesheet_directory'); ?>/pix/logo.png' alt='T' />
		    <h1>amayo</h1>
		    <h2>Web Solutions</h2>
		    </div>
		</div><!-- .top -->
	    </div><!-- #left -->
	    
	    <div id='smLogo' class='collapsible <?php collapsed(); ?>'>Tamayo Web Solutions</div>
	    
	    <div id='navWrap'>
		
	    </div>

	<div id='collapseRollover' class='collapsible <?php collapsed(); ?>'>
	    <div id='collapseBtn' class='collapsible <?php collapsed(); ?>'></div>
	</div>
	    
	    <div id='right' class='column'>
		<div id='rightTop' class='top collapsible <?php collapsed(); ?>'>
			<div>
		    		<header>
				<?php global $tagline;
				if($tagline) {
					echo $tagline;
				} else { ?>
	
		    			<h1>elegant web design &</h1>
		    			<h2>development for</h2>
		    			<h3>your business</h3>
	
				<?php } ?>
		   	 	</header>
			</div>
		</div><!-- .top -->
	    
	    </div><!-- #right -->
	
	</div><!-- #wrapperL -->
    </div><!-- #wrapperR -->
    
    </div><!-- #smWrapper -->

</div><!-- #bigWrapper -->
    
</body>
</html>
