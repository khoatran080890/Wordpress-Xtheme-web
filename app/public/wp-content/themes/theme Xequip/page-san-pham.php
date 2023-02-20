
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
                        <div class="san-pham-body__column_1__Category__item" id="<?php echo $categories_sanpham_child->term_id ?>" 
                        onclick="_pagesanpham.Click(<?php echo $categories_sanpham_child->term_id ?>, <?php echo pagesanpham_clickcategory_one_active ?>)">
                        <a href="<?php echo get_category_link($categories_sanpham_child->term_id); ?>"><i class="fas fa-chevron-right"></i>
                        <?php echo " " . $categories_sanpham_child->name ?></a>
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
                                <div class="san-pham-body__column_1__Category__item__item tab__2" id="child_<?php echo $categories_sanpham_child->term_id ?>">
                                <a href="<?php echo get_category_link($categories_categories_sanpham_child_child->term_id); ?>"><i class="fas fa-chevron-right"></i>
                                <?php echo " " . $categories_categories_sanpham_child_child->name ?></a></div>
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
    <div class="san-pham-body__column_2">
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
?>