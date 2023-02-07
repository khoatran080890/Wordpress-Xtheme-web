


<?php


/*
    =======================================
    Support Function
    =======================================
*/
function get_id_by_slug($page_slug) { // get id from slug
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
} 

enum Breadscrum_type
{
    case parent;
    case category;
}
function get_custom_breadcrumbs($style) {
    // if ($style == "parent"){
    if ($style == Breadscrum_type::parent){
        global $post;
        // var_dump($post->ancestors);
        // var_dump($post->parent);
        // debug_print_backtrace();

        // $ancestors = $post->ancestors;
        // $parent = $post->parent;
        $ancestors = get_post_ancestors($post);
        $parent = get_post_parent($post);

        // var_dump($ancestors);
        // var_dump($parent);

        if (is_front_page()) {
            
            echo get_the_title(); 
        } 
        else {
            echo '<a href="'.home_url().'">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
            //Check if page has ancestors - if only one parent exists, this will be an empty array
            if($ancestors){
                //Reverse the array so out put starts at the top of the hierarchy
                $parents = array_reverse($ancestors);

                // echo 'ancestor';
                // var_dump(get_page_link($parent));
                // var_dump(get_the_title($parent));

                foreach($parents as $parent){
                    echo '<a href="'.get_page_link($parent).'">'.get_the_title($parent).'</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;';
                }
            }
            else if($parent){

                // echo 'parent';
                // var_dump(get_page_link($parent));
                // var_dump(get_the_title($parent));

                //Deal with single parent situation
                echo '<a href="'.get_page_link($parent).'">'.get_the_title($parent).'</a>&nbsp;';
            }
            //Present current title as simple text, no link

            // echo 'parent';

            // echo get_the_title();
            echo single_post_title(); // get_the_title: return most recent post => use single_post_title
        }
    }
    if ($style == Breadscrum_type::category){
        echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
        if (is_category() || is_single()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            the_category(' &bull; ');
                if (is_single()) {
                    echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                    the_title();
                }
        } elseif (is_page()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            echo the_title();
        } elseif (is_search()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
            echo '"<em>';
            echo the_search_query();
            echo '</em>"';
        }
    }
}




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
    Support function - core Wordpress
    =======================================
*/
function Support_query($query){
    // echo 'A' . !is_admin();
    // echo 'B' . is_post_type_archive('logo-partner');
    // echo 'C' . (!is_admin() and is_post_type_archive('logo-partner'));
    // echo 'D' . get_post_type();
    // echo 'E' . $query->get('post_type');
    if (!is_admin() AND $query->get('post_type') == 'logo-partner'/* AND $query->is_main_query()*/){
        $query->set('posts_per_page', '-1');
    }
}
add_action('pre_get_posts', 'Support_query');

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
}
function Function_support(){
    register_nav_menu('home_tab_manager','Home Tab Manager'); // auto add theme tab - lesson 20: navigation
    add_theme_support('title-tag'); // add tab title browser
    add_theme_support('post-thumbnails'); // add featured image for post and customized post
    add_image_size('img_100x100', 100, 100, true);
    add_image_size('img_960x540', 960, 540, true);
}

// load files
add_action( 'wp_enqueue_scripts', 'Load_file');
add_action( 'after_setup_theme', 'Function_support');


?>

<?php

function _show_newest_post($arg){
    ?>
    <div class="column_2_fixedcolumn1__column_1">
        <h3>Newest Post</h3>
        <?php 
            $query_newestpost = new WP_Query(array(
                'posts_per_page' => '3',
                'post_type' => 'post'
            ));
            while($query_newestpost->have_posts()){
                $query_newestpost->the_post(); ?>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p><?php the_time('Y/n/j'); ?></p>
                    <p><?php echo wp_trim_words(get_the_content(), $arg['post_exerpt_trim']) ?> <a href="<?php the_permalink() ?>">Read more</a></p>
                <?php
            }
            wp_reset_postdata(); 
        ?>
    </div>
    <?php
}

function _show_address(){
    ?>
    <div><p> <i class="fa-sharp fa-solid fa-location-dot"></i> 891/110 Nguyễn Kiệm, Phường 3, Quận Gò Vấp, TP HCM </p></div>
    <?php
}
function _show_phonenumber(){
    ?>
    <div><p> <i class="fa-solid fa-phone"></i>  012.345.6789 <span class="tab"></span><i class="fa-solid fa-phone"></i> 012.345.6789</p></div>
    <?php
}
function _show_email(){
    ?>
    <div><p> <i class="fa-solid fa-envelope"></i>  abc@gmail.com </p></div>
    <?php
}


?>