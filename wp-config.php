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
define( 'DB_NAME', 'rectubmx_customerquery' );

/** Database username */
define( 'DB_USER', 'rectubmx_customer' );

/** Database password */
define( 'DB_PASSWORD', 'Rakesh@2023' );

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
define( 'AUTH_KEY',         '7gmqjrkvmfgjosv4u4evm39vzamoked9uthodnhnjkrnciioeeapwzglnnglvpvs' );
define( 'SECURE_AUTH_KEY',  'rc4zv61ui1pescctwxjoynghn4pwkgrusgrrt06zorquu2bcjpd4e1f8zxvasz5n' );
define( 'LOGGED_IN_KEY',    'sj9bbq079uvlsgcxvb4zv702golzwf1yfoww5gcrosnpczzpmwaqpvbolccznnt2' );
define( 'NONCE_KEY',        '1w3ufea6lakh2qgiw7micszuwiosv0yy34f4iin9pb06h9dtbf7qpithub8oykji' );
define( 'AUTH_SALT',        '9flxkbvxty52anfb5rnf4q5mzh5oc2mdhcticclap2p3btopmllsyrwq1mdl0znd' );
define( 'SECURE_AUTH_SALT', 'rte0y4k82m3nf78pmdfdbzitnkys2atzqbesi3hfdtf3gqsd9nkr01s3ds3ljift' );
define( 'LOGGED_IN_SALT',   'qqqy3ez55d48hwyvdtqvtyuw6bdo7vbk6tzkvmugkuxoxssk2bqel8stn3kbjt8s' );
define( 'NONCE_SALT',       'o9jpatt9s2ujwkf6qjoidlvmazb6gduvarwnelbo7n5hjovusiblvnww6tpp7a0c' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpam_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
