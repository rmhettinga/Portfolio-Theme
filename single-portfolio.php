<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rmhettinga
 */

get_header();
?>

	<main id="primary" class="site-main">
		<h1>TEST</h1>

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="entry-content explore">
				<h2>TEST</h2>
				<?php
				the_content( );
					?>
				</div><!-- .entry-content -->



		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
