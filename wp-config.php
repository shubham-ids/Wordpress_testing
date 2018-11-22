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
define('DB_NAME', 'wordpresstest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '!E;ZhQzx&N~u9u?VOh-L09B.nPY_bth!xVm(@Hji#ucg^;?Q]@qs(e3{!*.[o ]k');
define('SECURE_AUTH_KEY',  'k@z,JYFw2+:N7<Q &>qp>nbZ4VZ+iGG;~8Z1~&%-B]0.GD7j$(v0Ik@aFdNlv_iF');
define('LOGGED_IN_KEY',    'ow&,[1iFYA}I4Lt%73[Yv3o[jx=P#:5P5P!SH/#t)-;%:FSnWRaduN}FRpD,vpaR');
define('NONCE_KEY',        'L0F+b]~J{YwMMUS(d5liF9pIAXok/mAo?iqHOuv_^C:*I=qB0a}i%7,$.p&<hT)V');
define('AUTH_SALT',        'rG$T.zOXA-ug3Q<;pqvyTc/`c^YWrT>AmMn!az1{&z.z%F@B=gqs&,Q3~p{W;p8f');
define('SECURE_AUTH_SALT', 'DL~mlr#mt6`S`xKl,Xx!aMz5p;q[M|rLsN4Z])#%eB1+NH[;wn8;2<8i5Q}%ZI/E');
define('LOGGED_IN_SALT',   '*AP_k+.4yG<xM$=&^&Z):xotcyNl5XB4gZ^>CxuJy;F!?q!um[rEUon,zZkc=J?k');
define('NONCE_SALT',       'gw n]ZSDn@K1mOlQUVPhkHG;i,/zm7`[vgic,[r(/K0JPvS&<L<68*q~sRzTgh%_');

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
