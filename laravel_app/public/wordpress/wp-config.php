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
define('DB_NAME', 'my_first_wp_db');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

/** MySQL hostname */
define('DB_HOST', 'homestead');

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
define('AUTH_KEY',         'e[2W2VI}S0x}mXDhmY)MhZ_`Gl)-31Y%))Yfd7Is|.z)G(J$2)<:64BSyWsKauS|');
define('SECURE_AUTH_KEY',  '`(JSG)q*)v`jt}f<?=n{44LC*$s YA&?oZpCe%0V_#J@GF15it7Yt=R=._9CALBv');
define('LOGGED_IN_KEY',    'zG}[M!1#:g)U)/>:)5dcD3%AOA{3o.}]}v-1H@id[b*]fe9aMTrpC0BIeMEy]ml8');
define('NONCE_KEY',        'wx8Qc5VhS3Z~M`}!vZ`CQL&>DP4#GE#EIx%`aeKI6/WAse`F<bE=:iL}d3)Vk<J!');
define('AUTH_SALT',        'Z*$QwR#w+nDeg.G!6/O?WO6VRH)x4@P&hwesrY(3=tKij{s:eze6;2%:qz~Xnk_>');
define('SECURE_AUTH_SALT', '3D*6xX!tQu-2Hl}?E]#xmid<;@+=K-x,&w0Q10w#Eq+hJG0}dG;LJGWSYNO2^kL2');
define('LOGGED_IN_SALT',   '9S[nX{!Mig!whDkQ8<ia H@v.;OmHx=yPU|*;T{nee*]K)@f3b@`RQIf9/}[#0 f');
define('NONCE_SALT',       '(&_98F#VlJyNZtFW@axSKWUj]fQy#$kP~<$[Vu7.p]Az*QPlP-PNb<}JMhB3Cm2.');

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
