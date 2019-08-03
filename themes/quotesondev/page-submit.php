<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<h1> Submit a Quote</h1>

			<?php if ( is_user_logged_in() && current_user_can( 'publish_posts' ) ) : ?>
			<div class="form-section">

			<div class="form">
				<p>Author of Quote:</p> <input type="text" name="quote" value="<?php echo $website;?>">
			</div>

			<div class="form">
				<p>Quote:</p> <textarea name="url" rows="4" columns="1"><?php echo $comment;?></textarea>
			</div>

			<div class="form">
			<p>Where did you find this quote? (e.g. book name)</p> <input type="text" name="source" value="<?php echo $website;?>">
			</div>

			<div class="form">
			<p>Provide the URL of the quote source, if available. </p><input type="text" name="source" value="<?php echo $email;?>">
			</div>
			</div>
			
				<button type="button" id="submit">Submit Quote</button>


		   <?php else : ?> 
		   <div class="form-section2">
				<p>Sorry, you must be logged in to submit a quote!</p>
				<a href="http://localhost:8888/quotes/wp-login.php?" >Click here to login.</a>
			</div>

				
			
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
