<?php
// setPostViews(get_the_ID());
get_header();
$the_query = wc_get_product(get_the_ID());

// $rating_count = $the_query->get_rating_count();
//                         $review_count = $the_query->get_review_count();
//                         $average      = $the_query->get_average_rating();
// var_dump($rating_count);
// var_dump($review_count);
// var_dump($average);
// var_dump($the_query);


if ($the_query->is_type('variable')) {
    $variations = $the_query->get_available_variations();
    foreach ($variations as $index => $variation) {
       echo get_image2($variation['image_id']);
    }
}


//In ra hình ảnh nhờ ID_Image
function get_image1(
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

//In ra hình ảnh nhờ ID_Image
function get_image2($image_id, $default_image = "thumbnail", $alt = "", $class = "", $list_size_image = ["thumbnail", "medium", "medium_large", "large"], $attr = [])
{
    $image_src = wp_get_attachment_image_src($image_id, $default_image);
    $srcset = "";
    foreach ($list_size_image as $key => $value) {
        $current_image = wp_get_attachment_image_src($image_id, $value);
        $srcset .= $current_image[0] . " " . $current_image[1] . "w";
        if ($key + 1 < count($list_size_image)) {
            $srcset .= ', ';
        }
    }
    $image = '<img style="opacity: 0.5;" width="' . $image_src[1] . '" height="' . $image_src[2] . '" src="' . $image_src[0] . '" class="' . $class . '" alt="' . $alt . '" srcset="' . $srcset . '" sizes="(max-width: ' . $image_src[1] . 'px) 100vw, ' . $image_src[1] . 'px">';
    return $image;
}



?>
<!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<div class="container">
    <div class="heading-section">
        <h2>Product Details</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- Hình ảnh cha -->
            <?php
            if ($the_query->is_type('variable')) {
            ?>
                <div id="slider" class="owl-carousel product-slider">
                    <?php
                    $variations = $the_query->get_available_variations();
                    foreach ($variations as $index => $variation) {
                        //Image
                    ?>
                        <div class="item" style="position: relative;">
                            <div style="position: absolute;inset: 0;text-align: center;color:black;">
                                <?php echo $variation['attributes']['attribute_size']; ?></div>
                            <?php echo get_image1($variation['image_id']); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>
                <img width="85%" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="">
            <?php
            }

            ?>

            <!-- Hình ảnh con -->
            <?php
            if ($the_query->is_type('variable')) {
            ?>
                <div id="thumb" class="owl-carousel product-thumb">
                    <?php
                    $variations = $the_query->get_available_variations();
                    foreach ($variations as $index => $variation) {
                        //Image
                    ?>
                        <div class="item" style="position: relative;">
                            <div style="position: absolute;inset: 0;text-align: center;color:black;">
                                <?php echo $variation['attributes']['attribute_pa_size']; ?></div>
                            <?php echo get_image2($variation['image_id']); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            } else {
            ?>

            <?php
            }

            ?>

        </div>
        <div class="col-md-6">
            <div class="product-dtl">
                <div class="product-info">
                    <div class="product-name"><?php the_title(); ?></div>

                    <?php
                    //
                    // $rating_count = $the_query->get_rating_count();
                    $review_count = $the_query->get_review_count();
                    $average      = $the_query->get_average_rating();

                    // var_dump($review_count);
                    // var_dump($average); 
                    ?>
                    <div class="reviews-counter">
                        <div class="rate">
                            <?php
                            for ($i = 5; $i >= 1; $i--) {
                                // var_dump($i);
                                // var_dump($starCount);
                                if ($i < $starCount) {
                            ?>
                                    <input type="radio" id="star<?php echo $i; ?>" name="rate" value="<?php echo $i; ?>" />
                                    <label for="star<?php echo $i; ?>" title="text"><?php echo $i; ?> star</label>
                                <?php
                                } else {  ?>
                                    <input type="radio" id="star<?php echo $i; ?>" name="rate" value="<?php echo $i; ?> checked" />
                                    <label for="star<?php echo $i; ?>" title="text"><?php echo $i; ?> star</label>
                            <?php }
                            }
                            ?>

                            <!-- <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>

                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" checked />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label> -->
                        </div>
                        <span><?php echo $review_count . ' '; ?> Reviews</span>
                    </div>
                    <div class="product-price-discount">
                        <span id="price_size">
                            <?php
                            echo '$' . get_post_meta(get_the_ID(), '_regular_price', true);
                            ?>

                        </span>
                        <span class="line-through">

                            <?php if (get_post_meta(get_the_ID(), '_sale_price', true) != null) {
                                echo '$' . get_post_meta(get_the_ID(), '_sale_price', true);
                            } else {
                                echo '';
                            } ?>

                        </span>
                    </div>
                </div>
                <div style="display:flex;">Tình Trạng: <p>
                        <?php echo get_post_meta(get_the_ID(), '_stock_status', true); ?></p>
                </div>
                <!-- Mô tả -->
                <?php the_excerpt(); ?>
                <div class="row">
                    <div class="col-md-6">

                        <?php
                        if ($the_query->is_type('variable')) {
                        ?>
                            <label for="size">Size</label>
                            <select id="size" onchange="onChange()" name="size" class="form-control">
                                <?php
                                $variations = $the_query->get_available_variations();
                                foreach ($variations as $index => $variation) {
                                    // var_dump($variation['attributes']['attribute_pa_size']);
                                ?>
                                    <option value="<?php echo $variation['display_price']; ?>">
                                        <?php echo $variation['attributes']['attribute_pa_size']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        }
                        ?>

                    </div>
                    <!-- <div class="col-md-6">
                    <label for="color">Color</label>
                <select id="color" name="color" class="form-control">
                  <option>Blue</option>
                  <option>Green</option>
                  <option>Red</option>
                </select>
                  </div> -->
                </div>
                <div class="product-count">
                    <label for="size">Quantity</label>
                    <form action="#" class="display-flex">
                        <div class="qtyminus">-</div>
                        <input type="text" name="quantity" value="1" class="qty">
                        <div class="qtyplus">+</div>
                    </form>
                    <a href="<?php echo dk_page('page-cart'); ?>" class="round-black-btn add-cart">Add to Cart</a>
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
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <!-- Nôi dung -->
                <p> <?php the_content(); ?></p>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <!-- <div class="review-heading">REVIEWS</div>
              <p class="mb-20">There are no reviews yet.</p>
              <form class="review-form">
		        			<div class="form-group">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
									<div class="rate">
									    <input type="radio" id="star5" name="rate" value="5" />
									    <label for="star5" title="text">5 stars</label>
									    <input type="radio" id="star4" name="rate" value="4" />
									    <label for="star4" title="text">4 stars</label>
									    <input type="radio" id="star3" name="rate" value="3" />
									    <label for="star3" title="text">3 stars</label>
									    <input type="radio" id="star2" name="rate" value="2" />
									    <label for="star2" title="text">2 stars</label>
									    <input type="radio" id="star1" name="rate" value="1" />
									    <label for="star1" title="text">1 star</label>
									</div>
								</div>
							</div> -->
                <?php
                //  woocommerce_template_single_rating();
                comments_template();
                //  var_dump($the_query->get_rating_html());
                //  var_dump(change_loop_ratings_location());
                //  change_loop_ratings_location();
                //  woocommerce_template_loop_rating();
                // woocommerce_template_single_rating();
                //  wc_get_template();
                //                     // woocommerce_template_single_price($the_query);
                //                      var_dump(woocommerce_template_single_rating());


                ?>

                <!-- <button class="round-black-btn">Submit Review</button> -->
                </form>

            </div>
        </div>
    </div>

    <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
    var chonSize = document.getElementById("size")
    var price = document.getElementById("price_size");
    if (price) {
        price.innerHTML = "$" + chonSize.options[chonSize.selectedIndex].value;
    }

    function onChange() {
        price.innerHTML = "$" + chonSize.options[chonSize.selectedIndex].value;
    }

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