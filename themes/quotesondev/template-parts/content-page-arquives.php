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
	<div class="subtitle"><h2>Quote Authors</h2></div>
		
			<?php
			$myposts = get_posts( 'posts_per_page=-1' );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			
			<ul class="archives"><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li></ul>

			<?php endforeach; wp_reset_postdata();?>
		
	</div>


	<div class="categories">
		<div class="subtitle"><h2>Categories</h2></div>	
		
		<?php
			$tags = get_categories();	
		?>
		<ul class="tagslist">
			<?php
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
					
			$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
			$html .= "{$tag->name}</a>";
		}
		echo $html; ?>
		
		</ul>
	</div>
	
	
	<div class="tags">
	<div class="subtitle"><h2>Tags</h2></div>	
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
