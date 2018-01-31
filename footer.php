<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dynamic
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
		  <div class="site-info d-flex justify-content-center">
			<a href="<?php  echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>&nbsp; &copy; <?php echo date('Y');?> <?php _e('Tous droits réservés','dynamic'); ?> - 
             <?php 
              $divider = '<span class="nav-divider"> - </span>';
              wp_nav_menu(array('theme_location' => 'footer-ml', 'menu_class' => 'd-flex menu divider', 'container_id' => 'footer_ml', 'before' => $divider )); ?>
		  </div><!-- .site-info -->
        </div>
	</footer><!-- .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
