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
define( 'AUTH_KEY',         '-ratJwLL~y;bPG|yer _2v)My_p7 qQAesU*yznsyabAtjiMq1WTsz~PKSEbC2$m' );
define( 'SECURE_AUTH_KEY',  'jj<1T+H{J5G9iNk?ZN<`LLU!>EC}Dg[j&>>a!UngIu?u7>Zy-U4f_H<RO=C3&G5<' );
define( 'LOGGED_IN_KEY',    'OrMUL>1ceWT:`)ZH+wT}@7B];[;}=-^f~wK5^j<.UTR7Q~f}3m=:~8zsvB{OVLiq' );
define( 'NONCE_KEY',        'wdmG5gD!o0DG## _>;*#=}5@-%Kmw_V(Oj.9xf2MEi%8p_F=PD3rP&$nBn A:&,9' );
define( 'AUTH_SALT',        '<t5EC~oY00%5<M=gR%-Cfq<2nvz9z7ly;`F1fj01I&+]XkHD1_R)a7kB3J=NxcTN' );
define( 'SECURE_AUTH_SALT', '.$K>hDGnAfCTHrFTZfV)Y8Uog_}sXO.!O}HTVBF+:xh5b8~JbhAS?Z@zNg&~anO7' );
define( 'LOGGED_IN_SALT',   'ccQNvY*K}P;ws68:s4C8AWI<4OU47|y> HWcD[M1L_pEJaD*?MTHARCxO]bH7imA' );
define( 'NONCE_SALT',       '3`NA{XJ^aFm~+lE`/{OU|>4q;]2#lUupW1hnW}]f@Ww?~<8bbKac3u[31sfWT@v+' );

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
