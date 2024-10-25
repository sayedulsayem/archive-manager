<?php

namespace SayedulSayem\ArchiveManager;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

/**
 * Archive Manager plugin bootstrap class
 *
 * @author sayedulsayem
 * @since 0.0.2
 */
class ArchiveManager {
	use \SayedulSayem\ArchiveManager\Traits\Singleton;

	public function init() {
		$this->define_constants();

		add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
	}

	public function define_constants() {
		define( 'SS_ARCHIVE_MANAGER_VERSION', defined( 'SS_ARCHIVE_MANAGER_DEV' ) ? time() : '0.0.2' );
		define( 'SS_ARCHIVE_MANAGER_PATH', \plugin_dir_path( __DIR__ ) );
	}

	public function init_plugin() {
		$this->includes();
		$this->init_hooks();
	}

	public function includes() {
		App\ViewLink::instance()->init();
	}

	public function init_hooks() {
		add_action( 'init', [ $this, 'localization_setup' ] );
	}

	public function localization_setup() {
		load_plugin_textdomain( 'archive-manager', false, SS_ARCHIVE_MANAGER_PATH . 'i18n/' );
	}
}
