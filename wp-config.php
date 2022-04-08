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
define( 'AUTH_KEY',         'Z&r)/~Bh QhV?qxCbw2&T}{~x,0BD9l8];]x+l8RB43V6<&9enYb[,;uBAsm15`@' );
define( 'SECURE_AUTH_KEY',  '+IN~LiQD)8l(#o6o;KG]MQI ?>a$S[N{w*hIK|C|~7LjHXUpB5~}>/e2N%@:hhlv' );
define( 'LOGGED_IN_KEY',    'K0$eRgI7:>BkD/h<O9AG$64~5}`:^R8[q&wYPsD1PK~+N$[hqMaSbwUzc>E@X$^v' );
define( 'NONCE_KEY',        '7S5GsgY:x65 :b@;`W^dm5Xsk5#{hJp*W(hHA&+upt6i`-Lct@f$|H&j*YxtxT!o' );
define( 'AUTH_SALT',        '$BgCnB_ZA,,Qh<kNEoz.pFn#Up1o bIEqw{|dF,n,7Dvhxn%i5eYzRK-S3?W/Dtw' );
define( 'SECURE_AUTH_SALT', 'mRE/Gf_*6x0+f!3EB<xxW|%t@(HVz3R4I1f!!* v&?P)bSsfBf<F9s|g<:% 9r4k' );
define( 'LOGGED_IN_SALT',   'MjqO1{%-|2vy|@So_XVcyrHDYN/3T[HZrY5y9A.;>i^$Mqcs5Cg;gkb$t<r]H>ym' );
define( 'NONCE_SALT',       '~*Ilc0i~l/C,*B)Tr0-L^MIa2HbHG|=G2|*j5{a>[!A80]}Y+UgZM)Dh,4,kw,me' );

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
