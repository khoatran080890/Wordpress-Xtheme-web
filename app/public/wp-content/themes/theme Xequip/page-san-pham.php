
<h1> THIS IS FOR PAGE SẢN PHẨM page-san-pham.php</h1>

<!-- HEADER -->
<?php
    $current_id = get_the_ID();
    $current_title = get_the_title();
    $current_content = get_the_content();

    $current_parent_id = wp_get_post_parent_id($current_id);
    $current_parent_title = get_the_title($current_parent_id);

    $check_isparentpage = !$current_parent_id;


    const pagesanpham_clickcategory_one_active = 0;
    const pagesanpham_clickcategory_multiple_active = 1;
    
    get_header();
?>
<hr>
<hr>
<hr>
<div class="breadcrumb"><?php get_custom_breadcrumbs(Breadscrum_type::parent); ?></div> <!-- function.php -->

<!-- BODY -->

<div class="san-pham-body">
    <div class="san-pham-body__column_1">
        <div class="san-pham-body__column_1__Title">
            <p class="san-pham-body__column_1__Title__txt"><?php echo $current_title; ?></p>
        </div>
        <div class="san-pham-body__column_1__Category">
            <!-- <ul style="list-style: none;"> -->
            <?php
                // $current_child = wp_list_pages(array(
                //     'title_li' => NULL,
                //     // 'child_of' => $current_id,
                //     // 'echo' => false,
                // ));
                
                // echo '<pre>'; print_r($current_child); echo '</pre>';


                /*
                $child_args = array(
                    'post_parent' => $current_id, // The parent id.
                    'post_type'   => 'page',
                    'post_status' => 'publish'
                );
                $children = get_children( $child_args );
                echo '<pre>'; print_r($children); echo '</pre>';
                */


                /*
                $testarray = get_pages(array(
                    'child_of' => $current_id,
                ));
                echo '<pre>'; print_r($testarray); echo '</pre>';
                */

                $categories_sanpham = get_categories(
                    array(
                        'parent' => get_category_by_slug('/san-pham')->term_id
                    )
                );
                if ($categories_sanpham){
                    foreach ($categories_sanpham as $categories_sanpham_child) {
                        // print_nice($categories_sanpham_child);
                        ?>
                        <div class="san-pham-body__column_1__Category__item"    
                        id="<?php echo $categories_sanpham_child->term_id ?>">
                        <div class="san-pham-body__column_1__Category__item__parent"
                        onclick="_pagesanpham.Click_showdropdown(<?php echo $categories_sanpham_child->term_id ?>, <?php echo pagesanpham_clickcategory_one_active ?>)">
                            <i class="fas fa-chevron-right"><?php echo " " . $categories_sanpham_child->name ?></i>
                        </div>
                        <?php
                        // sub_category
                        $categories_categories_sanpham_child = get_categories(
                            array(
                                'parent' => $categories_sanpham_child->term_id
                            ));
                        if ($categories_categories_sanpham_child){
                            foreach ($categories_categories_sanpham_child as $categories_categories_sanpham_child_child) {
                                // print_nice($categories_categories_sanpham_child_child);
                                ?>
                                <div class="san-pham-body__column_1__Category__item__child tab__2" 
                                id="child_<?php echo $categories_sanpham_child->term_id ?>"
                                onclick="_pagesanpham.Click_showitem(<?php echo $categories_sanpham_child->term_id ?>)">
                                <i class="fas fa-chevron-right"></i>
                                <?php echo " " . $categories_categories_sanpham_child_child->name ?></div>
                                <?php
                            }
                        }
                        ?>
                        </div>
                        <?php
                    }
                }
                


               

            ?>
            <!-- </ul> -->
        </div>

    </div>
    <div class="san-pham-body__column_2" id="content">
    <hr>
    <p><a href="#"> <?php $current_title ?> </a></p>
    <?php
            $query_post = new WP_Query(array(
                'post_type'=>'product',
                'cat' => $cat,
                'posts_per_page' => -1,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
            ); 
            
            if($query_post->have_posts()){
                ?>
                <div class="container_product_item">
                <?php
                while($query_post->have_posts()){
                    $query_post->the_post();?>
                    <div class="container_product_item__box">
                        <a href="<?php the_permalink(); ?>">
                        <img class="container_product_item__box__icon" src="<?php echo get_theme_file_uri( '/images/slideshow/apples.jpg' ) ?>" alt="test icon" />
                        <p class="title title__small title__post-title container_product_item__box__price"><?php echo get_field('price_presale') ?></p>
                        <p class="title title__small title__post-title container_product_item__box__title"><?php the_title(); ?></p>
                        <p class="title title__small title__post-title container_product_item__box__sold">Đã bán: <?php echo get_field('sold') ?></p>
                        </a>
                        
                    </div>
                    <?php
                }
                ?>
                </div>
                <?php

                $total_pages = $query_post->max_num_pages;
                if ($total_pages > 1){
                    // $current_page = max(1, get_query_var('paged'));
                    ?>
                    <div class="paginate-container"> <?php
                    echo paginate_links(array(
                        // 'base' => get_pagenum_link(1) . '%_%',
                        // 'format' => '/page/%#%',
                        // 'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text' => '<',
                        'next_text' => '>',
                        'before_page_number' => ''
                    ));
                    ?> </div> <?php
                }

                wp_reset_postdata();
            } ?>

    </div>
</div>





    <!-- FOOTER -->
    <hr>
    <hr>
    <hr>
    <?php
    get_footer();
?>