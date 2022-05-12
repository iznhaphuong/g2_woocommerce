
<?php
/**
 * Template Name: Trang chủ 
 */
get_header();
get_template_part( 'template-parts/content/index-carousel' );
?>
<div class="container-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="mx-5">
                <?php  get_template_part( 'template-parts/content/index-product' );  ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php
get_footer();

if (is_search()) {
    echo 'dang tim';
}