</div>
<footer class="footer-area">
   <div class="container">
		<?php do_action('expert_travel_vlogger_footer_above');
			if ( is_active_sidebar( 'travel-booking-expert-footer-widget-area' ) ) { ?>
			<div class="row footer-row"> 
				<?php dynamic_sidebar( 'travel-booking-expert-footer-widget-area' ); ?>
			</div>  
		<?php } ?>
	</div>	
	<?php 
		$footer_copyright = get_theme_mod('footer_copyright','Copyright &copy; 2023,Expert Travel Vlogger WordPress Theme');
	?>
	<div class="copy-right"> 
		<div class="container">
			<p class="copyright-text">
				<?php
					echo apply_filters('expert_travel_vlogger_footer_copyright',($footer_copyright));
				?>
			</p>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>