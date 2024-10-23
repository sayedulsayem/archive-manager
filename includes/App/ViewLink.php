<?php

namespace SayedulSayem\ArchiveManager\App;

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

/**
 * All ajax handler class
 *
 * @author sayedulsayem
 * @since 0.0.1
 */
class ViewLink {
	use \SayedulSayem\ArchiveManager\Traits\Singleton;

	public function init() {
		add_action( 'init', [ $this, 'trigger_archive_rows_action' ] );
		add_filter( 'user_row_actions', [ $this, 'add_archive_link_on_users_rows_action' ], 10, 2 );
	}

	public function trigger_archive_rows_action() {
		$post_types = get_post_types( [ 'public' => true ] );

		foreach ( $post_types as $post_type ) {
			$taxonomies = get_object_taxonomies( $post_type );

			foreach ( $taxonomies as $taxonomy ) {
				add_filter( "{$taxonomy}_row_actions", [ $this, 'add_archive_link_on_terms_rows_action' ], 10, 2 );
			}
		}
	}

	public function add_archive_link_on_terms_rows_action( $actions, $term ) {
		$archive_link            = get_term_link( $term );
		$actions['archive_link'] = '<a href="' . esc_url( $archive_link ) . '" target="_blank">' . __( 'View Archive', 'archive-manager' ) . '</a>';
		return $actions;
	}

	public function add_archive_link_on_users_rows_action( $actions, $user_object ) {
		$author_archive_link     = get_author_posts_url( $user_object->ID );
		$actions['archive_link'] = '<a href="' . esc_url( $author_archive_link ) . '" target="_blank">' . __( 'View Archive', 'archive-manager' ) . '</a>';
		return $actions;
	}
}
