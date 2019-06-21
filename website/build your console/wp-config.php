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
define( 'DB_NAME', 'elaine' );

/** MySQL database username */
define( 'DB_USER', 'Elaine' );

/** MySQL database password */
define( 'DB_PASSWORD', 'I8Vs1fnvYzSXdyF0' );

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
define( 'AUTH_KEY',         '7J0yu>p@HYTTbC7umg.KL#VP3Nw2Lh$HCw]?zgKEtCr|1D+p?tRf+`-rc6QWGC#k' );
define( 'SECURE_AUTH_KEY',  '<x%Qrdhy,=g=ru}-Jve~L]%bn13 bbeb$nK8Ac!`Wb(`#Ik!e3KJRk(| ITbv+VL' );
define( 'LOGGED_IN_KEY',    '_,722MP`YJ=yxoU_X1e(It[2GV$iRZ#y|9=h]DZdztQ][8#|#~dgBK6/?dBZ>NiS' );
define( 'NONCE_KEY',        'FAZhRwI-<527rPf/7{P }[PO.W^]6 8860a?8]YTD-}kaSq`J~wcuZJT4hDB**Ab' );
define( 'AUTH_SALT',        'g}cgQq+4`,7lXLj?7=Y|^YUgrI`yC,G%1}}~z2%HrZx-8)RFu~][DyThi&83P+c7' );
define( 'SECURE_AUTH_SALT', '3Q[Z=SH&/}khspd6u_6SUj?X`YX:b6p(jG x3+D(%2|6m!@B|R8>o-8*F!#a8G.D' );
define( 'LOGGED_IN_SALT',   'vMLS`?`#vy?wt!nyu6Q?DL5{~Bf;/k~?p5jhO(3#QZ/>:gQQ8 #>2p9~}{gWO<]?' );
define( 'NONCE_SALT',       '[Wyeb`Vv8-Leng#XZK G73yiwLrX>!xNkLOH}OXGM)<Ajn^FdPZRsbY3[WrLhD4F' );

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
define('WP_MEMORY_LIMIT','64M');