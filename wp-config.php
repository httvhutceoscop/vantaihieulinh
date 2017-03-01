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
define('DB_NAME', 'vantaihieulinh_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '>((pNdt3}E.[mlJ<7SW?zR=](i#coh|XK],eZubQxu~PA(xq0DGaMH<RrhdQB`Xf');
define('SECURE_AUTH_KEY',  'FW&zF/xlse%?29g*;RpQFIpflk0Y477~//NysGio$0YPPi*.oELOX$ PP :ZLQ<#');
define('LOGGED_IN_KEY',    'NMW|3ceOQ8+(r`70C1YvsBkGQ{j5V67UxAM@@w`y5/F>6c`!1Z,-@=&#<nOgj5^j');
define('NONCE_KEY',        'C)FQQT^x 1nyWQkP(b#z-/`HpE!bPX*uvd!xsSZ9t68TLU+&Jx]vHmAq{{[7E{7o');
define('AUTH_SALT',        'C><5)G+[,vixbt&Je7]s0L>)M*Uy**8U?4<)M)77/4#HVN51V1pIe78gvVPI>p;&');
define('SECURE_AUTH_SALT', 'T@.:sX_?,3KN.Oglx#f1>NBt,!fH<cj30>Z8hs~Jr1i!=i]:St#j8D:}/7T!U_Yd');
define('LOGGED_IN_SALT',   '8CY@qj{J*IGoA$h1+P|dhR>|O`,ZPh*ZS5zZ&mn-4ukF`Ed)ksiL|vs0-k73}*u<');
define('NONCE_SALT',       '1lM;%TVVPC#9cp,^C;oSDSzC,a-.SGd.-*Rim|t53W>v)gH@p#Q IuWf`>C{~OYZ');

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
