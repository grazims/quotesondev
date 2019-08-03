<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<?php $args = array(
				'posts_per_page' => 1,
				'orderby' => 'rand'
			);
			?>
			<?php query_posts($args); if(have_posts()) : while ( have_posts() ) : the_post(); ?>

				<div class="nome">
				<i class="fas fa-quote-left"></i>
				<?php get_template_part( 'template-parts/content-home' ); ?>
				<i class="fas fa-quote-right"></i>
				</div>
				<button type="button" id="another">"Show Me Another!"</button>

			<?php endwhile; ?>
			<?php else : ?>


			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; wp_reset_query(); ?>

		<?php get_footer(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->


