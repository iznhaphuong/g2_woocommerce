<?php

/**
 * Lấy sản phẩm theo danh mục
 */
function getSearchResult($s)
{
  return wc_get_products(array(
    'post_type'=>'product', 
    'post_status'=>'publish',
    's' => $s 
  ));
}

/**
 * Lấy tất cả danh mục sản phẩm
 */
function getCategories(){
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;
  $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'hide_empty'   => $empty
  );
  return get_categories($args);
}
/**
 * Lấy ra danh mục con của $category_id
 */
function getSubCategories($category_id) {
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
    'taxonomy'     => $taxonomy,
    'child_of'     => 0,
    'parent'       => $category_id,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
);

return get_categories( $args );
}
?>


<?php
/**
 * Get sale %
 */
function getSalePercent( $product_id ) {
  $product = wc_get_product($product_id);
  $sale_percent = 0;
  if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {
      $regular_price  = $product->get_regular_price();
      $sale_price     = $product->get_sale_price();
      $sale_percent = round( ( ( floatval( $regular_price ) - floatval( $sale_price ) ) / floatval( $regular_price ) ) * 100 );
  } 
  return str_replace( '{sale_percent}', $sale_percent, '-{sale_percent}%' );
}

add_filter('woocommerce_sale_flash', 'my_woocommerce_sale_flash', 10, 3);
function my_woocommerce_sale_flash($html, $post, $product_id){
    return '<span class="onsale">'. getSalePercent($product_id) . '</span>';
}

/**
 * Lấy sản phẩm mới nhất
 */
function getRandProducts($args){
  return $latestProduct = wc_get_products(array(
    'post_type'=>'product', 
    'post_status'=>'publish',
    'orderby' => 'rand', //lay ngau nhien
    'posts_per_page'=> $args));
}


/**
 * Lấy sản phẩm mới nhất
 */
function getLatestProducts($args){
  return $latestProduct = wc_get_products(array(
    'post_type'=>'product', 
    'post_status'=>'publish',
    'orderby' => 'ID',
    'order' => 'DESC',
    'posts_per_page'=> $args));
}

/**
 * Lấy sản phẩm đang giảm giá
 */
function getSaleProducts ($args) {
  return new WP_Query(array (
    'post_type'=>'product', 
    'post_status'=>'publish',
    'orderby' => 'ID',
    'order' => 'DESC',
    'posts_per_page'=> 10, 
	  'meta_query'     => array(
        'relation' => 'OR',
        array(
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
        //xử lý đối với variable product
        array(
	        'key'           => '_min_variation_sale_price',
	        'value'         => 0,
	        'compare'       => '>',
	        'type'          => 'numeric'
	    )
    )
  )); 
}
/**
 * Thêm search form vào menu
 */
// add_filter( 'wp_nav_menu_items','add_search_box',10, 2 );
function add_search_box( $items, $args ) {
$items .= '<li>' . get_search_form( false ) . 
'</li>';
return $items;
}


//Search form custom
function wpbsearchform( $form ) {

  $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
<div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
  <div class="input-group">
    <div class="input-group-prepend" id="searchsubmit">
      <button id="button-addon2" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
    </div>
    <input type="search"  value="'. esc_attr( get_search_query() ) .'" name="s" id="s" placeholder="Search" aria-describedby="button-addon2" class="form-control border-0 bg-light" required>
  </div>
</div>
</form>';

  return $form;
}

//Cập nhật search form
add_filter( 'get_search_form', 'wpbsearchform', 10 );




/**
 * Hiển thị admin bar
 */
add_filter( 'show_admin_bar', '__return_true');

/**
*@ Thiết lập hàm hiển thị menu
*@ mytheme_menu( $slug )
*/
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
function add_custom_menu(){
  //my-custom-menu là id hay slug của menu
  register_nav_menu('my-custom-menu',__('My Custom Menu'));
}

add_action('init', 'add_custom_menu');




/**
 * Thêm CSS
 */
function my_styles(){
  wp_enqueue_style('main-style', get_template_directory_uri().'/style.css', array(), false, 'all');
}

add_action('wp_enqueue_scripts', 'my_styles');

function customCssCheckout() {
  wp_register_style('checkout-style', get_template_directory_uri() . '/checkout.css');

  wp_enqueue_style( 'checkout-style' );
}

?>



<?php 
/**
*@ Thiết lập hàm hiển thị logo
*@ mytheme_logo()
**/

if ( ! function_exists( 'mytheme_logo' ) ) {
   function mytheme_logo() {?>
<div class="logo2">
    <?php
           printf(
             //truyền các tham số lần lượt url, title, logo, description
             '
             <a href="%s" title="%s"><img class="img-fluid mx-auto py-5" id="img-logo" src="%s"></a>
             ',
             get_bloginfo( 'url' ),
             get_bloginfo( 'sitename' ),
             esc_url( get_stylesheet_directory_uri() ) . '/images/logo2.png',
           );?>
</div>
<?php }  ?>
<?php } ?>


<?php

/**
 * @param $template_name
 * @return false|string|void|WP_Error
 */
function dk_page($template_name) {
    do_action('dk_page');
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => 'templates/'.$template_name.'.php',
                'compare' => '='
            ]
        ]
    ]);
    if(!empty($pages))
    {
        foreach($pages as $pages__value)
        {
            return get_permalink($pages__value->ID);
        }
    }
    return get_bloginfo('url');
}

/**
 * @return string|void
 */
function dk_cart()
{
    do_action('dk_cart');
    if (isset($_POST['update_cart'])) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if (isset($_POST[$cart_item['product_id']]) && $_POST[$cart_item['product_id']] > 0 && $_POST[$cart_item['product_id']] != $cart_item['quantity']) {
                WC()->cart->set_quantity($cart_item_key, intval($_POST[$cart_item['product_id']]));
            }
        }
        return "Giỏ hàng đã được cập nhật.";
    } else {
        foreach (WC()->cart->get_cart() as $product_key => $product) {
            if (isset($_POST['remove_item-' . $product['product_id']])) {
                WC()->cart->remove_cart_item($product_key);
                return "NJ68 MAX” đã xóa.";
            }
        }
    }
}

// archve.php
add_action('woocommerce_after_shop_loop_item_title','change_loop_ratings_location', 2 );
function change_loop_ratings_location(){
    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5 );
    add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 15 );
}
// C:\WAMP64\WWW\WORDPRESS_NHOM2\WORDPRESS\WP-CONTENT\THEMES\MYTHEME\TEMPLATE-PARTS\CONTENT\INDEX-PRODUCT.PHP ON LINE 30
