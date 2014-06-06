<?php

/*
 * Template Name: Contact
 *
 */

get_header();

$tagline = get_the_block('top');

?>

	<article>
		<?php the_block('contact'); ?>
		<aside class='left'>
			<?php the_block('aside'); ?>
		</aside>
	</article>

<?php get_footer(); ?>