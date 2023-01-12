<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <h1> THIS IS HEADER header.php</h1>
        <meta charset="<?php bloginfo('charset'); ?>"> <!-- ??? -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- for more resposive design -->
        <script src="https://kit.fontawesome.com/07f2da793f.js" crossorigin="anonymous"></script> <!-- add font from fontawesome -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"> -->
        <!-- tab title -->
        <!-- <title> TITLE </title> -->
        <?php wp_head(); ?> <!-- load file (functions.php) - begin  + load black admin bar-->
    </head>
    
    <!-- show current page info - id - child or parent -->
    <body <?php body_class(); ?>> 
        <div class="header"> 
            <div class="header__logo">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_file_uri('/images/ocean.jpg') ?>" alt="logo Sequip" class="header__logo__img"/></a>
                <!-- <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div> -->
               
            </div>
            

            <div class="header__category">


                <?php
                    // // auto at home tab
                    // $menuParameters = wp_nav_menu(array(
                    //     'container' => false,
                    //     'echo' => true,
                    //     'items_wrap' => '%3$s', // remove <ul>
                    //     'li_class' => 'header__category__txt',
                        
                    //     // 'walker' => new Menu_Walder()
                    // ));
                    // // echo strip_tags($menuParameters, '<a><div>' );

                ?>
                

                <div class="header__category__txt <?php if(is_page('gioi-thieu') 
                or wp_get_post_parent_id(get_the_ID()) == get_id_by_slug('gioi-thieu')) echo 'header__category__boldtxt' ?>"><a href="<?php echo site_url('/gioi-thieu'); ?>">Giới thiệu</a></div>
                <div class="header__category__txt <?php if(is_page('san-pham')
                or wp_get_post_parent_id(get_the_ID()) == get_id_by_slug('san-pham')) echo 'header__category__boldtxt' ?>"><a href="<?php echo site_url('/san-pham'); ?>">Sản phẩm</a></div>
                <div class="header__category__txt <?php if(is_page('tin-tuc')
                or wp_get_post_parent_id(get_the_ID()) == get_id_by_slug('tin-tuc')) echo 'header__category__boldtxt' ?>"><a href="<?php echo site_url('/tin-tuc'); ?>">Tin tức</a></div>
                <div class="header__category__txt <?php if(is_page('cau-hoi-thuong-gap')
                or wp_get_post_parent_id(get_the_ID()) == get_id_by_slug('cau-hoi-thuong-gap')) echo 'header__category__boldtxt' ?>"><a href="<?php echo site_url('/cau-hoi-thuong-gap'); ?>">Câu hỏi thường gặp</a></div>
                <div class="header__category__txt <?php if(is_page('lien-he')
                or wp_get_post_parent_id(get_the_ID()) == get_id_by_slug('lien-he')) echo 'header__category__boldtxt' ?>"><a href="<?php echo site_url('/lien-he'); ?>">Liên hệ</a></div>
            </div>
 
            
            

        </div>

        
        


