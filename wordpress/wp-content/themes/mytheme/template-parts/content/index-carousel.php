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
    $products = getRandProducts(5);
            $i = 0;
           foreach ($products as $product) {
                    if($i == 0){ ?>
        <div class="carousel-item active">
            <img src="<?php echo get_the_post_thumbnail_url($product->id,'large');?>" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3><?= $product->name?></h3>
                <p><?= substr($product->get_short_description(),0,100).'...' ?></p>
            </div>
        </div>

        <?php } else {    ?>
        <div class="carousel-item">
            <img src="<?php echo get_the_post_thumbnail_url($product->id,'large');?>" class="d-block mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3><?= $product->name?></h3>
                <p><?= substr($product->get_short_description(),0,100).'...' ?></p>
            </div>
        </div>
        <?php }
            $i++;
        }
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