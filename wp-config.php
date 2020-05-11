<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'company' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.MKk|%j!(/Uom)A;p;t@2;m_#gP0)TX<T!@mjWVwt3y@BQ5?.ZVc!{*7MOzonV_s' );
define( 'SECURE_AUTH_KEY',  'hOIYB6TCCU6 Tu+R&r78cnRB@G8osjsL8/VI&/b/Z*A3a.YW0tOo4IfCp8lgbI*}' );
define( 'LOGGED_IN_KEY',    'S%#Gf>]g-vc+AEeh@$vS*+u^z0.k ymNZfq;XFCmA:CT`)TEJ!Q N-Gq+u4`N`1|' );
define( 'NONCE_KEY',        'n,vVh+J&Qpx`5B)!WR~!x+[g#u>zO*>A69c0)g>;&,_wP5!Eb$zek;|]EnDJBHb/' );
define( 'AUTH_SALT',        '5pG^[5nU+AGEoG`o}ES,f9N*#!vyT7kN!~k|0G92y+6u!_D/Bo${WhZ()R.}o[-L' );
define( 'SECURE_AUTH_SALT', 'b%w<,FY4K~K=HFsT?<O_nvM t3sJ&30|fP.3J;/~UO;?!}.C.&#c-x?72.XOX4wR' );
define( 'LOGGED_IN_SALT',   '$r$O)Ttg .gy70^Xk79aOcGrU$<l0S2kNvqv&g!UZ#YG^G`KG9u1mH/9Iek6In?v' );
define( 'NONCE_SALT',       'lO.-pEJ:@n8`5*@P~o0d-,pTfGTNs{I94ZpaAM+3U(VV#uw#OKy{4wE/[|%o|=Oa' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'com_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
