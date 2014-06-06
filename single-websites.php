<?php
/**
 * Template file for display single custom post page.
 *
 * @package WordPress
 * @subpackage Kin
*/


get_header(); 
				
				<?php

if (have_posts()) : while (have_posts()) : the_post();

?>

						<!-- Begin each blog post -->
						<div class="post_wrapper">
							
							<div class="post_header">
								<div class="left">
									<h2 class="cufon">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>									
										</a>
									</h2>							
								</div>
							</div>
							<br class="clear"/><br/>
						
							<div class="content-left content-column">
								<?php the_block('entry-left'); ?>
							</div><!-- .content-left -->
							<div class="content-right content-column">
								<?php the_block('entry-right'); ?>
							</div><!-- .content-right -->
							
						</div>
						<!-- End each blog post -->
						
						

<?php endwhile; endif; ?>

				

<?php get_footer(); ?>