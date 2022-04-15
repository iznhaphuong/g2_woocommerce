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
define( 'AUTH_KEY',         'mju>[!]{4N9JH><}xjZgUI8|05-m$0S*;pl~CUlf x7R[v.XrE,^yZvpIU$n&|rU' );
define( 'SECURE_AUTH_KEY',  'AEte1{Vo#(.S]rp|ZvH(ZsZSm}whT#,E=I5oR^Ae &gxIay25IxL#7$&C&$Y*IJ(' );
define( 'LOGGED_IN_KEY',    'y#Q<tltyFdG02Za)N]6S4+(|.k[*9oLe9h)M$PfQQI{pKtBmO;}bRl;*cpq/O7#!' );
define( 'NONCE_KEY',        'iRM[w77#jUIp8YkzuTfRvCX{5Jj@Xo3hksKVsDL=3*#-5T]p--1k,}bHTY%j-O]B' );
define( 'AUTH_SALT',        '*@+@Mwa>xPGG#O|!PC|_E8A!,HJ#Bvs&3G `z4gl3omJlW9G4qLWB&|@uCa>r$x5' );
define( 'SECURE_AUTH_SALT', 'H,$o(Yf4SJE??b+}UC1-]4F+pjtTPn[IEXHnsk~7b_Pi:<R$^1P+%4$UO)b)@1ch' );
define( 'LOGGED_IN_SALT',   'D/(TWU&r*=EG^LAY$!b=;70l(Ur+Dp?S{L.;S.Q1-wiJu)G))_ac+jGeg/$[3B1a' );
define( 'NONCE_SALT',       ']>^So[b,:g2~8aY/AOoQy]j^E482CNQ-zhrhaLR4l}wtutYw[:w_8QnWF:4CEP7=' );

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
