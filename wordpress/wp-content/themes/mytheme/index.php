<?php 
get_header();

$args = array (
    'post_type'=>'product', //loai la post
    // 'orderby' => 'rand', //lay ngau nhien
    'posts_per_page' => 3 //lay 5 bai cho 1 trang
);
get_template_part( 'template-parts/content/carousel' );

get_template_part( 'template-parts/content/products' );

get_footer();