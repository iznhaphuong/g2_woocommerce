<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
            aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
    <?php
    $args = array (
        'post_type'=>'product', //loai la post
        // 'orderby' => 'rand', //lay ngau nhien
        'posts_per_page' => 5 //lay 5 bai cho 1 trang
    );
    $the_query = new WP_Query($args);
            $i = 0;
            if($the_query->have_posts()):
                while($the_query->have_posts()):
                    $the_query->the_post();
                    if($i == 0){ ?>
        <div class="carousel-item active">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large');?>" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5><?php ?></h5>
                <p>...</p>
            </div>
        </div>

        <?php }else{    ?>
        <div class="carousel-item">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large');?>" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>...</h5>
                <p>...</p>
            </div>
        </div>
        <?php }
            $i++;
            endwhile;
            endif;
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>