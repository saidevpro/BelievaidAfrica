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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cmfbdfp545' );

/** MySQL database username */
define( 'DB_USER', 'cmfbdfp545' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mySQL2020believaid224' );

/** MySQL hostname */
define( 'DB_HOST', 'cmfbdfp545.mysql.db' );

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
define( 'AUTH_KEY',         '921RwH<Vl$C+.9Id#u=bW=JCkx/qYVl>/p2PHh3nN~A*.b-:JPs_K1fu@2:OB2t6' );
define( 'SECURE_AUTH_KEY',  'g{-W>yzQnKeQFr#>kMD79t2ZA-/R>rMBWawtCp0`3q=eN`VMl=y:wkIF>IS[ps,_' );
define( 'LOGGED_IN_KEY',    '>&P zkCWcl-%~1}&-^s t67IGp1&)/_N!;b92J_GTr9Aoo?R<4R$<QSjry;!3B2i' );
define( 'NONCE_KEY',        '3?wld<J:zs:0LUqWS@@A&vUB-4D}xa`?A$ z<swj*}dFJ*_&`H,t,WvA.xN)SZ)%' );
define( 'AUTH_SALT',        'z%KoJ#M=7<{m6,rhVI)`MRU{Mp,^G?HPgBV 8p>yv`F Dx3<c@z4rU=9Hc~Nrc~Y' );
define( 'SECURE_AUTH_SALT', 'v??Q,MzAs@SK-o]qmU@vIy9KZO[ah,DZ/H.gFV6D5-BCAK/b2h,KpVAToB=+Dt6+' );
define( 'LOGGED_IN_SALT',   'Q/!RSZV+4VyeY7jiU9)),&8Z0:x-Y`-IU{Nttv/KV4E3X2oPN>]}mKUgvl6)69PK' );
define( 'NONCE_SALT',       '0iis&|} >F<T-2FeHcVEn7BITzk@5}q5F!j7,=@AIyaN.DJ&_R0nKU7}@m!A{2vD' );
define('FACEBOOK_APP_ID', '404744363699727');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
