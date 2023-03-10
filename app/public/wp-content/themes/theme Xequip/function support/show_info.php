


<?php

function _show_newest_post($arg){
    ?>
    <div class="column_2_fixedcolumn1__column_1">
        <h3>Newest Post</h3>
        <?php 
            $query_newestpost = new WP_Query(array(
                'posts_per_page' => '3',
                'post_type' => 'post'
            ));
            while($query_newestpost->have_posts()){
                $query_newestpost->the_post(); ?>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p><?php the_time('Y/n/j'); ?></p>
                    <p><?php echo wp_trim_words(get_the_content(), $arg['post_exerpt_trim']) ?> <a href="<?php the_permalink() ?>">Read more</a></p>
                <?php
            }
            wp_reset_postdata(); 
        ?>
    </div>
    <?php
}

function _show_address(){
    ?>
    <div><p> <i class="fas fa-map-marker-alt"></i></i> 891/110 Nguyễn Kiệm, Phường 3, Quận Gò Vấp, TP HCM </p></div>
    <?php
}
function _show_phonenumber(){
    ?>
    <div><p> <i class="fas fa-phone"></i></i>  012.345.6789 <span class="tab"></span><i class="fas fa-phone"></i></i> 012.345.6789</p></div>
    <?php
}
function _show_email(){
    ?>
    <div><p> <i class="fas fa-envelope"></i></i>  abc@gmail.com </p></div>
    <?php
}
function _show_wordkingtime(){
    ?>
    <div><p> - Thứ 2-7 : 08h - 17h30 </p></div>
    <div><p> - Chủ nhật: 09h - 17h </p></div>
    <div><p> - Nghỉ Trưa: 12h - 13h30  </p></div>
    <?php
}





function _get_empty_img(){
    ?>
    <img class="product-icon__sub__child" src="<?php echo $field_img_1['sizes']['img_360x360']; ?>" alt="<?php echo $field_img_1['alt']; ?>" />
    <?php
}
?>