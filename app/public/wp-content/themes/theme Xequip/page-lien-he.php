
<h1> THIS IS FOR PAGE LIÊN HỆ page-lien-he.php</h1>



<!-- HEADER -->
<?php
    $current_id = get_the_ID();
    $current_title = get_the_title();
    $current_content = get_the_content();

    $current_parent_id = wp_get_post_parent_id($current_id);
    $current_parent_title = get_the_title($current_parent_id);

    $check_isparentpage = !$current_parent_id;


    get_header();
?>
<hr>
<hr>
<hr>
<div class="breadcrumb"><?php get_custom_breadcrumbs(Breadscrum_type::parent); ?></div> <!-- function.php -->

<!-- BODY -->

<div class="san-pham-body">
    <div class="san-pham-body__column_1">
        
    </div>
    <div class="san-pham-body__column_2">
    <hr>
    <p><a href="#"> <?php $current_title ?> </a></p>
    <?php
        while(have_posts()){
            echo the_post(); ?>
                <h2> <?php echo $current_title; ?> </h2>
                <p> <?php echo $current_content; ?> </p>
                <?php
                _show_address();
                _show_phonenumber();
                _show_email();
                ?>
                <hr>
                <h2> ĐỂ LẠI THÔNG TIN CỦA BẠN </h2>


                <div class="form-input-holder__item"> 
                    <i class="fa fa-user form-input-holder__item__icon" aria-hidden="true"></i> 
                    <input class="form-input-holder__item__input" type="text" value="" size="40" placeholder="Nhập họ và tên" id="lien-he-name">
                </div>
                <div class="form-input-holder__item"> 
                    <i class="fas fa-envelope form-input-holder__item__icon" aria-hidden="true"></i> 
                    <input class="form-input-holder__item__input" type="text" value="" size="40" placeholder="Nhập email" id="lien-he-mail">
                </div>
                <div class="form-input-holder__item"> 
                    <i class="fas fa-phone form-input-holder__item__icon" aria-hidden="true"></i> 
                    <input class="form-input-holder__item__input" type="text" value="" size="40" placeholder="Nhập số điện thoại" id="lien-he-phone">
                </div>

                <button class="form-input-holder__button button button__red button__small" id="lien-he-send" >Gửi đi</button>

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