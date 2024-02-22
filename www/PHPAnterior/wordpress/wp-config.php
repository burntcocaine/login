<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'foundation' );

/** Database username */
define( 'DB_USER', 'adminfoundation' );

/** Database password */
define( 'DB_PASSWORD', 'f0und4t10n' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'tn`00`@mavN]l6;GPn$NGA3,2S9^]6)yqV_{i7)!*ya=4Uo=q4IMW_.PA 1:-wvu' );
define( 'SECURE_AUTH_KEY',  ']n Any/%w,.UW||>$LA{%((mKFJS^,!<)zBSwr2JkYk(e?W8y};/L7`4#=:[K}w.' );
define( 'LOGGED_IN_KEY',    '/kGU2ALNgqHvfJ.nLh&^-A.,ZK#f4k.[qY *#-3-)<RG3QAu^Pw^?@|Ahf#+`|PM' );
define( 'NONCE_KEY',        'l5z1ahW0f)9QU_wo{d7rlD(K@#*798PeTi-#GnGU>mb5tf1Z|HU59h9n&1>PQ_5D' );
define( 'AUTH_SALT',        'ZyDZf#*K;6*ljvA4#B~GV/3#H~)LlNSUy|vY)fMNPp],w]<gmz3JD$IQkT&*cQ`#' );
define( 'SECURE_AUTH_SALT', 'tg9xDG[2vuCb;pduATVA//!vTWItCP}0c-$@J2F:`v;LuUxeScs~kg|)/S1W[d7T' );
define( 'LOGGED_IN_SALT',   'p/f>pBkZ>V9eCVMi85ue,Ua3$M{AE_X*-rVb)pqY7-MZMdY~t~J=><iDqJJJC;2/' );
define( 'NONCE_SALT',       'hBjPA2!CY@<|k@%E-}I Uxo~UnW4|bCy%G%)[;DO.cr2-vWsg1=[z:.;oY$WOhVq' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define('upload_max_filesize', '200M');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');


define( 'WP_DEBUG', true );

define( 'WP_DEBUG_DISPLAY', false );

define( 'WP_DEBUG_LOG', true );