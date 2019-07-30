<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
	</header><!-- .entry-header -->

	<div class="entry-content">
	
	<div class="grandecontainer">
		
	<div class="authors">
		<h2>Quote Authors</h2>
		
			<?php
			$myposts = get_posts( 'posts_per_page=-1' );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

			<?php endforeach; wp_reset_postdata();?>
		
	</div>


	<div class="categories">
		<h2>Categories</h2>	
		<?php
			$tags = get_categories();
		$html = '<div class="post_categories">';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
					
			$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
			$html .= "{$tag->name}</a>";
		}
		$html .= '</div>';
		echo $html; ?>
	</div>
	
	
	<div class="tags">
		<h1>Tags</h1>	
		<?php
			$tags = get_tags();
		$html = '<div class="post_tags">';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
					
			$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
			$html .= "{$tag->name}</a>";
		}
		$html .= '</div>';
		echo $html; ?>
	</div>

		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
