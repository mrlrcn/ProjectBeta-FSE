<?php

//  CARGAR MIS ESTILOS

    function my_scripts_and_styles()
    {
        if ( ! is_admin() )
        {            
            wp_enqueue_style ( 'theme-styles', get_stylesheet_uri(), '', filemtime ( get_template_directory() . '/style.css' ) );
        }
    }

    add_action ( 'wp_enqueue_scripts', 'my_scripts_and_styles' );

//  THEME SETUP

    function my_theme_setup()
    {
        remove_theme_support ( 'core-block-patterns' );
    }

    add_action ( 'after_setup_theme', 'my_theme_setup' );



//  GUTENBERG: LOCKING CONTENT FOR NON ADMINS

    function my_gutenberg_locks ( $settings, $context )
    {
        if ( ! current_user_can ( 'activate_plugins' ) )
        {
            $settings[ 'canLockBlocks' ] = false;
            $settings[ 'codeEditingEnabled' ] = false;
        }

        return $settings;
    }

    add_filter ( 'block_editor_settings_all', 'my_gutenberg_locks', 10, 2 );

?>