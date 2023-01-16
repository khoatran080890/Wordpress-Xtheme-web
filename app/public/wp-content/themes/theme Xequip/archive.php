

<h1> THIS IS FOR ALL ARCHIVE archive.php</h1>


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
    <div><h1>
        <?php 
            //the_archive_title(); // replace all
            if (is_category()){
                single_cat_title();
            } 
            if (is_author()){
                echo "Post by "; the_author();
            }
            if (is_year()){
                echo "Year: "; the_time('Y');
            }
            if (is_month()){
                echo "Month: "; the_time('n');
            }
            if (is_day()){
                echo "Day: "; the_time('j');
            }
        ?> 
    </h1></div>
    <div><p>
        <?php
            echo "Description: "; the_archive_description();
        ?>
    <p></div>
    <hr>
    <hr>
    <hr>
    <div class="column_2_fixedcolumn1"> 
        <div class="column_2_fixedcolumn1__column_1">
        </div>

        <div class="column_2_fixedcolumn1__column_2">
            <?php
                while(have_posts()){
                    the_post();?>
                    <div class="post-container">
                        <h2 class="title title__medium title__post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="box"><p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('Y/n/j') ?> in <?php echo get_the_category_list(', '); ?></p></div>
                        <div class="content"><p><?php the_excerpt(); ?></p></div>
                        <div ><p><a class="button button__blue" href="<?php the_permalink(); ?>">Continue reading &raquo; </a></p></div>
                    </div>
                    <?php
                }
                ?>
                <div class="paginate-container"> <?php
                echo paginate_links(array(
                    'prev_text' => '<',
                    'next_text' => '>',
                    'before_page_number' => ''
                )); 
                ?>
                </div>
        </div>
    </div>

    

    <!-- FOOTER -->
    <hr>
    <hr>
    <hr>
    <?php
    get_footer();
?>