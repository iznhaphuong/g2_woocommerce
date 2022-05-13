<?php
/* Template Name: Checkout */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .required {
            color: red;
        }
        .click {
            cursor: pointer;
            margin: 5% 0;
        }
        @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box
        }

        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #eee
            padding:0 10px;
        }

        .container .card {
            margin: 50px 0;
            height: auto;
            width: 1200px;
            background-color: #f7f7f9;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            font-family: 'Lora', serif
        }

        .container .card .form {
            width: 100%;
            height: 100%;
            display: flex;
            padding: 6%;
        }
        .gradient-custom {
            /* fallback for old browsers */
            background: #5ee7df;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(94, 231, 223, 0.5), rgba(180, 144, 202, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(94, 231, 223, 0.5), rgba(180, 144, 202, 0.5))
        }
    </style>
</head>
<body>
<div class="gradient-custom">
    <div class="container">

        <div class="card">
            <div class="form">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Thông tin thanh toán</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">
                                        Tên
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputFirstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">
                                        Họ
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputLastName" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputCompanyName" class="form-label">Tên công ty (tùy chọn)</label>
                                    <input type="text" class="form-control" id="inputCompanyName">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">
                                        Địa chỉ
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputAddress" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="inputCity" class="form-label">
                                        Tỉnh / Thành Phố
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputCity" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">
                                        Quốc gia
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <select id="inputState" class="form-select" required>
                                        <option selected>Chọn quốc gia...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputZip" class="form-label">
                                        Zip
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputZip" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputNumberPhone" class="form-label">
                                        Số điện thoại
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputNumberPhone" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="inputEmail" class="form-label">
                                        Địa chỉ email
                                        <abbr class="required" title="bắt buộc">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" id="inputEmail" required>
                                </div>
                                <div class="col-12">
                                    <h4 class="form-check-label">Thông tin bổ sung</h4>
                                    <label for="inputAdditionalInformation" class="form-label">Ghi chú đơn hàng (Tùy chọn)</label>
                                    <textarea id="inputAdditionalInformation" class="form-control" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="row">
                                <div class="col-6">Sản phẩm</div>
                                <div class="col-6">Tạm tính</div>
                                <div class="col-6">NJ68 MAX x 1</div>
                                <div class="col-6">$125.00</div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <label class="form-check-label click" for="gridCheck">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            I would like to receive exclusive emails with discounts and product information (tuỳ chọn)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng, tăng trải nghiệm sử dụng website, và cho các mục đích cụ thể khác đã được mô tả trong
                                        <a href="">chính sách riêng tư</a> của chúng tôi.</p>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                                    <a type="submit" class="btn btn-primary">Quay về trang chủ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

