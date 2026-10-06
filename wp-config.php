<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'samplits_db' );

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
define( 'AUTH_KEY',         'oOh%0GDL&^zmb.B5m4V={rq5bBrdi:SKNrFodLC,^_*,6mdGd=1_ssu2-y-7.oxQ' );
define( 'SECURE_AUTH_KEY',  '=FYDj`L5ahxN5W%6-tzay#AeUMG5EIt1ED*o*CMM-E2R~|LCK]g8GsJ?682h(/1f' );
define( 'LOGGED_IN_KEY',    'jEKntO?G~vVPxv!iPF8/:Q[-La@v/@wwXwwzLBt}s`P&^by!F1}!Z..Ya@$.T[-k' );
define( 'NONCE_KEY',        'm&?TNeC$n-V(1#DHP>J5JwAW[,V3INuLUgFmE7d!;&180s*tRsUvTV&%%|q:e+8u' );
define( 'AUTH_SALT',        '|rp.h {I6IB#]vBSCogM=stB%L ^Aj4q^^v7p&c4[U8zv1XX<-Y#S^Hml,g:M5+=' );
define( 'SECURE_AUTH_SALT', 'M0 =+NR3i ze3WY_<lSS~I,x[C)+&Y6P&Knd p;e%XmbwiDL8eu-&2f&H[H`SPVu' );
define( 'LOGGED_IN_SALT',   'Z$,mMN`VXZbY`c12vK!d3FYjGxKFNkEwKhl]KXev#+fW)a KAgY*])S0Py,]KUL&' );
define( 'NONCE_SALT',       '8)*Kl-J<4o:F6>jYq6M;NC{6o$F?$2F/%q{f*!+qP3|T{`]i1ldZ7PURN?#?LF+B' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
