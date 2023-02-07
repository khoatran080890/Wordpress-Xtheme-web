<h1> THIS IS FOOTER footer.php</h1>



<div class="column_2_even"> 
    <div class="column_2_even__column_1">
        <?php
            _show_address();
            _show_phonenumber();
            _show_email();
        ?>
        <span class="enter__2">
        <div><p> Copyright ©2022 ABC Co., Ltd All rights reserved </p></div>

    </div>
    <div class="column_2_even__column_2">

        <?php
            $query_newestpost = new WP_Query(array(
                'post_type' => 'logo-partner',
                'posts_per_page' => '-1',
                
                // case orderby field
                // 'meta_key' => 'field_name',
                // 'orderby' => 'meta_value_num',
                // 'meta_query' => array(
                //     array(
                //         'key' => 'field_name',
                //         'compare' => '>=',
                //         'value' => date('Ymd'),
                //         'type' => 'numeric',
                //     ),
                // ),
                'orderby' => 'post_date',
                'order' => 'ASC', // DESC

            ));
            while($query_newestpost->have_posts()){
                $query_newestpost->the_post(); 
                    $field_img = get_field('field-icon');
                    ?>
                    <img class="footer__logo-partner" src="<?php echo $field_img['sizes']['img_100x100']; ?>" alt="<?php echo $field_img['alt']; ?>" />
                <?php
            }
            wp_reset_postdata(); 
        ?>

    </div>
</div>




        <?php wp_footer(); ?> <!-- load file (functions.php) - end + load black admin bar -->
    </body> 
</html>