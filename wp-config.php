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
define('DB_NAME', 'carsharks');

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
define('AUTH_KEY',         'o#MzekP{5!-W1O^nz9s=@JIeUc&Zy-,L5.}BvUN<`zN1xp8A4De)WNa!g2yV[O~&');
define('SECURE_AUTH_KEY',  'h|EyVJC9XI$G->Fu!<ikvla1P}t/_Ag6h+wq*[i]dEMMDF8@9D/lrGg3D}<Fcg4A');
define('LOGGED_IN_KEY',    'HGz6D!gD6/}0}hVY9bqpNl37mcmcp&spxM|nCRXLpsKc}l+m|i$`-$vJd&PE^Z; ');
define('NONCE_KEY',        'Q;,$S](BqA6j;g1#fq1^meA?A:_F13zG4Z1vZz0a[/a.[;:BSdF~>{fN9m6 CBSs');
define('AUTH_SALT',        'R=ihD3O]_@&!uU[]o-_}_io}Tq}4wk$#@:nGEH8Ya{BLkyT}Y$hqtJv*LGhA~)u9');
define('SECURE_AUTH_SALT', 'SkAJo$Nh(bk%rWTG&UVZhBPl0C=!]@WI-*hkj+vQEvUAAU:OW:C4=q<th.iZ]}Tp');
define('LOGGED_IN_SALT',   '$Y<1SE9%SoSX3<Qs&U6{8R#f0zYD}/Y9Ot6]9VVre24@z~,hh4; )E=Rc%u9iuRa');
define('NONCE_SALT',       '/9C_X,_`*CL(m1nD[=X$,%A!yc-YzK.}(65MNfqYm[WR>4ab%iCFb8j~k?#k<;3F');

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
