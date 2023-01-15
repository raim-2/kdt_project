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
define('DB_NAME', 'earnestga3');

/** MySQL database username */
define('DB_USER', 'earnestga3');

/** MySQL database password */
define('DB_PASSWORD', 'alsrud92!!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%u)0|cy{AMbHq1F`3qf;d?V*Y,Ea%&+}].m3.9U7-GB7Nh3QS}@X76&Q[F?#MzOn');
define('SECURE_AUTH_KEY',  '!fM7i43e;<TSUE@IF}Bekfa1*79tBLY7dHRlcZ:;|*^k B!Inc2|91kXk%#vz)H|');
define('LOGGED_IN_KEY',    '$.td=}|;g)-x,#M%P.@s&uBn?EW=0@/cfJNfYiJU#G 1z8se,qlI@OZB`t1g:avm');
define('NONCE_KEY',        'ma|tz%vTef&#%|G(s|n4H?sF1z=4;yh!6fA{Pb*l$wh z~%a7)fVfm*B_vb0.{8i');
define('AUTH_SALT',        'pN#u`Gp}xe!eYqPl2z]K@zLY8}G#}-ymd$y:{9#X3VSqf]NmilKx*/dcOCLMpZi7');
define('SECURE_AUTH_SALT', 'a5cEs#,F_F:]*5%[#|YHivKDx/U*A>U(i{YImpcx+UN?&p__k^I$&F9IWqnEV$``');
define('LOGGED_IN_SALT',   'F*XduwviN1~stT.Y?4~}Y%swi32W0G23jEIy%Hb)?ZG7&H{CV>R(CVGn:b5L4kpc');
define('NONCE_SALT',       '_o`jnz%j.]j7OTrt[:KkHU_Z2FW-$G.XJn4H&6(;=`f&[R3|~a}he);a?esR1q@i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
