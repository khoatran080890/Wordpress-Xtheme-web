
<h1> THIS IS FOR ALL PAGE page.php</h1>

<!-- HEADER -->
<?php
    $current_id = get_the_ID();
    $current_title = get_the_title();
    $current_content = get_the_content();

    $current_parent_id = wp_get_post_parent_id($current_id);
    $current_parent_title = get_the_title($current_parent_id);

    $check_isparentpage = !$current_parent_id;


    if($check_isparentpage){
        ?>
        <h1>THIS IS PAGE - parent</h1>
        <?php
    }
    else{
        ?>
        <h1>THIS IS PAGE - child</h1>
        <?php
    }
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


                $childpage = array(
                    'post_parent' => $current_id,
                    'post_type' => 'page',
                    'orderby' => 'menu_order'
                );
                $query_childpage = new WP_Query($childpage);
                ?>
                <?php while ($query_childpage->have_posts()) : $query_childpage->the_post(); 
                    $parent_id = get_the_ID(); ?>
                    <div class="san-pham-body__column_1__Category__item" id="<?php echo $parent_id ?>"><a href="#"><?php the_title(); ?></a>


                    <?php
                    $childpage_in = array(
                        'post_parent' => get_the_ID(),
                        'post_type' => 'page',
                        'orderby' => 'menu_order'
                    );
                    $query_childpage_in = new WP_Query($childpage_in);
                    ?>
                    <?php while ($query_childpage_in->have_posts()) : $query_childpage_in->the_post(); 
                        $child_id = get_the_ID(); ?>
                        <div class="san-pham-body__column_1__Category__item__item" id="<?php echo $parent_id . '_' . $child_id ?>"><a href="#"><?php the_title(); ?></a></div>
                    <?php endwhile; ?>
                    </div>


                    <?php endwhile; ?>
                <?php
                wp_reset_postdata();

            ?>
            <!-- </ul> -->
        </div>

    </div>
    <div class="san-pham-body__column_2">
    <hr>
    <p><a href="#"> <?php $current_title ?> </a></p>
    <?php
        while(have_posts()){
            echo the_post(); ?>
                <h2> <?php echo $current_title; ?> </h2>
                <p> <?php echo $current_content; ?> </p>
                <hr>
            <?php
        }
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