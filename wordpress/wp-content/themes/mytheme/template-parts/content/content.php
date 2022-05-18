<?php
// setPostViews(get_the_ID());
get_header();
$the_query = wc_get_product(get_the_ID());

//In ra hình ảnh nhờ ID_Image
function get_image(
    $image_id,
    $default_image = "thumbnail",
    $alt = "",
    $class = "",
    $list_size_image = ["thumbnail", "medium", "medium_large", "large"],
    $attr = []
) {
    $image_src = wp_get_attachment_image_src($image_id, $default_image);
    $srcset = "";
    foreach ($list_size_image as $key => $value) {
        $current_image = wp_get_attachment_image_src($image_id, $value);
        $srcset .= $current_image[0] . " " . $current_image[1] . "w";
        if ($key + 1 < count($list_size_image)) {
            $srcset .= ', ';
        }
    }
    $image = '<img width="' . $image_src[1] . '" height="' . $image_src[2] . '" src="' . $image_src[0] .
        '" class="' . $class . '" alt="' . $alt . '" srcset="' . $srcset . '" sizes="(max-width: ' . $image_src[1] . 'px) 100vw, ' . $image_src[1] . 'px">';
    return $image;
}
?>


<div class="container-lg my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="mx-5">
            <!-- Hình ảnh -->
            <img width="100%" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="">
            </div>
        </div>
        <div class="col-md-8">
            <div class="product-dtl mx-5">
                <div class="product-info">
                    <div class="product-name">
                        <h1> <?php the_title(); ?>
                    </div>
                    </h1>
                    <?php
                    $review_count = $the_query->get_review_count();
                    $average      = $the_query->get_average_rating();
                    $starCount = (float)$average;
                    ?>
                    <div class="reviews-counter" style="float:right;">

                        <?php echo $review_count . ' '; ?> <i>Đánh giá</i>
                    </div>
                    <!-- Điều kiện để gạch giá sản phẩm -->
                    <?php if (get_post_meta(get_the_ID(), '_sale_price', true) != null) { ?>
                    <div class="product-price-discount">
                        <span id="price_size">
                            Giá:
                            <?php
                                echo '<span style="text-decoration-line: line-through;">$' . get_post_meta(get_the_ID(), '_regular_price', true) . 'VND</span>';
                                ?>
                        </span>
                    </div>
                    <span class="line-through">
                        Sale:
                        <?php if (get_post_meta(get_the_ID(), '_sale_price', true) != null) {
                                echo get_post_meta(get_the_ID(), '_sale_price', true) . 'VND';
                            } else {
                                echo '';
                            } ?>
                    </span>
                    <?php } else { ?>
                    <div class="product-price-discount">
                        <span id="price_size">
                            Giá:
                            <?php
                                echo '<span>' . get_post_meta(get_the_ID(), '_regular_price', true) . 'VND</span>';
                                ?>

                        </span>
                    </div>
                    <?php } ?>
                </div>
                <br>
                <div style="display:flex;">Tình Trạng:
                        <?php echo get_post_meta(get_the_ID(), '_stock_status', true); ?>
                </div>
                <!-- Mô tả -->
                <?php the_excerpt(); ?>
                <div class="product-count">
                    <!-- Add Sản phẩm vào cart -->
                    <?php
                    $url = rtrim(dk_page('page-cart'), "/");
                    echo apply_filters(
                        'woocommerce_loop_add_to_cart_link',
                        sprintf(
                            '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="add-cart button %s product_type_%s buynow">Add to cart</a>',
                            esc_url($url . $the_query->add_to_cart_url()),
                            esc_attr($the_query->id),
                            esc_attr($the_query->get_sku()),
                            $the_query->is_purchasable() ? 'add_to_cart_button' : '',
                            esc_attr($the_query->product_type),
                            esc_html($the_query->add_to_cart_text())
                        ),
                        $the_query
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="product-info-tabs m-5">
        <ul class="bg-dark nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="description" aria-selected="true">Mô tả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" 
                    aria-selected="false">Đánh giá</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <!-- Nôi dung -->
                <p> <?php the_content(); ?></p>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <!-- Xuất hiện comments -->
                <?php
                comments_template();
                ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>