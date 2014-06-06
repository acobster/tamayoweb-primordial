	<div id='copyright'>
		&copy; <?php echo date("Y"); ?> by Coby Tamayo
	</div>
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
		<nav>
			<ul>

				<?php

		$items = wp_get_nav_menu_items('Main Navbar');
		rewind_posts();

		foreach ( (array) $items as $k => $item) {
			$class = ($post->post_title == $item->title) ? " class='currentPage'" : "";
			echo "<li$class><a href='$item->url'>$item->title</a></li>";
		}
				?>
			</ul>
		</nav>
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