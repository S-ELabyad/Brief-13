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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'comerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ']P<>jmM:UWEW[2OLT>_H*tnFYZf!X#VJs97.fP;}lhTRHV%R9se>`hDx&Yt6L9>K' );
define( 'SECURE_AUTH_KEY',  'zZ|@)(7N>urlF_St2SwV<v<S]E@n%;3;9^uTb]sHWAhX/.N2eGF-KM~Y*{<Bvl6E' );
define( 'LOGGED_IN_KEY',    'M]U{i:L=!KqhEpSz@r$Olo,B.DANc6ZMr$i&FJ H}T:mgu42GBHb0B/?BCNyXqK(' );
define( 'NONCE_KEY',        '2LnJ&:]|^:EP. XZ[bI}Qt2syi-e6,no&LM@znL3% 2Gln@1az{jJ>d+#OababH*' );
define( 'AUTH_SALT',        '1dhU-a-OX>l=bv9C|T5uTPil5QmVQ0D&;+f-TOapp1j/Y]UhNk10<qcU7ICd`iVu' );
define( 'SECURE_AUTH_SALT', '(aW_5M8 +SvQo07U{{Fd5&S+IW7)X}OoGE1Q(gh*@Olkddx=LBEPo,;Q?~CCv<[]' );
define( 'LOGGED_IN_SALT',   '+MF0G:;jY0lo?3%[Ef>xJ,^7y)5973*bS/[G 5EhUbryyy2<-v /BKRTC=hH^-7c' );
define( 'NONCE_SALT',       'KSMO$mL{>@/>P]2wz T$m$1.2W~n>sJzfI&Y3JA!paZ0&.iv&F&F7bBQ) vZ1*|l' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
