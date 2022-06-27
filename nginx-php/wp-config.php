<?php
/**
 * Caution: This is a pre-generated  demo wp-config file havine clear text mysql password
 * We should generate this file during docker build in a safe way
 * TODO: Password shoud come from a secret server
 * Should never use this on production
 */

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`&nsYK,ve-ar6MBr[5Bl0Y~pI<[r7ZjNyU(OGwu01s(Va_,+/JNGf3.[C4.!i-Z ' );
define( 'SECURE_AUTH_KEY',  'h}~WVkywX`,$;Gvo&N+qC;72joG>5zP?hYq$I_3eq9bX{e-QeyWL#%<0nV2z]2o+' );
define( 'LOGGED_IN_KEY',    'aIp5M_PTGqm3`;O@]YTE?|XY3sP>*oh1V</Df;7O#:8M<c(p#{N&h+v3Bzv6sh?P' );
define( 'NONCE_KEY',        'w7q+y=*0]x8+[&PXOHt=2jKHODu@*{tEDcJ{qW.PWx(W.;jc<<j!Qu5{1s8?}0~/' );
define( 'AUTH_SALT',        'whC{O5l.c%G:SP~Vc)icF*PJ66v]A*^=.Gno_JouJ[}j^e)1&7z$-5uu!P5hK!Tq' );
define( 'SECURE_AUTH_SALT', '4!_a9Ir_5_Bp?H)Z A(4FF(+:o=tz}Gum5H8!|kGAXbn>x(wj8iQu_0uX@n1>e7D' );
define( 'LOGGED_IN_SALT',   'klZBlm^Tzr)!213M+(XX-&%M=?<SG6-uOb=6|s-;{Tz*]N6ddF~[R<i:38XkN)$u' );
define( 'NONCE_SALT',       'oT8SaD%IpaP~F=XCXK:ax[a&.liOD!DA#:.3xWdv?n~^had4%K}#E2wV;x)+Pn5:' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
