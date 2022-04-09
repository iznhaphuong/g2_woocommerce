<?php 
get_header();
get_sidebar();
$args = array (
    'post_type'=>'post', //loai la post
    'orderby' => 'rand', //lay ngau nhien
    'posts_per_page' => 3 //lay 5 bai cho 1 trang
);

$the_query = new WP_Query($args);

// $wp_query->$posts lay ra nhieu bai viet
// $wp_query->$post lay ta bai viet moi nhat
// if($wp_query->have_posts()){         kiem tra co ton tai post
//     while($wp_query->have_posts()){
//         //call the next post
//         $wp_query->the_post();
//         echo $post->post_title. '<br>';
//     }
// }

if($the_query->have_posts()):
    echo '<div style = "background: pink">';
    while($the_query->have_posts()):
        $the_query->the_post();
        echo the_title('<h1 style="text-transform:uppercase;>','</h1');
        echo the_date();
        //get_the_author->return. the_author: in truc tiep
        echo the_author();
        echo the_date();
        echo the_content('<br><hr>');
endwhile;
echo '</div>';
endif;

get_footer();