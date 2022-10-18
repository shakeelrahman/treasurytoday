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
define( 'DB_NAME', 'db_treasurytoday' );

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
define( 'AUTH_KEY',         '}UCP0Xs){UjbkwsLd5p!bqL}d/W/ko`1w&@#n9I!JA(,83B$M0--e:sg,aQ1g)69' );
define( 'SECURE_AUTH_KEY',  '}M(b2@A<KD,/=V4O E-2~nvo!Qo? a1=N>Uyr^lt?kcX?e!$Z8e^^pvMt6v+@@nm' );
define( 'LOGGED_IN_KEY',    'jN!/eCRI?jk]z@)&~:@oTVy@0=~QiDZR=Ra$xJP$X_]?XIP1@)y-B#O_R~!Ul21(' );
define( 'NONCE_KEY',        'v I2j)Let92j9uX6c2}L^Hh*AHGq!x&.x%%ZdV-+Zxk?qyVY*]r7K%R3Z^OSX5*^' );
define( 'AUTH_SALT',        'mF.6{D<g90(B1MD*(8<Dj`OUA7@$$3.=EAQH5JVE25w)eK@/K9oz0TbDKVLD^`Bo' );
define( 'SECURE_AUTH_SALT', ':( nb##0g_@I7V-NsM[bGp:aXK 9FvRxV6MF]l:<;#;HC5hmrPhy*gxaUV9OR1c?' );
define( 'LOGGED_IN_SALT',   '=Px%87wFIP3uM,8Bx2nYwb4SE_JtW]*_%Q(s>6A9BWju7`ykK!OO SwmnRw!}ZaF' );
define( 'NONCE_SALT',       'RKDJMD_=ZA?j.sN_j(y-rnG]+%OXLDL^In~!fs3./#7%[#Q-.%{EXH4zQ#I+J^ly' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ttimob_';

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
//define( 'WP_ALLOW_REPAIR', true );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
