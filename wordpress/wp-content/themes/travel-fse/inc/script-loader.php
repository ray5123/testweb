<?php
/**
 * Handle all the scripts here
 * 
 * @since Travel Fse 1.0
 */
if( !class_exists( 'Travel_Fse_Script_Loader' ) ){

    class Travel_Fse_Script_Loader{

        public static $instance;

        public static function get_instance() {
            if ( ! self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

    	public function __construct(){

            /* load style.css */
            (new Travel_Fse_Script([
                'path' => TRAVEL_FSE_DIR,
                'type' => 'unminified'
            ]))->load($this->get_main_style());

             /* load theme-info.css */
            (new Travel_Fse_Script([
                'hook' => 'admin_enqueue_scripts',
                'type' => 'unminified',
                'path' => TRAVEL_FSE_DIR
            ]))->load($this->get_theme_info_style());

            add_action( 'init', array( $this, 'init' ) );
    		
    	}

        public function init(){

            $script = new Travel_Fse_Script([
                'path' => TRAVEL_FSE_DIR . 'assets'
            ]);

            
            $script->load([
                [
                    'handle' => 'index',
                    'style'  => 'css/index.css',
                    'version' => TRAVEL_FSE_VERSION
                ]
            ]);
        }

        public function get_main_style(){
            return array(
                array(
                    'handle' => 'style',
                    'style'  => 'style.css'
                )
            );
        }

        public function get_theme_info_style(){
            return array(
                array(
                    'handle' => 'theme-info',
                    'style'  => 'assets/css/theme-info.css'
                )
            );
        }
    }

    Travel_Fse_Script_Loader::get_instance();
}