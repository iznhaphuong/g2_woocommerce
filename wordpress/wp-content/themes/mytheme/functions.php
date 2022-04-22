<?php
//Thêm search box 
// add_filter( 'wp_nav_menu_items','add_search_box', 
// 10, 2 );
// function add_search_box( $items, $args ) {
// $items .= '<li>' . get_search_form( false ) . 
// '</li>';
// return $items;
// }

//Hiển thị admin bar
add_filter( 'show_admin_bar', '__return_true');

/**
*@ Thiết lập hàm hiển thị menu
*@ mytheme_menu( $slug )
**/
if ( ! function_exists( 'mytheme_menu' ) ) {
   function mytheme_menu( $slug ) {
     $menu = array(
       'them_location' => $slug,
       'container' => 'nav',
       'container_class' => "navMenu",
  );
     wp_nav_menu( $menu );
   }
}
/**
 * Đăng kí menu
 */
function nav_add_custom_menu(){
  register_nav_menu('my-custom-menu',__('My Custom Menu'));
}

add_action('init', 'nav_add_custom_menu');


/**
 * Thêm CSS
 */
function my_styles(){
    //tra ve duong da de file style.css
    wp_register_style('main-style', get_template_directory_uri() . '/style.css', 'all');
    
    wp_enqueue_style( 'main-style' );
}
add_action('wp_enqueue_scripts', 'my_styles');
?>


<?php 
/**
*@ Thiết lập hàm hiển thị logo
*@ mytheme_logo()
**/

if ( ! function_exists( 'mytheme_logo' ) ) {
   function mytheme_logo() {?>
<div class="logo pt-5">
        <?php
           printf(
             //truyền các tham số lần lượt url, title, logo, description
             '
             <a href="%s" title="%s"><img class="img-fluid mx-auto" id="img-logo" src="%s"></a>
             <h5>%s</h5>
             ',
             get_bloginfo( 'url' ),
             get_bloginfo( 'sitename' ),
             esc_url( get_stylesheet_directory_uri() ) . '/images/logo.png ',
             get_bloginfo( 'description' )
           );
         }  ?>
</div>
<?php } ?>