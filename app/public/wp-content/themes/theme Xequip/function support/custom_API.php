


<?php

function Create_custom_API(){
    register_rest_route('api/v1', 'get_products_info', array(
        'method' => WP_REST_SERVER::READABLE,
        'callback' => 'get_products_info_Result'
    ));
}

function get_products_info_Result(){
    $products = new WP_Query(array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    ));
    $products_custom = array();
    
    while($products->have_posts()){
        $products->the_post();

        array_push($products_custom, array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'price_presale' => get_field('price_presale') != NULL ? get_field('price_presale') : '',
            'sold' => get_field('sold') != NULL ? get_field('sold') : '',
            'id' => get_the_ID(),
            'id_category' => get_the_category(get_the_ID())[0]->term_id,
        ));
    }

    return $products_custom;
    // return $products;
}

add_action('rest_api_init', 'Create_custom_API');



?>