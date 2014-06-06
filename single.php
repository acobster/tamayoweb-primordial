<?php

/*
 * Template Name: Single
 *
 */

get_header(); ?>
    
	<article>
		<header>
			<h1><?php the_title(); ?></h1>
		</header>
	    <div class='entry-left'>
		<?php the_block('entry-left'); ?>
	    </div>
	    <div class='entry-right'>
		<?php the_block('entry-right'); ?>
	    </div>
	</article>

<?php get_footer(); ?>
