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
define( 'DB_NAME', 'e-commerce' );

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
define( 'AUTH_KEY',         '7Zu/,g$roqrKFGCbzRS/Sr$<`5_mtl0*%aPO75k=%%u8B-$`*W3HRq]:b.,;<N6}' );
define( 'SECURE_AUTH_KEY',  'Dc%$@f>C3-B8@F6JBi<x~iyQS>2rXLDWx:_tzHscO0EOSLE=u]]d2n)$O =-Pc^$' );
define( 'LOGGED_IN_KEY',    '.(d^t+9!jwXStESVA`h/d5Op_VJFZY!9Z-VeD5lFhgfm6#,a|a4AID3t)uVenvTI' );
define( 'NONCE_KEY',        'V%<GL!paBuU|>6OQTVrZ5DzpA|~/[ $wwSugCZSN[Kc&81Uen:o=J[);|a5POB@;' );
define( 'AUTH_SALT',        'Ule44Q?QU#MX)>n6gW`F* @Kt}H ?SL*|{K%$:Ym`]eH{IWF/8eU|OF&|CfN;yho' );
define( 'SECURE_AUTH_SALT', 'pr7+)6a <jC[]LL8[-Y<qlm-6NSH^z+WRgZkT&4LgQl#MR)db8luEe^w`S3NLm>`' );
define( 'LOGGED_IN_SALT',   'w_/i</ZI36 ?Ok-!~S]AZ;Y`2@$5i@ay5r96Ka4r zN>(zLtVc 833#3+eIx1phz' );
define( 'NONCE_SALT',       'M!d(TANx%lUtL9eHhI]5s^[iaKdw(~W.0Gtry!wS7ODIgH+u%_R@_JO8Y},[_lb]' );

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
