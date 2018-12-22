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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'r3dpadmin');

/** MySQL database password */
define('DB_PASSWORD', 'R3DP101084r3dp!');

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
define('AUTH_KEY',         '7p<zK.eED|9tHr[XJJj FXqb/DSL[|v:R -VGt:FGeS>mbI&hHs+jU;l9-@oH.r`');
define('SECURE_AUTH_KEY',  'EU)G8e:|/[X1Y|xX]+(f9~Ud&l^p$uB|`2HmOv;rrr;W_1v=-B!sdBZm~!9o5~w(');
define('LOGGED_IN_KEY',    'ioSA)G1S._}?TzcCSxX&NZ/x]E}nAwY^~@hLHt/K)Wz+%0&7~;>VdNjD{x)75[zU');
define('NONCE_KEY',        'FIYxUpOz!6%Vxt9@oJSf/UDhMbFo}tcP_x=2:b4pv |0T<v7J=|eMRj.{n@2uCV.');
define('AUTH_SALT',        'L.xCJ_%@g4%kb`dC!=Uww-:#e4F^{eP>q sY:AvHJ(56_z*w]Fe-,:4_Lfj1dY;s');
define('SECURE_AUTH_SALT', 'Qp.{I.rJ/@6GAMXu)NW`_Bp-~ul@^W,*dQ_7?<Xw+??)#X7ihC1rn&[4.TUCQy !');
define('LOGGED_IN_SALT',   'N^;o~dFjpy5%NWm>Eh[eLdjq[&d%#hq,RU]II%#b>~:n!Li}}OF$t{LI!LP.pF]x');
define('NONCE_SALT',       '3d~QU-fn.$W%1gp[fGjxeNz0EUZe:p5I)wxM/9IbpPSE#RcR+_r1xE4GsB|Z1q&%');

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
