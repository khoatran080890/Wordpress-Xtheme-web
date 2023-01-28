





<?php

/*
    =======================================
    Create new Post type
    =======================================
*/
function Create_Post_type(){
    
    register_post_type('logo-partner', array(
        'has_archive' => true,
        'public' => true,
        // 'show_in_rest' => true, // Using The Modern Block Editor
        'menu_icon' => 'dashicons-edit', // icon
        'labels' => array(
            'name' => 'POST: logo đối tác',
            'add_new_item' => 'Add new: logo đối tác',
            'edit_item' => 'Edit: logo đối tác',
            'all_items' => 'All logo đối tác',
            'singular_name' => 'logo đối tác info'

        ),
        // ?????    
        // 'hierarchical' => true,
        // 'rewrite' => array(
        //     'slug' => 'logo-partner',
        //     // 'slug' => '/',
        //     // 'with_front' => false,
        // ),
        'supports' => array(
            'title',
            // 'page-attributes',
            // 'thumbnail',
            // 'editor',
            'excerpt',
            // 'custom-fields',
            // 'author',
            // 'comments',
            // 'custom-fields',
        ),
    ));
}

add_action('init', 'Create_Post_type');


?>