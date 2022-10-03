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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'e+Mvf#9j`.L6lTYg=k$r}g.+_y 24,}R<[30 utB`5mp>Q6:.0Ez{I(xf*RVS9D/' );
define( 'SECURE_AUTH_KEY',  '[m( d]jrfYZ^Kzwwq;fp=P*y#HSs}!;njMDn%BUFe&^9=[$vxyvGYslc]`Wx#(@.' );
define( 'LOGGED_IN_KEY',    ':88{j*W ,{t6u;i1~$h(7{COD.yk#@ vAqly,V:@mZ,U8s_hvmc2q;`^rBzZ|mK6' );
define( 'NONCE_KEY',        ',Azn;DWJ~GgK$d%$xgSbFNtS A}4FKFnuth|>G:hHR}R[)C@GJ{e4b[ P[x>gave' );
define( 'AUTH_SALT',        'Td$;_qhrRs%NS|vLE42F=K4tx=hS&,6yM3:C@k8V&+%a]+=;wde59f$eLz=d9Y^^' );
define( 'SECURE_AUTH_SALT', '?41_<9K3>k;{}Kb];~o68!C+k>Gy=WfBNx,RP`xt)[oB:{q ikLLWMfMx*8]-r02' );
define( 'LOGGED_IN_SALT',   'v!AVeo1-,8`*yUSRY][W3.SV;,GM9PboK7+`U1NGCSM~E=3as{tDD$=aU!Wq]Rm~' );
define( 'NONCE_SALT',       '8h%{EK)eYAi:_k>x6`(&bVA8[Skqjj@G}zcpQJ/LmH<RFExjg0!56.!SvY`QWBR)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ng_';

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
