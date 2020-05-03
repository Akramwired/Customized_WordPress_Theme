<?php 

    function akram_theme_support(){
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }
    
    add_action('after_setup_theme', 'akram_theme_support');

    // code for creating menu items

    function akram_menu(){
        $locations = array(
            'primary' => 'Left Side Bar',
            'footer' => 'Footer Menu'
        );
        register_nav_menus($locations);
    }

    add_action('init', 'akram_menu');


    function akram_register_styles(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('akram-style', get_template_directory_uri() . "/style.css", array('akram-bootstrap'), $version, 'all');
        wp_enqueue_style('akram-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
        wp_enqueue_style('akram-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    }

    add_action('wp_enqueue_scripts', 'akram_register_styles');

    function akram_register_scripts(){
        wp_enqueue_script('akram-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
        wp_enqueue_script('akram-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
        wp_enqueue_script('akram-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
        wp_enqueue_script('akram-script', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
    }

    add_action('wp_enqueue_scripts', 'akram_register_scripts');

    function akram_widget_areas(){
        register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>',
                'after_widget' => '</ul>',
                'name' => 'Sidebar',
                'id' => 'sidebar-1',
                'description' => 'Sidebar Widget'
            )
        );

        register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '',
                'after_widget' => '',
                'name' => 'Footer',
                'id' => 'footer-1',
                'description' => 'Footer Widget'
            )
        );
    }

    add_action('widgets_init', 'akram_widget_areas'); 

?>