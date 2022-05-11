<?php
define('QTY', 4);
$lastestProducts = getLatestProducts(QTY);
$saleProducts = getSaleProducts(QTY);

?>
<!-- MÓN ĂN MỚI -->
<h3 class="text-center text-uppercase mt-100">Thực đơn mới</h3>

<div class="container d-flex justify-content-center">
    <div class="d-flex">
        <!-- Duyệt qua tất cả phần tử -->
        <?php
            foreach ($lastestProducts as $product) { ?>

        <div class="product-wrapper mb-4 mx-3 text-center">
            <!-- Ảnh đại diện sản phẩm -->
            <div class="product-img"> <a href="<?= get_permalink( $product->id)?>" data-abc="true"> <img
                        src="<?php echo get_the_post_thumbnail_url($product->id, 'medium');?>" alt=""></a>
                <?php
                if(get_post_meta( $product->id, '_sale_price',true) != null) {
                ?>
                <!-- Sale price -->
                <span
                    class="regular"><s><?= number_format( $product->get_regular_price()). ' VNĐ'; ?></s><br><?= number_format( $product->get_regular_price()).' VNĐ' ?></span>

                <span class="sale"><?= getSalePercent($product->id) ?></span>

                <?php } else { ?>
                <!-- Regular price -->
                <span class="regular"><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></span>

                <?php }?>
                <div class="product-action">
                    <div class="product-action-style"> <a class="action-plus" title="Quick View" data-toggle="modal"
                            data-target="#exampleModal" href="#" data-abc="true"> <i class="fa fa-plus"></i> </a> <a
                            class="action-heart" title="Wishlist" href="#" data-abc="true"> <i class="fa fa-heart"></i>
                        </a>
                        <!-- Thêm vào giỏ -->
                        <a class="action-cart" title="Thêm vào giỏ"
                            href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>" data-abc="true"> <i
                                class="fa fa-shopping-cart"></i> </a>
                    </div>
                </div>
            </div>
            <div class="title">
                <h4><a href="<?= get_permalink( $product->id)?>"><?= $product->name?></a></h4>
            </div>
        </div>

        <?php
    }
        ?>
    </div>
</div>
<!-- MÓN ĂN ĐANG GIẢM GIÁ -->
<h3 class="text-center text-uppercase mt-100">Đang giảm giá</h3>
<div class="container d-flex justify-content-center">
    <div class="d-flex">
        <!-- Duyệt qua tất cả phần tử -->

        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
        <?php while ($saleProducts->have_posts()) : $saleProducts->the_post(); ?>
        <?php global $product; ?>
        <div class="product-wrapper mb-4 mx-3 text-center">
            <!-- Ảnh đại diện sản phẩm -->
            <div class="product-img"> <a href="<?= get_permalink(get_the_ID())?>" data-abc="true"> <img
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium');?>" alt=""></a>
                <?php
                if(get_post_meta( get_the_ID(), '_sale_price',true) != null) {
                ?>
                <!-- Sale price -->
                <span
                    class="regular"><s><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></s><br><?= number_format(get_post_meta( $product->id, '_sale_price',true)).' VNĐ' ?></span>

                <span class="sale"><?= getSalePercent(get_the_ID()) ?></span>
                <?php } else { ?>
                <!-- Regular price -->
                <span class="regular"><?= number_format( $product->get_regular_price() ). ' VNĐ'; ?></span>

                <?php }?>
                <div class="product-action">
                    <div class="product-action-style"> <a class="action-plus" title="Quick View" data-toggle="modal"
                            data-target="#exampleModal" href="#" data-abc="true"> <i class="fa fa-plus"></i> </a> <a
                            class="action-heart" title="Wishlist" href="#" data-abc="true"> <i class="fa fa-heart"></i>
                        </a>
                        <!-- Thêm vào giỏ -->
                        <a class="action-cart" title="Thêm vào giỏ"
                            href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>" data-abc="true"> <i
                                class="fa fa-shopping-cart"></i> </a>
                    </div>
                </div>
            </div>
            <div class="title">
                <h4><a href="<?= get_permalink( $product->id )?>"><?= $product->name ?></a></h4>
            </div>
        </div>

        <?php endwhile; wp_reset_postdata();?>
    </div>
</div>