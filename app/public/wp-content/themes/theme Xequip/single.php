
<h1> THIS IS FOR ALL POST single.php</h1>


<?php

    $field_relatedpost = get_field('related_posts');


    get_header();
?>

<div class="breadcrumb"><?php get_custom_breadcrumbs(Breadscrum_type::category); ?></div> <!-- function.php -->

<div class="column_2_fixedcolumn1"> 
    <div class="column_2_fixedcolumn1__column_1">

    </div>
    <div class="column_2_fixedcolumn1__column_2">
    <?php


        while(have_posts()){
            echo the_post(); ?>

            <h1> <?php the_title(); ?> </h1>
            <hr>
            <h2> Subtitle </h2>
            <hr>
            <div><p> <i class="fa-regular fa-clock"></i>  Posted by <?php the_author_posts_link(); ?> on <?php the_time('Y/n/j') ?> in <?php echo get_the_category_list(', '); ?></p></div>
            <hr>
            <div class="img-fixwidth"> <?php the_post_thumbnail('img_960x540'); ?> </div>
            <div class="content"><p> <?php the_content(); ?> </p></div>
            
            <?php
        } ?>



    <hr class="break-line">
    <?php

        ?>
        <h2 class="content">
            Bài viết liên quan:
        </h2>

        <ul class="hyperlink-li">
        <?php
        if ($field_relatedpost){
            foreach($field_relatedpost as $post){
                ?>
                <li><a href="<?php echo get_permalink(); ?>">
                    <?php
                    echo get_the_title();
                    ?>
                </a></li>
                <?php
            }
            // print_r($field_relatedpost);
            // var_dump($field_relatedpost);
        }
        ?>
        </ul>
        <?php
    ?>


    </div>
</div>


<?php
    get_footer();
?>