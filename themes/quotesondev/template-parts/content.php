<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<div class="entry-content">
	<?php the_excerpt(); ?> 



<header class="entry-header">
		<h3>- <?php the_title(); ?></h3>
	</header><!-- .entry-header -->

	
	</div><!-- .entry-content -->
</article><!-- #post-## -->
