<!-- for main page - http://xequip.local/-->
<h1> HOME PAGE - FRONT PAGE front-page.php</h1>

<?php
    get_header(); ?>


    <div class="home-slideshow">
        <div class="home-slideshow__container">
            <div class="home-slideshow__container__holder">
            <img class="home-slideshow__container__holder__img" src="<?php echo get_theme_file_uri( '/images/slideshow/apples.jpg' ) ?>" alt="slideshow 1" />
            </div>
            <div class="home-slideshow__container__holder">
                <img class="home-slideshow__container__holder__img" src="<?php echo get_theme_file_uri( '/images/slideshow/bread.jpg' ) ?>" alt="slideshow 1" />
            </div>
            <div class="home-slideshow__container__holder">
                <img class="home-slideshow__container__holder__img" src="<?php echo get_theme_file_uri( '/images/slideshow/bus.jpg' ) ?>" alt="slideshow 1" />
            </div>
        </div>
        <button class="home-slideshow__btn-back" id="home-slideshow-btn-back" onclick="slideshow_add(-1)">Back</button>
        <button class="home-slideshow__btn-next" id="home-slideshow-btn-next" onclick="slideshow_add(1)">Next</button>
    </div>

    <h1>PAGE</h1>
    <?php
    $pages = get_pages();
    foreach ($pages as $page) {
        echo $page->post_title;
        echo $page->post_content;
        ?>
        <hr>
        <hr>
        <hr>
        <?php
    }?>

    <h1>POST</h1>
    <?php
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'post',
    );
    $query_post = new WP_Query( $args );
    if($query_post->have_posts()){
        while($query_post->have_posts()){
            $query_post->the_post();?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_time('Y/n/j'); ?></p>
                <p><?php echo wp_trim_words(get_the_content(), 100) ?> <a href="<?php the_permalink() ?>">Read more</a></p><?php
        }
        wp_reset_postdata(); 
    }

    

    get_footer();
?>







