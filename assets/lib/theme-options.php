<?php

if (is_admin() && isset($_GET['activated'])){

    wp_redirect(admin_url("themes.php?page=the-funk"));
}

/** Step 2 (from text above). */
add_action( 'admin_menu', 'thefunk_menu' );

/** Step 1. */
function thefunk_menu() {
    add_theme_page( __( 'The Funk', 'the-funk' ), __( 'The Funk', 'the-funk' ), 'manage_options', 'the-funk', 'thefunk_page' );
}

/** Step 3. */
function thefunk_page() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'the-funk' ) );
	}
    
    wp_enqueue_style( 'thefunk-theme-options', get_template_directory_uri() . '/assets/lib/theme-options.css' );

    echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;"><div class="col-1-1"><h1 style="text-align: center;">';
    printf(__('The Funk - 2.1', 'the-funk' ));
    echo "</h1></div><p>";
    printf(__('The Funk is a responsive theme which allows you to customize theme layout and colors easily from the Theme Customizer. The Funk theme contains three layout and one footer settings with options to customize theme to your own personal styling. It’s an elegant design with a lot of flexibility.', 'the-funk' ));
    echo "</p></div>";
    
	echo '<div class="grid grid-pad senswp" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
	printf(__('What\'s new in this version? (IMPORTANT)', 'the-funk' )); 
	echo '</h1></div>';
		
    echo '<div class="col-1-1"><p>';
	printf(__('In this version of The Funk, I\'ve fixed the debugging issue with the theme. Unfortunately, all of your customized colors will disappear in this version, however, I promise it won\' happen in future. I had to fix this issue so we could keep adding new features to the theme. We hope you understand. :)' , 'the-funk' ));
	echo '</p></div></div>';
    
    echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="'.get_admin_url().'customize.php" target="_blank"><button class="pro">';
	printf(__( 'Start Customizing', 'the-funk' )); 
	echo '</button></a></div></div>'; 
    
}
?>