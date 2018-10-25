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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'znLMkD8d8zx4fcmPgJs4NonRPGMbihQiy0AwbGFtIAcLXIhj4EgShqgT1ETZUYENxneDk48lMUOz6lCH+b9/oA==');
define('SECURE_AUTH_KEY',  'VHEQTpBPGkCFtmp5R7x+JxeEs9huZCcNTYTjZ5IK9EutMPWb8bTTizWO8KhBHhusZCrEYx8CL+o90slmjV2H5g==');
define('LOGGED_IN_KEY',    'utqywYEo/ZuA3T/8J9xToMqK0D95ZO1H5NsxKpXYACY+hxlHdjgIF+OE+6/NaXiUxKZPYuZIt70SUQkPxwnAgg==');
define('NONCE_KEY',        'nGFsbqABpsGJpvHnqFFrB/bTTH4EfvvL5P2UNjJ3t4hxqkphPkqlH44si4MqjCPlhH2hBrQRSN5WCvcWDhWJnw==');
define('AUTH_SALT',        'U0kd0XzmppsrIA3xWPKyhfuljVObHQMeVif0JOAMFMKayGshx5ZtT3Y1XLxdNXib/yK7BWwNKiBdxFz9uuDPqQ==');
define('SECURE_AUTH_SALT', 'GBtEk4P85b7zI4JEkktQpfBKgq8qu6HHk3MSoU5M/LP6un4WG7/td62CzBUSsNeSQZXNXXsEXqaiSryJz6N74Q==');
define('LOGGED_IN_SALT',   'IogqQJkvZp5c/T9H3uEHip79lM5XSAjTWkXfwd6XNNmkkitgFuQ6a6nAXM8QT3Zxjfum0KlPNzraTApTZ1IHFg==');
define('NONCE_SALT',       'LnTHQnTjee8fgYxNbzNWA5SF8h7UYtGnU5qKqH5Iul/YTEMniCbeIq081P+fX2DywXjcRiBH2LOQZehK0fdDAA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
