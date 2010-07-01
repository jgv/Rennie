<?php

remove_filter('the_content', 'wpautop'); /* stop the annoying auto <p> tags */

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
    <h2>Upload Demo</h2>
    <p>You can upload a file. It'll go in the uploads directory.</p>
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
    echo '<p>Upload your file here:</p>';
    if ($file = $options['file']) {
        //var_dump($file);
        echo "<img src='{$file['url']}' />";
    }
}

function print_logo(){
   $options = get_option('ud_options');	
	if ($file = $options['file']) {
        echo "<img src='{$file['url']}' width='100' height='100' class='logo' />";
    }
}

function ud_setting_filename() {
    echo '<input type="file" name="ud_filename" size="40" />';
}

function ud_options_validate($input) {
    $newinput = array();
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    if ($_FILES['ud_filename']) {
        $overrides = array('test_form' => false); 
        $file = wp_handle_upload($_FILES['ud_filename'], $overrides);
        $newinput['file'] = $file;
    }
    return $newinput;
}
?>