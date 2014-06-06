<?php

/*
 * Template Name: Main
 *
 */

get_header(); 

$tagline = get_the_block('top');

?>

	<article>
		<?php the_block('heading'); ?>
	    <div class='entry-left'>
		<?php the_block('entry-left'); ?>
	    </div>
	    <div class='entry-right'>
		<?php the_block('entry-right'); ?>
	    </div>
	</article>

<?php get_footer(); ?>
