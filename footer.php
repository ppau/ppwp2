<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package MDLWP
 */

?>

	<?php do_action( 'mdlwp_before_closing_content' ); ?>

	</div><!-- #content -->
   
		<footer class="mdl-mega-footer">
			<div class="mdl-grid mdlwp-1200">
				<div class="mdl-cell--12-col">
					<?php do_action( 'mdlwp_after_opening_footer' ); ?>
					<?php get_template_part( 'template-parts/nav', 'footer' ); ?>
					<?php do_action( 'mdlwp_before_closing_footer' ); ?>
				</div>
			</div>

			<div class="mdl-grid mdlwp-1200">
				<div class="mdl-cell--6-col">
					<a href="http://creativecommons.org/licenses/by/3.0/" style="float: left; margin-right: 24px;margin-top: 8px;">
						<img src="<?php echo get_stylesheet_directory_uri() . '/img/cc-by.svg' ;?>">
					</a>
					<p>
						Copyright &copy; <?php echo date("Y"); ?><br>
						This website is licensed under <a href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0</a><br>
					</p>
				</div>
				<div class="mdl-cell--6-col">
					<p>
						Authorised by: F. Boyd, Party Secretary, Pirate Party Australia<br>
						65 Burg Street, East Maitland, New South Wales, 2323, Australia.
					</p>
				</div>
			</div>

		</footer>

    </main> <!-- .mdl-layout__content -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php do_action( 'mdlwp_before_closing_body' ); ?>

<script>
	document.addEventListener("DOMContentLoaded", function(event) {
		setTimeout(function(){
			document.getElementsByClassName('mdl-layout__content')[0].focus();
		}, 250);
	});
</script>

</body>
</html>
