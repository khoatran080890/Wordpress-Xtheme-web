
<h1> THIS IS FOR ALL POST single.php</h1>


<?php
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
            <div class="content"><p> <?php the_content(); ?> </p></div>
            
            <?php
        } ?>
    </div>
</div>
<hr>
<?php
    get_footer();
?>