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
<div class="container">
    <div class="heading-section">
        <h2>Product Details</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- Hình ảnh -->
                <img width="85%" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="">
        </div>
        <div class="col-md-6">
            <div class="product-dtl">
                <div class="product-info">
                    <div class="product-name">
                       <h1> <?php the_title(); ?></div> </h1>

                    <?php
                    $review_count = $the_query->get_review_count();
                    $average      = $the_query->get_average_rating();
                    $starCount = (float)$average;
                    ?>
                    <div class="reviews-counter" style="float:right;">

                        <?php echo $review_count . ' '; ?> <i>Reviews</i>
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
                    <?php }else{ ?>
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
                <div style="display:flex;">Tình Trạng: <p>
                        <?php echo get_post_meta(get_the_ID(), '_stock_status', true); ?></p>
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
    <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Comments </a>
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

    <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div>
</div>
</div>

<script>

    $(document).ready(function() {
        var slider = $("#slider");
        var thumb = $("#thumb");
        var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;
        slider
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200
            })
            .on("changed.owl.carousel", syncPosition);
        thumb
            .on("initialized.owl.carousel", function() {
                thumb.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                item: 4,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage,
                navText: [
                    '<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ],
                responsiveRefreshRate: 100
            })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            thumb
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumb.find(".owl-item.active").length - 1;
            var start = thumb.find(".owl-item.active").first().index();
            var end = thumb.find(".owl-item.active").last().index();
            if (current > end) {
                thumb.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumb.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                slider.data("owl.carousel").to(number, 100, true);
            }
        }
        thumb.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            slider.data("owl.carousel").to(number, 300, true);
        });

        $(".qtyminus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                if (parseInt(now) - 1 > 0) {
                    now--;
                }
                $(".qty").val(now);
            }
        });
        $(".qtyplus").on("click", function() {
            var now = $(".qty").val();
            if ($.isNumeric(now)) {
                $(".qty").val(parseInt(now) + 1);
            }
        });
    });
</script>
<?php
get_footer();
?>