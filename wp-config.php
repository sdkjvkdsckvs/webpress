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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'website1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ',YD;HSGix>[`c]NS!,F8;A0_ B@0/(@GAHc?9QA]^F8NMT/gi>}-px<&#Z0>dk#u' );
define( 'SECURE_AUTH_KEY',  'W[7<Y]qNMQ5x/.99HV%*FB/!Xey<-DJxeg<~t3C 75QA/jL)FEf%(5ss|[z@v?$a' );
define( 'LOGGED_IN_KEY',    'LRK?dHtab4<7$3sTTWUul_NoyJ%(n=uDe_s+ey=PrX#/6-!z(Lg`-:.%6[MS/3rs' );
define( 'NONCE_KEY',        'g2O#{5,; ,^`--F:;Usm~0nb0QG8&N~IKQ#*^e#97L*>18:ng++IHRna.FAP0pZO' );
define( 'AUTH_SALT',        '?@LH[7ZE{V5hLH}S&+w$M`tNz1*9I)z00))zhQ>3SSMCygP$PeC_URvr?(fGI%Zz' );
define( 'SECURE_AUTH_SALT', 'O}e67*1%#z>,B,}Oiv4WMV27=!>`4}xW;Tm%%K8rS_wIAyE6>@)1qNLv/~kwz64H' );
define( 'LOGGED_IN_SALT',   '}$qV^8P~/ZBjUfMXR0~$/Y*neU>V~(+*jI.4EdI^Q&vpK+{bjWrm{e1 R,M87J$p' );
define( 'NONCE_SALT',       '8Bo vF{UC!Up=`N]NJ.+0])`[U^B*2TFo8805:=bo9magk:rH3k=B0:[o-4z6bPQ' );

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
