

<h1> THIS IS FOR CATEGORY category.php</h1>

<!-- HEADER -->
<?php
    $current_id = get_the_ID();
    // $current_title = single_cat_title();
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
<div class="breadcrumb"><?php get_custom_breadcrumbs(Breadscrum_type::category_custom); ?></div> <!-- function.php -->

<!-- BODY -->

<div class="san-pham-body">
    <div class="san-pham-body__column_1">
        <div class="san-pham-body__column_1__Title">
            <p class="san-pham-body__column_1__Title__txt"><?php echo single_cat_title(); ?></p>
        </div>
        <div class="san-pham-body__column_1__Category">
            <?php

                $categories_sanpham = get_categories(
                    array(
                        'parent' => get_category_by_slug('/san-pham')->term_id
                    )
                );
                if ($categories_sanpham){
                    foreach ($categories_sanpham as $categories_sanpham_child) {
                        ?>
                        <div class="san-pham-body__column_1__Category__item" id="<?php echo $categories_sanpham_child->term_id ?>" 
                        onclick="_pagesanpham.Click(<?php echo $categories_sanpham_child->term_id ?>, <?php echo pagesanpham_clickcategory_one_active ?>)">
                        <a href="<?php echo get_category_link($categories_sanpham_child->term_id); ?>"><i class="fas fa-chevron-right"></i>
                        <?php echo $categories_sanpham_child->name ?></a>
                        <?php
                        // sub_category
                        $categories_categories_sanpham_child = get_categories(
                            array(
                                'parent' => $categories_sanpham_child->term_id
                            ));
                        if ($categories_categories_sanpham_child){
                            foreach ($categories_categories_sanpham_child as $categories_categories_sanpham_child_child) {
                                ?>
                                <div class="san-pham-body__column_1__Category__item__item tab__2" id="child_<?php echo $categories_sanpham_child->term_id ?>">
                                <a href="<?php echo get_category_link($categories_categories_sanpham_child_child->term_id); ?>"><i class="fas fa-chevron-right"></i>
                                <?php echo $categories_categories_sanpham_child_child->name ?></a></div>
                                <?php
                            }
                        }
                        ?>
                        </div>
                        <?php
                    }
                }

            ?>
        </div>

    </div>
    <div class="san-pham-body__column_2">
        
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
                        <img class="container_product_item__box__icon" src="<?php echo get_theme_file_uri( '/images/slideshow/apples.jpg' ) ?>" alt="test icon" />
                        <h2 class="title title__small title__post-title center container_product_item__box__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
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


    <hr>
    <p><a href="#"> <?php $current_title ?> </a></p>
    <?php
        
       
    ?>

    </div>
</div>





    <!-- FOOTER -->
    <hr>
    <hr>
    <hr>
    <?php
    get_footer();
    print_r(is_category(4));
    // print_nice(check_if_subcategory_grandsubcategory($cat, 4));
?>