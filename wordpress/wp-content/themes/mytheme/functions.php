
<?php 
/**
*@ Thiết lập hàm hiển thị logo
*@ mytheme_logo()
**/
if ( ! function_exists( 'mytheme_logo' ) ) {
   function mytheme_logo() {?>
     <div class="logo">
       <div class="site-name ">
        <?php
           printf(
             '<h1><a href="%s" title="%s">%s</a></h1>',
             get_bloginfo( 'url' ),
             get_bloginfo( 'description' ),
             get_bloginfo( 'sitename' )
           );
         } // endif ?>
    </div>
       <div class="site-description"><?php bloginfo( 'description' ); ?></div>
     </div>
<?php } ?>

<?php
/**
*@ Thiết lập hàm hiển thị menu
*@ mytheme_menu( $slug )
**/
if ( ! function_exists( 'mytheme_menu' ) ) {
   function mytheme_menu( $slug ) {
     $menu = array(
       'theme_location' => $slug,
       'container' => 'nav',
       'container_class' => $slug,
);
     wp_nav_menu( $menu );
   }
}

function my_styles(){
    //tra ve duong da de file style.css
    wp_register_style('main-style', get_template_directory_uri() . '/style.css', 'all');
    
    wp_enqueue_style( 'main-style' );
}
 add_action('wp_enqueue_scripts', 'my_styles');

function add_favicon() {
    echo '<link rel="shortcut icon" type="image/png" href="'.get_template_directory_uri().'/public/images/favicon.jpeg" />';
}

add_action('wp_head', 'add_favicon');


function nav_add_custom_menu(){
    register_nav_menu('my-custom-menu',__('My Custom Menu'));
}

// add_action('init', 'nav_add_custom_menu');