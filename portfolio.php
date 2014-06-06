<?php

/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage TamayoWeb
 */



get_header(); 

$tagline = get_the_block('top');

// save the $post object for later:
$thisPost = $post;
?>
		    
	<!-- Begin main content -->
	<?php

	$query = array(
		'post_type' => 'website',
		'post_status' => 'publish'
	);
				
	query_posts($query);
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		$theURL = get_post_custom_values( 'url', get_the_ID() );
		$theURL = $theURL[0];
	?>
					
		<article>
			<h1><?php the_title(); ?></h1>
			<div class="entry-left">
				<?php the_block("entry-left"); ?>
			</div>
			<div class="entry-right">
				<?php the_block("entry-right"); ?>
			</div>
			<footer>
				<a href='<?php the_permalink(); ?>'>Read More</a>
				<a href='<?php echo $theURL; ?>'>Visit Site</a>
			</footer>
		</article>

		<?php endwhile;
	endif;

$post = $thisPost;

get_footer(); ?>