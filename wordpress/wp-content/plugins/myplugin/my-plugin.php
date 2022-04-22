<?php 
/**
* Plugin Name: My Plugin
* Plugin URI: http://www.mywebsite.com/my-first-plugin
* Description: The very first plugin that I have ever created. * Version: 1.0
* Author: Nha Phuong
* Author URI: http://www.mywebsite.com
*/


add_action('the_content', 'my_thank_you_text');

function my_thank_you_text( $content){
    return $content .= '<p>Thank you for reading</p>';
}

add_action('get_sidebar', 'my_rand');

function my_rand(){
    $args = array (
        'post_type'=>'post', //loai la post
        'orderby' => 'rand', //lay ngau nhien
        'posts_per_page' => 5 //lay 5 bai cho 1 trang
    );
    
    $the_query = new WP_Query($args);
    
     if($the_query->have_posts()):
            while($the_query->have_posts()):
                $the_query->the_post();
                echo the_title('<h4 class="text-uppercase">','</h4>');
                //get_the_author->return. the_author: in truc tiep
                echo get_the_author();
                echo the_date();
                echo the_content('<br><hr>');
        endwhile;
        endif;
}

