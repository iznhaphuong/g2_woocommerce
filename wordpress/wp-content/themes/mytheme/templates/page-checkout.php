<?php
/* Template Name: Checkout */


if (isset($_POST['submit'])) {
    echo "co";
}
$countries = WC()->countries->get_countries();
add_action('wp_enqueue_scripts', 'customCssCheckout');
get_header();
?>
<div class="gradient-custom">
    <div class="container">
        <div class="card">
            <div class="form">
                <form action="<?php echo get_permalink(); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Thông tin thanh toán</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <!-- First Name -->
                                    <label for="inputFirstName" class="form-label">
                                        Tên
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputFirstName" name="firstName" required>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">
                                        Họ
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputLastName" name="lastName" required>
                                </div>
                                <!-- Company Name -->
                                <div class="col-12">
                                    <label for="inputCompanyName" class="form-label">Tên công ty (tùy chọn)</label>
                                    <input type="text" class="form-control" name="companyName" id="inputCompanyName">
                                </div>
                                <!-- Address -->
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">
                                        Địa chỉ
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" required>
                                </div>
                                <!-- City -->
                                <div class="col-md-5">
                                    <label for="inputCity" class="form-label">
                                        Tỉnh / Thành Phố
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputCity" name="city" required>
                                </div>
                                <!-- State -->
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">
                                        Quốc gia
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <select id="inputState" class="form-select" name="state" required>
                                        <option selected>Chọn quốc gia...</option>
                                        <?php
                                        foreach ($countries as $country) { ?>
                                            <option>
                                                <?php
                                                echo $country;
                                                ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- zip -->
                                <div class="col-md-3">
                                    <label for="inputZip" class="form-label">
                                        Zip
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required>
                                </div>
                                <!-- Number Phone -->
                                <div class="col-md-4">
                                    <label for="inputNumberPhone" class="form-label">
                                        Số điện thoại
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputNumberPhone" name="numberPhone" required>
                                </div>
                                <!-- Email -->
                                <div class="col-md-8">
                                    <label for="inputEmail" class="form-label">
                                        Địa chỉ email
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputEmail" name="email" required>
                                </div>
                                <div class="col-12">
                                    <h4 class="form-check-label">Thông tin bổ sung</h4>
                                    <label for="inputAdditionalInformation" class="form-label">Ghi chú đơn hàng (Tùy chọn)</label>
                                    <textarea id="inputAdditionalInformation" class="form-control" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." name="note"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="row">
                                <div class="col-4">Sản phẩm</div>
                                <div class="col-4">Số lượng</div>
                                <div class="col-4">Giá</div>
                                <!-- price -->
                                <?php
                                foreach (WC()->cart->get_cart() as $product_key => $product) {
                                    $product_data = $product['data']; ?>
                                    <div class="col-4">
                                        <?php
                                        echo $product_data->name;
                                        ?></div>
                                    <div class="col-4">
                                        <?php
                                        echo $product['quantity'];
                                        ?>
                                    </div>
                                    <div class="col-4">
                                        <?php
                                        echo WC()->cart->get_product_subtotal( $product_data, $product['quantity'] );
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="col-8">
                                    Tổng:
                                </div>
                                <div class="col-4">
                                    <?php
                                    echo WC()->cart->get_cart_total();
                                    ?>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <label class="form-check-label click" for="gridCheck">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" name="check">
                                            I would like to receive exclusive emails with discounts and product information (tuỳ chọn)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng, tăng trải nghiệm sử dụng website, và cho các mục đích cụ thể khác đã được mô tả trong
                                        <a href="#!">chính sách riêng tư</a> của chúng tôi.</p>
                                </div>
                                <div class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Đặt hàng</button>
                                    <a href="<?php echo home_url(); ?>" type="submit" class="btn btn-primary">Quay về trang chủ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
