<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wordpress2' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', 'root' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ZvEaMd)>pUv2Hf6ZJ*K{*Tns.&xf>unl6Un}^x?!S+va{WEDPfbv8,$[<F8V*>X~' );
define( 'SECURE_AUTH_KEY',  ' EgR-qW1;NBd,mOY^x-E?N|gQqx{I[g=)Q+;K)D+fOU;g,-]GPzeC)6A]Z]Y22]z' );
define( 'LOGGED_IN_KEY',    'I(Ac?bBRs!ilj(PUrgb9qPd[j1Uzuul~+(; s(}+jrj?* Km<;1`)bU6eV}l%d`_' );
define( 'NONCE_KEY',        '%g/+P.P(E5+=@8u<$9ph[1;DN}+G.JeT._!(8}>x<nG+!bv9e)&L_)~:uoH8BA^y' );
define( 'AUTH_SALT',        'z=YYN~fn6|tV)_0JUzT=nz5Ng[N+%K@tl #<I@nJ^3xbb}5&sYwwW!_T3[eleS)E' );
define( 'SECURE_AUTH_SALT', '+M$%NRYvcKEJ>|vg{@Eg&,jh(Ud#IYew(TgVo|<ZT.+Q82qAoN_{`U?rUQ6SVDyM' );
define( 'LOGGED_IN_SALT',   'K[$M#s1%$3_bv:i8PQ9YtvMM%0g2JUv1~wTt(7_Y8lzN*1)[>RMYPT^=_eD4.7wM' );
define( 'NONCE_SALT',       'tva;a/|4%QF:cX^{<v?pdxT;^t(.3SCm#<aTE33G{PYEx3KVJdlP&2X^yi + fHa' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
