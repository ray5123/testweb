<?php
//about theme info
add_action( 'admin_menu', 'vw_blog_magazine_gettingstarted' );
function vw_blog_magazine_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Blog Lite', 'vw-blog-magazine'), esc_html__('About VW Blog Lite', 'vw-blog-magazine'), 'edit_theme_options', 'vw_blog_magazine_guide', 'vw_blog_magazine_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_blog_magazine_admin_theme_style() {
   wp_enqueue_style('vw-blog-magazine-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
   wp_enqueue_script('vw-blog-magazine-tabs', esc_url(get_template_directory_uri()) . '/inc/get-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_blog_magazine_admin_theme_style');

//guidline for about theme
function vw_blog_magazine_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-blog-magazine' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Blog Theme', 'vw-blog-magazine' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-blog-magazine'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Blog Magazine at 20% Discount','vw-blog-magazine'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-blog-magazine'); ?> ( <span><?php esc_html_e('vwpro20','vw-blog-magazine'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-blog-magazine' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_blog_magazine_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-blog-magazine' ); ?></button>	
			<button class="tablinks" onclick="vw_blog_magazine_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-blog-magazine' ); ?></button>
			<button class="tablinks" onclick="vw_blog_magazine_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-blog-magazine' ); ?></button>
			<button class="tablinks" onclick="vw_blog_magazine_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-blog-magazine' ); ?></button>	
		  	<button class="tablinks" onclick="vw_blog_magazine_open_tab(event, 'blog_pro')"><?php esc_html_e( 'Get Premium', 'vw-blog-magazine' ); ?></button>
		  	<button class="tablinks" onclick="vw_blog_magazine_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-blog-magazine' ); ?></button>
		</div>

		<?php
			$vw_blog_magazine_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_blog_magazine_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Blog_Magazine_Plugin_Activation_Settings::get_instance();
				$vw_blog_magazine_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-blog-magazine-recommended-plugins">
				    <div class="vw-blog-magazine-action-list">
				        <?php if ($vw_blog_magazine_actions): foreach ($vw_blog_magazine_actions as $key => $vw_blog_magazine_actionValue): ?>
				                <div class="vw-blog-magazine-action" id="<?php echo esc_attr($vw_blog_magazine_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_blog_magazine_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_blog_magazine_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_blog_magazine_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-blog-magazine'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_blog_magazine_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-blog-magazine' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Blog Magazine Theme is designed to be stylish and classy, This exclusive theme is developed especially for bloggers, personal blog, fashion blog, lifestyle blog, travel blog, food blog, craft blog, tech blog, creative blog, Our Blog WordPress theme makes the use of secure and clean codes, you can easily customize our theme as per your wishes. You can even add or remove anything that you may or may not like.You will get an interactive demo, responsive slider, quick page speed, display options, SEO friendly features, social media icons, and a bunch of other phenomenal features with this supreme theme. Furthermore, built on Bootstrap framework, the theme will ease the web development. It is user-friendly, and multipurpose theme which will fit perfectly for you. All your long research and time invested in finding the best themes end with us, as we bring you a theme like no other. Our Free Blog Magazine WordPress Theme is fresh, special and distinct in every aspect.','vw-blog-magazine'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-blog-magazine' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-blog-magazine' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-blog-magazine' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-blog-magazine'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-blog-magazine'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-blog-magazine'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-blog-magazine'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-blog-magazine'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-blog-magazine'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-blog-magazine'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-blog-magazine'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-blog-magazine'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-blog-magazine' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-blog-magazine'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_blog_magazine_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-blog-magazine'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_category_section') ); ?>" target="_blank"><?php esc_html_e('Category Section','vw-blog-magazine'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_cat_two_sec') ); ?>" target="_blank"><?php esc_html_e('Category section 2','vw-blog-magazine'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-blog-magazine'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-blog-magazine'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-blog-magazine'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-blog-magazine'); ?></a>
								</div> 
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-blog-magazine'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-blog-magazine'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-blog-magazine'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-blog-magazine'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-blog-magazine'); ?></span><?php esc_html_e(' Go to ','vw-blog-magazine'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-blog-magazine'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-blog-magazine'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-blog-magazine'); ?></span><?php esc_html_e(' Go to ','vw-blog-magazine'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-blog-magazine'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-blog-magazine'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-blog-magazine'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-blog-magazine/" target="_blank"><?php esc_html_e('Documentation','vw-blog-magazine'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Blog_Magazine_Plugin_Activation_Settings::get_instance();
			$vw_blog_magazine_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-blog-magazine-recommended-plugins">
				    <div class="vw-blog-magazine-action-list">
				        <?php if ($vw_blog_magazine_actions): foreach ($vw_blog_magazine_actions as $key => $vw_blog_magazine_actionValue): ?>
				                <div class="vw-blog-magazine-action" id="<?php echo esc_attr($vw_blog_magazine_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_blog_magazine_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_blog_magazine_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_blog_magazine_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-blog-magazine'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_blog_magazine_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-blog-magazine' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-blog-magazine'); ?></p>
              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon ','vw-blog-magazine'); ?></span></b></p>
              	<div class="vw-blog-magazine-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-blog-magazine'); ?></a>
				    </div>
              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/block-pattern.png" alt="" />
              	<p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Section >> Publish.','vw-blog-magazine'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	         </div>

	         <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'vw-blog-magazine' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-blog-magazine'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-blog-magazine'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-blog-magazine'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-blog-magazine'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-blog-magazine'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-blog-magazine'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-blog-magazine'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-blog-magazine'); ?></a>
									</div> 
								</div>
							</div>
						</div>	
					</div>					
	      </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Blog_Magazine_Plugin_Activation_Settings::get_instance();
			$vw_blog_magazine_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-blog-magazine-recommended-plugins">
				    <div class="vw-blog-magazine-action-list">
				        <?php if ($vw_blog_magazine_actions): foreach ($vw_blog_magazine_actions as $key => $vw_blog_magazine_actionValue): ?>
				                <div class="vw-blog-magazine-action" id="<?php echo esc_attr($vw_blog_magazine_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_blog_magazine_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_blog_magazine_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_blog_magazine_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-blog-magazine' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-blog-magazine-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-blog-magazine'); ?></a>
			   </div>

			   <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-blog-magazine' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-blog-magazine'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-blog-magazine'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-blog-magazine'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-blog-magazine'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-blog-magazine'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-blog-magazine'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_blog_magazine_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-blog-magazine'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-blog-magazine'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Blog_Magazine_Plugin_Activation_Woo_Products::get_instance();
				$vw_blog_magazine_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-blog-magazine-recommended-plugins">
					    <div class="vw-blog-magazine-action-list">
					        <?php if ($vw_blog_magazine_actions): foreach ($vw_blog_magazine_actions as $key => $vw_blog_magazine_actionValue): ?>
					                <div class="vw-blog-magazine-action" id="<?php echo esc_attr($vw_blog_magazine_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_blog_magazine_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_blog_magazine_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_blog_magazine_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-blog-magazine' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-blog-magazine-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-blog-magazine'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-blog-magazine'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-blog-magazine'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-blog-magazine'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-blog-magazine'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-blog-magazine'); ?></span></b></p>
	              	<div class="vw-blog-magazine-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-blog-magazine'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-blog-magazine'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="blog_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-blog-magazine' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Blogging is the new trend of this generation. Its the best platform to give words to your thoughts, share your experiences, ideas and deep acquired knowledge. They are the window to your inner self. It is a beautiful way to connect with oneself and with the outer world. A blog can be about anything and everything. If you are a photographer, post the pictures of nature, people or anything you have clicked and showcase it to the world in the form of online gallery; if you are interested in food blogging, show off your expert culinary knowledge to people to make your recipes reach every home; if you are a wanderlust, share your first-hand experiences of exploring new places to adventure lover and travel enthusiast; if you are a dedicated fashion observer, exhibit your innovative ideas of fashion to the trendsetter. ','vw-blog-magazine'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-blog-magazine'); ?></a>
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-blog-magazine'); ?></a>
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-blog-magazine'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/vw-blog.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-blog-magazine' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-blog-magazine'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-blog-magazine'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><?php esc_html_e('9', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-blog-magazine'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-blog-magazine'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-blog-magazine'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-blog-magazine'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-blog-magazine'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_BLOG_MAGAZINE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-blog-magazine'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-blog-magazine'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-blog-magazine'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-blog-magazine'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-blog-magazine'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-blog-magazine'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-blog-magazine'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-blog-magazine'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-blog-magazine'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-blog-magazine'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-blog-magazine'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-blog-magazine'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-blog-magazine'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-blog-magazine'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-blog-magazine'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_BLOG_MAGAZINE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-blog-magazine'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>
