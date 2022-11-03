<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() { //enqueue betyder linker til
    $parenthandle = 'parent-style'; // This is 'Hello-elementor-style' for the Hello Elementor theme.
    $theme = wp_get_theme();

	// Her linkes der til parent theme (the WordPress way to link to style.css (PARENT THEME!!))
	// Først <link rel="stylesheet" href="css/parent-style.css">
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', //linker 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );

	// Her linkes der til child theme (the WordPress way to link to style.css (CHILD THEME!!))
	// Efterfølgende <link rel="stylesheet" href="css/parent-style.css">
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/script.js', array(), null, true);
}
