<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 10/25/2016
 * Time: 3:04 PM
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$current_role = get_user_meta(get_current_user_id(), '_wcrbr_role', true);
$selected = $current_role ? sanitize_title($current_role) : '';
$roles = get_editable_roles();
?>
<div class="wcrbr-role-filter" style="position:absolute; right: 20px; margin: -60px 2em 2em 0;">
	<form name="wcrbr-role-filter" method="post" action="">
		<label for="role_filter"><strong><?php _e('Filter by User Role:', 'woocom-role-based-reports'); ?></strong></label>
		<select name="role_filter">
			<option value=""><?php _e('ALL', 'woocom-role-based-reports'); ?></option>
			<?php foreach ($roles as $key => $data): ?>
			<option value="<?php echo esc_attr($key); ?>" <?php selected($key, $selected, true); ?>><?php echo esc_html($data['name']); ?></option>
			<?php endforeach; ?>
		</select>
		<?php wp_nonce_field( 'wcrbr_role_filter', 'wcrbr_role_filter_nonce' ); ?>
		<input name="save_role_filter" class="button-secondary" type="submit" value="<?php _e('Save and Update', 'woocom-role-based-reports'); ?>" />
	</form>

</div>