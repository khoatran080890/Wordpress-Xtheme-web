


<?php


// /*
//     =======================================
//     Support Function
//     =======================================
// */
// function get_id_by_slug($page_slug) { // get id from slug
//     $page = get_page_by_path($page_slug);
//     if ($page) {
//         return $page->ID;
//     } else {
//         return null;
//     }
// } 

// function get_custom_breadcrumbs($style) {
//     if ($style == "parent"){
//         global $post;
//         // var_dump($post->ancestors);
//         // var_dump($post->parent);
//         // debug_print_backtrace();

//         // $ancestors = $post->ancestors;
//         // $parent = $post->parent;
//         $ancestors = get_post_ancestors($post);
//         $parent = get_post_parent($post);

//         // var_dump($ancestors);
//         // var_dump($parent);

//         if (is_front_page()) {
            
//             echo get_the_title(); 
//         } 
//         else {
//             echo '<a href="'.home_url().'">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
//             //Check if page has ancestors - if only one parent exists, this will be an empty array
//             if($ancestors){
//                 //Reverse the array so out put starts at the top of the hierarchy
//                 $parents = array_reverse($ancestors);

//                 // echo 'ancestor';
//                 // var_dump(get_page_link($parent));
//                 // var_dump(get_the_title($parent));

//                 foreach($parents as $parent){
//                     echo '<a href="'.get_page_link($parent).'">'.get_the_title($parent).'</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
//                 }
//             }
//             else if($parent){

//                 // echo 'parent';
//                 // var_dump(get_page_link($parent));
//                 // var_dump(get_the_title($parent));

//                 //Deal with single parent situation
//                 echo '<a href="'.get_page_link($parent).'">'.get_the_title($parent).'</a>&nbsp;';
//             }
//             //Present current title as simple text, no link

//             // echo 'parent';
//             // var_dump(get_the_title());

//             echo get_the_title();
//         }
//     }
//     if ($style == "category"){
//         echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
//         if (is_category() || is_single()) {
//             echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
//             the_category(' &bull; ');
//                 if (is_single()) {
//                     echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
//                     the_title();
//                 }
//         } elseif (is_page()) {
//             echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
//             echo the_title();
//         } elseif (is_search()) {
//             echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
//             echo '"<em>';
//             echo the_search_query();
//             echo '</em>"';
//         }
//     }
// }




// /*
//     =======================================
//     Import other .php
//     =======================================
// */
// // require_once('Function Support/function_Walker_navigation.php');
// require get_template_directory() . '/Function Support/function_Walker_navigation.php';

// /*
//     =======================================
//     Support
//     =======================================
// */
// // add classes to wp_nav_menu
// function wp_nav_menu_change_li_class($classes, $item, $args) {
//     if(isset($args->li_class)) {
//         $classes[] = $args->li_class;
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'wp_nav_menu_change_li_class', 1, 3);

// // add classes to wp_list_pages
// function wp_list_pages_filter($output) {
//     $output = str_replace('page_item', 'page_item san-pham-body__column_1__Category__item', $output);
//     return $output;
// }
// add_filter('wp_list_pages', 'wp_list_pages_filter');

/*
    =======================================
    Load file
    =======================================
*/
function Load_file(){
    // wp_enqueue_style('file_css_main', get_theme_file_uri( '/build/style-index.css' ));
    // wp_enqueue_style('file_css_support', get_theme_file_uri( '/build/index.css' ));

    wp_enqueue_style( 'file_css_support', get_theme_file_uri( '/css/style.css' )); // load css file
    wp_enqueue_script( 'file_javascript', get_theme_file_uri( '/js/index.js' ), array('jquery'), '1.0', true ); // load javasccript
    wp_enqueue_script( 'file_javascript', get_theme_file_uri( '/js/page.js' ), array('jquery'), '1.0', true );
}
function Function_support(){
    register_nav_menu('home_tab_manager','Home Tab Manager'); // auto add theme tab - lesson 20: navigation
    add_theme_support( 'title-tag'); // add tab title browser
}

// load files
add_action( 'wp_enqueue_scripts', 'Load_file');
add_action( 'after_setup_theme', 'Function_support');


?>