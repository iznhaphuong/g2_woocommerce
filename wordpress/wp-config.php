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
define( 'AUTH_KEY',         '$mL,OjByU`8jil?-Z&Bgvc``I#2YSp|Qv%2~YfRYO![|*/Cr1HT(*tI@B`+TJ)hf' );
define( 'SECURE_AUTH_KEY',  'GCOS]A7.>)@LRQ+Kp]_#U.}E)D0#QBMQlNnNR30]<fGAb|=8<?,_3DHk~Y(L]{e_' );
define( 'LOGGED_IN_KEY',    '?lKL&1oAfzMUT.P;mpi|u;xM[:8IPFwc]Kbl~/=||$+,5`6/M%Iar19s`wmNcd+c' );
define( 'NONCE_KEY',        ']ysA0|PZiZ,8sp7C$lLRYvebXH$laH~~7o4o|[0xa porZhWKs|DacYVgd g6]yL' );
define( 'AUTH_SALT',        '+u15W?a%W|wTnBsDs9nviR-CL781zV|AL/bIZsMnfNK!i*1eF#kFiB.DU:tz([,.' );
define( 'SECURE_AUTH_SALT', '-,;Z#Uk0#L gZZzeEj#2Gx_HlRO4j{BLW#;{=2s$FFGF}RIDQ?!?!: PeKv#XO,|' );
define( 'LOGGED_IN_SALT',   '~{qMp4v]:BHE5,e:<_)xf2JMJDLq;Nb;SB9`AoH?WE5s)W%dJ?)W]!t<1;G.E`[k' );
define( 'NONCE_SALT',       'arPbl1hCCJQgQ|45+PidMD]nz-k/cL4>$n0^*VP(0oAFU $`x6H]:`J[ rZtV~Rp' );

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
