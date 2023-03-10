<h1> THIS IS FOR Index page index.php</h1>

<!-- for child page -->

<!-- HEADER -->
    <?php
        // info
        $current_id = get_the_ID();
        $current_title = get_the_title();
        $current_content = get_the_content();

        $current_parent_id = wp_get_post_parent_id($current_id);
        $current_parent_title = get_the_title($current_parent_id);

        $check_isparentpage = !$current_parent_id;
        // fix info
        
        // query
        
        
        ///////////////////////////////////////////////////////////////

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

    
    <div class="column_2_fixedcolumn1"> 


        <?php
            
            _show_newest_post(array(
                'post_exerpt_trim' => 25,
            ));
            
        ?>
        <div class="column_2_fixedcolumn1__column_2">
            <?php
                $query_post = new WP_Query(array(
                    'post_type'=>'post',
                    'posts_per_page' => 2,
                    // for custom paginate_links - get page number (from url) -> query data
                    // 1: mean when have no page number (from url) => get 1
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
                ); 
                
                if($query_post->have_posts()){
                    while($query_post->have_posts()){
                        $query_post->the_post();?>
                        <div class="post-container">
                            <h2 class="title title__medium title__post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="box"><p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('Y/n/j') ?> in <?php echo get_the_category_list(', '); ?></p></div>
                            <div class="content"><p><?php the_excerpt(); ?></p></div>
                            <div ><p><a class="button button__blue button__medium" href="<?php the_permalink(); ?>">Continue reading &raquo; </a></p></div>
                        </div>
                        <?php
                    }

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