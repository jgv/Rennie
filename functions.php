<?php

remove_filter('the_content', 'wpautop'); /* stop the annoying auto <p> tags */

update_option('image_default_link_type', ''); /* stop wp from automatically making images links to themselves */

/*
add_action('admin_menu', 'logo_menu');

*/
add_action('admin_init', 'ud_admin_init');
function ud_admin_init() {
    register_setting( 'ud_options', 'ud_options', 'ud_options_validate' );
    add_settings_section('ud_main', 'Main Section', 'ud_section_text', 'ud');
    add_settings_field('ud_filename', 'File:', 'ud_setting_filename', 'ud', 'ud_main');
}

// add the admin options page
add_action('admin_menu', 'ud_admin_add_page');
function ud_admin_add_page() {
    $mypage = add_theme_page('Upload Logo', 'Upload Logo', 'manage_options', 'ud', 'ud_options_page');
}

// display the admin options page
function ud_options_page() {
?>
    <div class="wrap">
    <h2>Upload Your Logo</h2>
    <p>You can upload your logo here.</p>
    <form method="post" enctype="multipart/form-data" action="options.php">
    <?php settings_fields('ud_options'); ?>
    <?php do_settings_sections('ud'); ?>
    <p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
    </form>

    </div>
    
<?php
}

function ud_section_text() {
    $options = get_option('ud_options');
    echo '<p>Upload your logo here:</p>';
    if ($file = $options['file']) {
        //var_dump($file);
        echo "<img src='{$file['url']}' />";
    }
}

function print_logo(){ /* to display on frontend */
   $options = get_option('ud_options');	
	if ($file = $options['file']) {
        echo "<img src='{$file['url']}' class='logo' />";
    }
}

function ud_setting_filename() {
    echo '<input type="file" name="ud_filename" size="40" />';
}

function ud_options_validate($input) {
    $newinput = array();
    /* require_once( ABSPATH . 'wp-admin/includes/file.php' ); uncomment this if developing locally */
    if ($_FILES['ud_filename']) {
        $overrides = array('test_form' => false); 
        $file = wp_handle_upload($_FILES['ud_filename'], $overrides);
        $newinput['file'] = $file;
    }
    return $newinput;
}
?>