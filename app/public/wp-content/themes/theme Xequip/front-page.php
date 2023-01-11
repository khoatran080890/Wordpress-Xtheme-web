<!-- for main page - http://xequip.local/-->
HOME PAGE - FRONT PAGE
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
    }

    while(have_posts()){
        echo the_post(); ?>
        <p> <a  href ="<?php the_permalink() ?>"> <?php the_title(); ?> </a></p>
        <p> <?php the_content(); ?> </p>
        <hr>
        <?php
    }


    get_footer();
?>







