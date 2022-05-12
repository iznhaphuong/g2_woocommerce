<?php
/**
 * Template Name: Tất cả sản phẩm 
 */
?>

<?php
get_header();
?>
<div class="container-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="mx-5 mt-70">
                   <?php woocommerce_breadcrumb();?>
                <h3 class="text-uppercase mb-5"><?= get_the_title() ?></h3>

                <?= do_shortcode( '[products columns=3 paginate=true order=ASC per_page=6]' );?>
            </div>
             
        </div>
        <div class="col-md-3">
            <?php get_sidebar();
            get_template_part('woocommerce/product-searchform');
            ?>
        </div>
    </div>
</div>

<?php
get_footer();