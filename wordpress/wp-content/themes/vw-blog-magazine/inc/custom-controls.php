<?php
/**
 * VW Blog Magazine Customizer Custom Controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Toggle Switch Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class VW_Blog_Magazine_Toggle_Switch_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'toogle_switch';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue(){
			wp_enqueue_style( 'vw_blog_magazine_custom_controls_css', trailingslashit( esc_url(get_template_directory_uri()) ) . 'css/customizer.css', array(), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content(){
		?>
			<div class="toggle-switch-control">
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
			</div>
		<?php
		}
	}

	// Image Toggle Radio Buttpon
	class VW_Blog_Magazine_Image_Radio_Control extends WP_Customize_Control {

	    public function render_content() {
	 
	        if (empty($this->choices))
	            return;
	 
	        $name = '_customize-radio-' . $this->id;
	        ?>
	        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	        <ul class="controls" id='vw-blog-magazine-img-container'>
	            <?php
	            foreach ($this->choices as $value => $label) :
	                $class = ($this->value() == $value) ? 'vw-blog-magazine-radio-img-selected vw-blog-magazine-radio-img-img' : 'vw-blog-magazine-radio-img-img';
	                ?>
	                <li style="display: inline;">
	                    <label>
	                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
	                          	$this->link();
	                          	checked($this->value(), $value);
	                          	?> />
	                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
	                    </label>
	                </li>
	                <?php
	            endforeach;
	            ?>
	        </ul>
	        <?php
	    } 
	}

	/**
	 * Switch sanitization
	 *
	 * @param  string		Switch value
	 * @return integer	Sanitized value
	 */
	if ( ! function_exists( 'vw_blog_magazine_switch_sanitization' ) ) {
		function vw_blog_magazine_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	// Reset Settings
	class VW_Blog_Magazine_Reset_Custom_Control extends WP_Customize_Control {
	    public $type = 'reset_control';
	    public function render_content() {
	    ?>
	      <div class="reset-custom-control">
	      	<span class="customize-reset-title"><?php echo esc_html( $this->label ); ?></span>
	         <span class="reset-button"><?php echo esc_html_e('Reset', 'vw-blog-magazine'); ?></span>
	      </div>
	      <div id="myModal" class="modal kt-modal">
	        <div class="modal-content">
	          <span class="close">X</span>
	          <h3><?php esc_html_e('Are you sure to reset the Changes ? ', 'vw-blog-magazine') ?></h3>
	          <p><?php esc_html_e('After click on the reset button, it will reset the default settings and previous changes that you have done and the data will be lost.', 'vw-blog-magazine') ?></p>
	          <p><?php esc_html_e('Please Refresh the customizer after reset the settings.', 'vw-blog-magazine') ?></p>
	          <a href="javascript:location.reload();" class="refresh-btn" data-value="<?php echo esc_attr( $this->description ); ?>"><?php echo esc_html_e('RESET', 'vw-blog-magazine'); ?></a>
	        </div>
	      </div>
	  		<?php
	    }
  	}
}
