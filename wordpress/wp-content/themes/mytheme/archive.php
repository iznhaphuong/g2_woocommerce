<?php 
get_header();
$term = get_term(get_queried_object_id(),'product_cat') ;

?>
<div class="container-lg mb-5">
    <div class="row">
        <div class="col-md-9">
        <div class="mx-5 mt-70">
                   <?php woocommerce_breadcrumb();?>
                   <h3 class="text-uppercase mb-5"><?= get_the_title() ?></h3>
                <?= do_shortcode('[product_category category="'.$term->slug.'" columns=3 paginate=true order=ASC per_page=6]');?>                
            </div>
        </div>
        <div class="col-md-3">
            <?php get_sidebar();    ?>
        </div>
    </div>
</div>
<?php
get_footer();
