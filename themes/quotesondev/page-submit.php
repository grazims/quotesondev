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
			<form class="form-section">

			<label for="title" class="form">
				<p>Author of Quote:</p> 
				<input id="title" type="text">
			</label>

			<label for="content" class="form">
				<p>Quote:</p> 
				<textarea name="content" id="quote-content"></textarea>
			</label>

			<label for="url" class="form"> 
			<p>Where did you find this quote? (e.g. book name)</p>
			 <input name="url" id="url" type="text">
			</label>

			<label for="urlSource" class="form">
			<p>Provide the URL of the quote source, if available. </p>
			<input name="urlSource" id="urlSource" type="text">
			</label>
			
			<button type="submit" id="submit">Submit Quote</button>
			</form>


		   <?php else : ?> 
		   	<div class="form-section2">
				<p>Sorry, you must be logged in to submit a quote!</p>
				<a href="http://localhost:8888/quotes/wp-login.php?" >Click here to login.</a>
			</div>
			
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
