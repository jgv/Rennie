<?php

remove_filter('the_content', 'wpautop'); /* stop the annoying auto <p> tags */

add_action('admin_menu', 'logo_menu');

function logo_menu() {
	add_theme_page('Upload logo', 'Logo', 'manage_options', 'add-logo', 'logo_options');
}

function logo_options() {

	if (!current_user_can('manage_options'))  {
    	wp_die( __('You do not have sufficient permissions to access this page.') );
  	}
	?>
	<form name="form1" method="post" action="upload.php"  enctype="multipart/form-data">

	<p><?php _e("Your Logo:"); ?> 
	<input type="file" name="photo"> 
	</p><hr />

	<p class="submit">
	<input type="submit" name="upload" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
	</p>

</form>
</div>
<?php
}
?>