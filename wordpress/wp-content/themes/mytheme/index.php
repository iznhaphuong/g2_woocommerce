<?php 
get_header();

$args = array (
    'post_type'=>'post', //loai la post
    // 'orderby' => 'rand', //lay ngau nhien
    'posts_per_page' => 3 //lay 5 bai cho 1 trang
);

$the_query = new WP_Query($args);
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-10 col-sm-12">
            <h3>Bài Viết</h3>
            <?php
            if($the_query->have_posts()):
                echo '<div class="d-flex">';
                while($the_query->have_posts()):
                    $the_query->the_post();
            ?>
            <a href="<?= get_permalink( get_the_ID() )?>">

                <div class="blog-card spring-fever me-3 mb-3">

                    <div class="title-content">
                        <h3 class="text-capitalize"><?php the_title();?></h3>
                        <hr />
                        <div class="intro d-flex justify-content-between">
                            <div class="d-flex">
                                <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
                                <p class="ps-3"><?php the_author();?></p>
                            </div>
                            <p><?php echo getPostViews(get_the_ID());  ?> <i class="fa fa-eye"> </i></p>
                        </div>
                    </div><!-- /.title-content -->
                    <div class="card-info">
                        <?php the_content();?>
                    </div><!-- /.card-info -->
                    <div class="utility-info">
                        <ul class="utility-list d-flex justify-content-end">
                            <li class="comments">12</li>
                            <li class="date"><?php the_date('d.m.Y') ?></li>
                        </ul>
                    </div><!-- /.utility-info -->
                    <!-- overlays -->
                    <div class="gradient-overlay"></div>
                    <div class="color-overlay"></div>
                </div><!-- /.blog-card -->
            </a>
            <?php
            endwhile;
            echo '</div>';
            endif;

            ?>

        </div>
        <div class="col-md-2 col-sm-12">
            <?php get_sidebar() ?>
        </div>
    </div>

</div>



<?php

get_footer();