<?php
/*
Plugin Name: Archive Manager
Plugin URI: https://github.com/sayedulsayem/archive-manager
Description: Easily access your archive pages for taxonomies and users
Version: 0.0.1
Author: Sayedul Sayem
Author URI: https://sayedulsayem.com/
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: archive-manager
Domain Path: /i18n/
*/

namespace SayedulSayem\ArchiveManager;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;


if ( ! class_exists( ArchiveManager::class ) && is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . '/vendor/autoload.php';
}

class_exists( ArchiveManager::class ) && ArchiveManager::instance()->init();
