<?php
get_header();
$products = getSearchResult(get_search_query());

?>
<div class="container-lg mb-5">
    <div class="row">
        <div class="col-md-9">
            <div class="mx-5 mt-100">
                <?php woocommerce_breadcrumb();
                if (get_search_query() == "") {
                    ?>
                <h3 class="mb-5">Từ khoá không được để trống</h3>
                <?php
                } else if (count($products) == 0){
                ?>
                <h3 class="mb-5">Không tìm thấy kết quả với[</span><?= get_search_query() ?>]</h3>
                <?php
                } else if (count($products) > 0) { ?>

                <h3 class="mb-5"><span>Kết quả tìm với [</span><?= get_search_query() ?>]</h3>
                <div class="d-flex ">
                <?php
                foreach ($products as $product) { ?>
                    <div div class="product-wrapper mb-4 text-center mx-3">
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
                                    <a class="action-cart" title="Thêm vào giỏ"
                                        href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>" data-abc="true">
                                        <i class="fa fa-shopping-cart"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <h4><a href="<?= get_permalink($product->id)?>"><?= $product->name?></a></h4>
                        </div>
                    </div>
                    <?php } ?>
                    </div>

                <?php
                }
                ?>
                </div>

            </div>
        <div class="col-md-3">
            <?php get_sidebar();
            ?>
        </div>
    </div>
</div>

<?php
get_footer();