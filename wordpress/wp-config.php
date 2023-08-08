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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testweb' );

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
define( 'AUTH_KEY',         'Z]RKAiO<G[^?3MiFZ|BU=v^R@1-{?7]t7` &+`SYw`>BDqs|s?l_,xG/h6a.Tj<7' );
define( 'SECURE_AUTH_KEY',  'w{pq2Zgh-$`%fJo.{MuYl8>M,+qa^v;=t}<ZPN;{!:!w`P}k>j9uAWmR_8;A#{3I' );
define( 'LOGGED_IN_KEY',    '{>S*Y_X%kS*+NF~,9a/%t0oZ|$zBCbp% gNoH/qvIl([u>Q&FQU2x~)~}2QazCAh' );
define( 'NONCE_KEY',        ' $tfMz#{Mwj_Pq.Rd8T+$#SWT%GtwzP=T^>[$hErCK:Z &%=` ~hRZ;J)PR,z^cU' );
define( 'AUTH_SALT',        '_a!=4[b[;tvmJeYBNRI|l^y7cD5b=_!snTQZJs1I-oZgNA>ox$23Pq0zb<At/bkf' );
define( 'SECURE_AUTH_SALT', '7E)0WmwAOWXAZ!QFt[tv=5,z)QzeSg%l}G!{K![@awAlO[13OB-]Lv]Ey7Mi${z@' );
define( 'LOGGED_IN_SALT',   '4@M]nP7h/FyEXe=CVa6&YM5c2nqzc4[ ==SYP-Y|Cl$,I}nt`)OX@`%2&9-C/Dkq' );
define( 'NONCE_SALT',       'mz%M4^gqi!pC1e_uCUp=F}iF?oNu*L[+2@GK5YVm}hw{PIOo$&cE7xz,PEQ7hu%}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'test_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
