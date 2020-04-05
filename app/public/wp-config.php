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
define('AUTH_KEY',         'Hu2TpS+7S0cUrEhbIeg/00+eYt0ZXeVsq3Dxa6jGgrKWjwRe90e3DFOEeJpZnO6jjp9S6O/1Tncf5CvW56JeGA==');
define('SECURE_AUTH_KEY',  'YgOe3Q5HGoVTYFCN4zQYd63wKOEV6FbsK/yK8X/KDJ2Q/3ho2ugGTOqPsmFtoew9yxxQ0MTOxhN5NLcjr8mPow==');
define('LOGGED_IN_KEY',    'Y3EIgrPJMnW4NnPIOVsPkPQt/f727wTscy81c0YCiPA17iAq023d6LFuPRSY2vTGMR37z58jpT78JA9Il8xuMA==');
define('NONCE_KEY',        'mNH9AJomXGC6Sd1geudWCla63GNqmjnuXL74bH+pYAISQGePajLgfDu9P9ombjLoieJe9X9jtfvy6/b0X8qWbw==');
define('AUTH_SALT',        'tmx9+yltuKobQO4Z/cCfHctwVLCLVCO0b8vQiQlgAuHesKj7e2zK90Dr0NYNX7D0xXd7fQZ0hhQTf3Ki/dW+YA==');
define('SECURE_AUTH_SALT', '1tnT5k/dImkfuT6uy8X7ge6jR94I2v6prp+SHjX2UM/79FvFf0XeUKn9x6mg2v/jcXHo1GHrBsTbb7E93+GJkA==');
define('LOGGED_IN_SALT',   'JpjkQOYwq6kcu/Q+j2NHqilbkFfxFe7UeXAcGV3nw8ByT76FlqoV8nKSMyyVkJuEo3kywzeIcjfEXaEyGWqNLg==');
define('NONCE_SALT',       '85m163/vo/aoSeOCiwu0h3E9A1miT1NTN7UEP/1YCX/DTf/XkuhaTBQPJyLkfo/xDk4CYX/eX07E8t36qh7LUA==');

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
