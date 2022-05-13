<?php
/* Template Name: Cart */

get_header();
if (isset($_POST['update_cart'])) {
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if (isset($_POST[$cart_item['product_id']]) && $_POST[$cart_item['product_id']] > 0 && $_POST[$cart_item['product_id']] != $cart_item['quantity']) {
            WC()->cart->set_quantity($cart_item_key, intval($_POST[$cart_item['product_id']]));
        }
    }
} else {
    foreach (WC()->cart->get_cart() as $product_key => $product) {
        if (isset($_POST['remove_item-' . $product['product_id']])) {
            WC()->cart->remove_cart_item($product_key);
            break;
        }
    }
}

$products = WC()->cart->get_cart();
if (count($products) > 0) {
    function get_page_url($template_name)
    {
        $pages = get_posts([
            'post_type' => 'page',
            'post_status' => 'publish',
            'meta_query' => [
                [
                    'key' => '_wp_page_template',
                    'value' => 'templates/'.$template_name.'.php',
                    'compare' => '='
                ]
            ]
        ]);
        if(!empty($pages))
        {
            foreach($pages as $pages__value)
            {
                return get_permalink($pages__value->ID);
            }
        }
        return get_bloginfo('url');
    }

    $url = get_page_url('page-checkout');
?>
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <!-- Products -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="mb-0 title-cart">
                                    Cart - <?php echo count($products); ?> items
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg btn-block mb-0">
                                    Back to shop
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo get_permalink(); ?>" method="post">
                        <div class="card-body">
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $product = $cart_item['data'];
                                ?>
                                <!-- Single item -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <?php echo get_the_post_thumbnail($cart_item['product_id'])?>
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong><?php echo $cart_item['data']->name; ?></strong></p>
                                        <p><?php echo $cart_item['data']->description; ?></p>
                                        <button name="remove_item-<?php echo $cart_item['product_id']; ?>" type="submit" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                                title="Remove item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">

                                            <div class="form-outline">
                                                <label class="form-label" for="quantify-<?php echo $cart_item['data']->id; ?>">Quantity</label>
                                                <input id="quantify-<?php echo $cart_item['data']->id; ?>" min="0" name="<?php echo $cart_item['data']->id; ?>" value="<?php echo $cart_item['quantity'];?>" type="number" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong><?php echo WC()->cart->get_product_price( $product );?></strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <!-- Single item -->
                                <hr class="my-4" />
                                <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="<?php echo get_page_uri(); ?>" method="post">
                                        <div class="row">
                                            <div class="col-md-4 position-relative">
                                                <input type="text" placeholder="Coupon code" name="coupon_code" class="form-control position-absolute top-50 start-0-fix translate-middle-y">
                                            </div>
                                            <div class="col-md-8">
                                                <button class="btn btn-fix btn-primary btn-lg btn-block mb-0">
                                                    Apply coupon
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="update_cart" class="btn btn-primary btn-lg btn-block mb-0">
                                        Update cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--  -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php
                            foreach ($products as $cart_item_key => $cart_item) {
                                $product_data = $cart_item['data'];
                            ?>
                                <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <?php echo $product_data->name; ?>
                                    <span>
                                        <?php
                                            echo WC()->cart->get_product_subtotal( $product_data, $cart_item['quantity'] );
                                        ?>
                                    </span>
                                </li>
                            <?php
                            }
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong><?php echo WC()->cart->get_cart_total(); ?></strong></span>
                            </li>
                        </ul>

                        <a href="<?php echo $url; ?>" type="button" class="btn btn-primary btn-lg btn-block">
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
} else { ?>
    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="mb-0 title-cart">
                                        Your cart is currently empty.
                                    </h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg btn-block mb-0">
                                        Back to shop
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
get_footer();
?>
