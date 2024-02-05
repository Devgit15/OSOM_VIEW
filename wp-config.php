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
define( 'DB_NAME', '4792_wp_121' );

/** Database username */
define( 'DB_USER', 'adminek_michal' );

/** Database password */
define( 'DB_PASSWORD', 'Zadanie1234@5' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'K3Gc4DNxJkeurwy8FDrmcRpktMoiFF7KwbX6W8nt2wio5YL3ltg551yuRloA3lO0');
define('SECURE_AUTH_KEY',  'YMTzCfcv8Ldx1i3iRtsaaX1ydUujmyhSkBiW80gTMsRtR2ovwLmwrFE5FTfIW6OB');
define('LOGGED_IN_KEY',    'D7nYiQibYb3BjDKVl9boj9EPfqGjRy399EG7uh0YRFTm7McQ2a4SZwDB5wrOYbjS');
define('NONCE_KEY',        'jrNCE9Ls0Mob3ASOqitpIq9HaSUipXPLvoV6XiQZ7L6rszwiqkxVmhOApAchL6oh');
define('AUTH_SALT',        'jS4tUjMUUfZ1fOortV1NWg40dNrOBavLo41yItraCCiMyIJo3Q3t3mRJxmgHGhRf');
define('SECURE_AUTH_SALT', 'NtBzAfE42088TB6XLabZAjCu1F0eBMINb6JBGFtYfFFgnGJrYJUSTh72OtdeYGRh');
define('LOGGED_IN_SALT',   'KBGudRMMpS0Oal4ehwyJX19Z9jFJd7tfbTmL8i2BdZ7FowQb2sVbGw326uIHT9Tc');
define('NONCE_SALT',       'sXw4G4qXbtl52GMsHwvpz3tMRsyuQf6HlI7kRMzTCncKJKJOjQIGHAG6mltxXAdx');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wq6w_';

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
define( 'WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
