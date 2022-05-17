<?php
define('QTY', 6);
$lastestProducts = getLatestProducts(QTY);
$saleProducts = getSaleProducts(QTY);

?>
<!-- MÓN ĂN MỚI -->
<h3 class="text-uppercase mt-100">Thực đơn mới</h3>
<hr>
    <div class="d-flex justify-content-between">
        <!-- Duyệt qua tất cả phần tử -->
        <?php
            foreach ($lastestProducts as $product) { ?>

        <div class="product-wrapper mb-4 text-center">
            <!-- Ảnh đại diện sản phẩm -->
            <div class="product-img"> <a href="<?= get_permalink( $product->id)?>" data-abc="true"> <img
                        src="<?php echo get_the_post_thumbnail_url($product->id, 'medium');?>" alt=""></a>
                <?php
                if(get_post_meta( $product->id, '_sale_price',true) != null) {
                ?>
                <!-- Sale price -->
                <span
                class="regular"><s><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></s><br><?= number_format($product->get_sale_price()).' VNĐ' ?></span>

                <span class="onsale"><?= getSalePercent($product->id) ?></span>

                <?php } else { ?>
                <!-- Regular price -->
                <span class="regular"><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></span>

                <?php } ?>
                <div class="product-action">
                    <div class="product-action-style">  
                        <!-- Thêm vào giỏ -->
                        <?php
                        $the_query = wc_get_product($product->id);
                        $url = rtrim(dk_page('page-cart'), "/");
                        echo apply_filters(
                            'woocommerce_loop_add_to_cart_link',
                            sprintf(
                                '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" title="Thêm vào giỏ" data-abc="true" class="action-cart add-cart button %s product_type_%s buynow"><i
                                class="fa fa-shopping-cart"></i></a>',
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
            <div class="title">
                <h4><a href="<?= get_permalink($product->id)?>"><?= $product->name?></a></h4>
            </div>
        </div>

        <?php
        }
        ?>
</div>
<!-- MÓN ĂN ĐANG GIẢM GIÁ -->
<h3 class="text-uppercase mt-100">Đang giảm giá</h3>
<hr>
    <div class="d-flex justify-content-between">
        <!-- Duyệt qua tất cả phần tử -->

        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
        <?php while ($saleProducts->have_posts()) : $saleProducts->the_post(); ?>
        <?php global $product; ?>
        <div class="product-wrapper mb-4 text-center">
            <!-- Ảnh đại diện sản phẩm -->
            <div class="product-img"> <a href="<?= get_permalink(get_the_ID())?>" data-abc="true"> <img
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium');?>" alt=""></a>
                <?php
                if(get_post_meta( get_the_ID(), '_sale_price',true) != null) {
                ?>
                <!-- Sale price -->
                <span
                class="regular"><s><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></s><br><?= number_format($product->get_sale_price()).' VNĐ' ?></span>

                <span class="onsale"><?= getSalePercent(get_the_ID()) ?></span>
                <?php } else { ?>
                <!-- Regular price -->
                <span class="regular"><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></span>

                <?php }?>
                <div class="product-action">
                    <div class="product-action-style"> 
                    <a href="<?= get_permalink( get_the_ID() )?>" title="Quick View" data-abc="true" class="action-plus"><i class="fa fa-plus"></i></a>
                         
                            <a class="action-heart" title="Wishlist" href="#" data-abc="true"> <i class="fa fa-heart"></i>
                        </a>
                        <?php
                        $the_query = wc_get_product($product->id);
                        $url = rtrim(dk_page('page-cart'), "/");
                        echo apply_filters(
                            'woocommerce_loop_add_to_cart_link',
                            sprintf(
                                '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" title="Thêm vào giỏ" data-abc="true" class="action-cart add-cart button %s product_type_%s buynow"><i
                                class="fa fa-shopping-cart"></i></a>',
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
            <div class="title">
                <h4><a href="<?= get_permalink( $product->id )?>"><?= $product->name ?></a></h4>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata();?>
    </div>

