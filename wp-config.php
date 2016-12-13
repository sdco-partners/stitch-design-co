<?php
define('WP_CACHE', TRUE);
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'dev_stitchdesignco');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E$eL<(d}qy)1WG@IY$!NmO>fuMOq+,$=Y`yl$3;2.rl-DY;p-aPFM#,Q.XV/iCb ');
define('SECURE_AUTH_KEY',  'mw;_4EQ2*:%SVU|b* @caOYmFor4MzBX^p_M+~IEd*vh~%ihc[}?5+kCN`p#xB}l');
define('LOGGED_IN_KEY',    'qoQ}mNr7G;MA*IU*j-<5IQb>AX5r=l[{60eXb|%|/@fBlWox`Q+-9i._65A_}R>Y');
define('NONCE_KEY',        't^+(_danX[Xf :Qesd84qjF~}QTy3D4LL0y45<V2tGqrN<bHK;!H;a0X_fK#M|&`');
define('AUTH_SALT',        'zUjt1=B:ziP)+d-bTE-U^@lPyyXXG~gJz1J$!NNB8K~X[6fO@q{_BWQ-[|rG1MGy');
define('SECURE_AUTH_SALT', '0HfM63W;lASJ`P`<((rLB<R9`5OBhEm:U!V<{zST-:xb|{x.,cZ[lm.Of+m_@(Y8');
define('LOGGED_IN_SALT',   '}1-iR =I.;t7t^|OT+r/7Kr?]VK8XGK*b@fX%be}!~!Y:5~#rUXe@y7]ZGK*)WbS');
define('NONCE_SALT',       '((MH>7E2!,.e.P*40y+}<f^g`LT+QX8`.A;R1ve$aY9HP1-*M+FZKq>Z]- 8nyX#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . ':8888/stitchdesignco/cms');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . ':8888/stitchdesignco');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . ':8888/stitchdesignco/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
