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
define( 'DB_NAME', 'wordpress' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'PHZqSCt2~Sv1Z71$s6[U<oSYEr!@,P]0xTj]tQ:oWx3MRv8#9qpE3>^`9hvw#e+M' );
define( 'SECURE_AUTH_KEY',  'J@2Jv8=EMI vqZh_O`Gm,z1xN~~>:dc<9|{?DHN.]L`M(xSMO]/I!N#^-o.DZoud' );
define( 'LOGGED_IN_KEY',    'g?sqb{A gu}wHkZ)/I/5 2+aiQ  {AN,#&5vLgYwG7dnn:u-mJ| JjqR0Kd`E:sV' );
define( 'NONCE_KEY',        '=|.}A#IO&S_J1_MAQyPa^7oEn6:-}L7MBckueb1]@UP_X$Pz3%wX^3L tQodrxf[' );
define( 'AUTH_SALT',        'N8E</T^yIpTfCkB$`eFmtDJJ`A+}}:!C?o!9:~YH><@Xi|#@g:*uF)1CU+-[J0_o' );
define( 'SECURE_AUTH_SALT', 'hkj3Az^Hkw8x+n1fNf)(_rkFFUW`F$&Hp:KPR>*Pyad0?hGvGx`uWm`6A_F0Af~#' );
define( 'LOGGED_IN_SALT',   'u)-kprS8MiOPsw ;n+_~IBa@f <}|h`m2`bHD;Mu%=@(6u]vW;zpK6OO9HE8*d.(' );
define( 'NONCE_SALT',       '-3!lw)9(/1K8zA](_JdIkv~1xyIE>oM9hZvy+qLhy4beU!msig8<6|:YL3l6aD*6' );

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
