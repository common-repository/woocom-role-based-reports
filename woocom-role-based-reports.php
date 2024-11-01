<?php
/**
 * Plugin Name: Role Based Reports for WooCommerce
 * Plugin URI: https://stephensherrardplugins.com/
 * Description: Filter WooCommerce Sales Reports by user role
 * Version: 0.0.3
 * Author: Stephen Sherrard Plugins
 * Author URI: https://stephensherrardplugins.com/
 * Requires at least: 4.4
 * Tested up to: 5.5.1
 * WC tested up to: 4.5.0
 *
 * Text Domain: woocom-role-based-reports
 * Domain Path: /languages/
 *
 */

function wcrbr_filter_report_args($args) {

	if(! empty( $_GET['tab'] ) && 'orders' !== $_GET['tab']) {
		return $args;
	}

	$saved_role = get_user_meta(get_current_user_id(), '_wcrbr_role', true);
	if(!$saved_role) {
		return $args;
	}
	$role = sanitize_title($saved_role);

	$user_ids = get_users(array('role' => $role, 'fields' => 'ID'));

	if(empty($user_ids)) {
		$user_ids = array('-1');
	}

	if(!empty($user_ids)) {

		if(isset($args['where_meta'])) {
			$args['where_meta']['relation'] = 'AND';
			$args['where_meta'][] = array(
				'type'       => 'meta',
				'meta_key'   => '_customer_user',
				'meta_value' => $user_ids,
				'operator'   => 'IN'
			);
		} else {
			$args['where_meta'] = array(
				'relation' => 'AND',
				array(
					'type'       => 'meta',
					'meta_key'   => '_customer_user',
					'meta_value' => $user_ids,
					'operator'   => 'IN'
				)
			);
		}
	}

	return $args;
}

function wcrbr_init() {
	add_filter('woocommerce_reports_get_order_report_data_args', 'wcrbr_filter_report_args');
}
add_action('woocommerce_init', 'wcrbr_init');

function wcrbr_role_filter_notice() {
	$screen = get_current_screen();
	$current_tab    = ! empty( $_GET['tab'] ) ? sanitize_title( $_GET['tab'] ) : 'orders';
	if ( 'woocommerce_page_wc-reports' == $screen->base && 'orders' == $current_tab) {
		include('html-wcrbr-role-filter.php');
	}
	return;
}
add_action( 'admin_footer', 'wcrbr_role_filter_notice' );

function wcrbr_process_filter_form() {
	if(isset($_POST['save_role_filter'])) {
		if ( empty( $_REQUEST['wcrbr_role_filter_nonce'] ) || ! wp_verify_nonce( $_REQUEST['wcrbr_role_filter_nonce'], 'wcrbr_role_filter' ) ) {
			die( __( 'Action failed. Please refresh the page and retry.', 'woocom-role-based-reports' ) );
		}
		if(isset($_POST['role_filter'])) {
			if('' === $_POST['role_filter']) {
				delete_user_meta(get_current_user_id(), '_wcrbr_role');
			} else {
				$roles = get_editable_roles();
				if(array_key_exists($_POST['role_filter'], $roles)) {
					$role = sanitize_title($_POST['role_filter']);
					update_user_meta(get_current_user_id(), '_wcrbr_role', $role );
				}
			}
		}
	}
}
add_action('admin_init', 'wcrbr_process_filter_form');