

<h1> THIS IS FOR POST: PRODUCT single-product.php</h1>

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
<div class="breadcrumb"><?php get_custom_breadcrumbs(Breadscrum_type::category_custom); ?></div> <!-- function.php -->

<!-- BODY -->

<div class="san-pham-body">
    <div class="san-pham-body__column_1">
        <div class="san-pham-body__column_1__Title">
            <p class="san-pham-body__column_1__Title__txt"><?php echo $current_title; ?></p>
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
                            onclick="_pagesanpham.Click_showitem(<?php echo $categories_categories_sanpham_child_child->term_id ?>)">
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
        </div>

    </div>
    <div class="san-pham-body__column_2"  id="content">
        <?php 
        $field_img_1 = get_field('product_icon_1'); 
        $field_img_2 = get_field('product_icon_2'); 
        $field_img_3 = get_field('product_icon_3'); 
        $field_img_4 = get_field('product_icon_4'); 
        $field_img_5 = get_field('product_icon_5'); 

        $field_txt_description = get_field('product_description'); 
        // var_dump($field_img_1);
        // get_theme_file_uri('/images/support images/emptyy_360x360.jpg')
        ?>
        <div class="block-production-icon-description">
            <div class="product-icon">
                <div class="product-icon__main">
                <img class="product-icon__main__child" 
                src="<?php echo (($field_img_1 != NULL) ? $field_img_1['sizes']['img_360x360'] : get_theme_file_uri('/images/support images/empty_360x360.jpg')); ?>" alt="<?php echo (($field_img_1 != NULL) ? $field_img_1['alt'] : "empty"); ?>" />
                </div>
                <div class="product-icon__sub">
                <img class="product-icon__sub__child" src="<?php echo (($field_img_1 != NULL) ? $field_img_1['sizes']['img_360x360'] : get_theme_file_uri('/images/support images/empty_360x360.jpg')); ?>" alt="<?php echo (($field_img_1 != NULL) ? $field_img_1['alt'] : "empty"); ?>" />
                <img class="product-icon__sub__child" src="<?php echo (($field_img_2 != NULL) ? $field_img_2['sizes']['img_360x360'] : get_theme_file_uri('/images/support images/empty_360x360.jpg')); ?>" alt="<?php echo (($field_img_2 != NULL) ? $field_img_2['alt'] : "empty"); ?>" />
                <img class="product-icon__sub__child" src="<?php echo (($field_img_3 != NULL) ? $field_img_3['sizes']['img_360x360'] : get_theme_file_uri('/images/support images/empty_360x360.jpg')); ?>" alt="<?php echo (($field_img_3 != NULL) ? $field_img_3['alt'] : "empty"); ?>" />
                <img class="product-icon__sub__child" src="<?php echo (($field_img_4 != NULL) ? $field_img_4['sizes']['img_360x360'] : get_theme_file_uri('/images/support images/empty_360x360.jpg')); ?>" alt="<?php echo (($field_img_4 != NULL) ? $field_img_4['alt'] : "empty"); ?>" />
                <img class="product-icon__sub__child" src="<?php echo (($field_img_5 != NULL) ? $field_img_5['sizes']['img_360x360'] : get_theme_file_uri('/images/support images/empty_360x360.jpg')); ?>" alt="<?php echo (($field_img_5 != NULL) ? $field_img_5['alt'] : "empty"); ?>" />
                </div>
            </div>
            <div class="product-description">
                <div class="product-description__title"><h2>
                    <?php echo $current_title; ?>
                </h2></div>
                <hr>
                <div class="product-description__content content"><p>
                    <?php
                    echo wpautop(get_the_content());
                    // echo $field_txt_description;
                    ?>
                </p></div>
            </div>
        </div>
        <hr>
        <hr>
        <hr>
        <div class="block-tabs">
            <div class="block-tabs__pannel">
                <div class="block-tabs__pannel__header">
                    <div class="block-tabs__pannel__header__tab__space-first">
                    </div>
                    <div class="block-tabs__pannel__header__tab content block-tabs__pannel__header__tab__active" id="product-technical-detail">
                        Technical Detail
                    </div>
                    <div class="block-tabs__pannel__header__tab content" id="product-review">
                        Review
                    </div>
                    <div class="block-tabs__pannel__header__tab__space-last">
                    </div>
                </div>
                <div class="block-tabs__pannel__body">
                    line 1
                    <br>
                    line 2
                    <br>
                    line 3
                    <br>
                    line 4
                </div>
            </div>
        </div>
        
        
    
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