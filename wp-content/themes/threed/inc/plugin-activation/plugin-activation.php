<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once trailingslashit( get_template_directory()).'inc/plugin-activation/tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'threed_plugin_activation' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function threed_plugin_activation() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
            'name'     => esc_html__('Woo Commerce','threed'),
            'slug'     => 'woocommerce',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        array(
            'name'            => 'Threed VC Addons', // The plugin name
            'slug'            => 'threed-vc-addons', // The plugin slug (typically the folder name)
            'source'            => get_template_directory().'/inc/plugin-activation/plugins/threed-vc-addons.zip', // The plugin source
            'required'            => true, // If false, the plugin is only 'recommended' instead of required
            'force_activation'        => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'        => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
            'name'            => 'Threed Custom Post Type', // The plugin name
            'slug'            => 'threed-cpt', // The plugin slug (typically the folder name)
            'source'            => get_template_directory().'/inc/plugin-activation/plugins/threed-cpt.zip', // The plugin source
            'required'            => true, // If false, the plugin is only 'recommended' instead of required
            'force_activation'        => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'        => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'            => 'Threed CMB2 Fontawesome Icon Picker', // The plugin name
            'slug'            => 'threed_cmb2_fw_icon_picker', // The plugin slug (typically the folder name)
            'source'            => get_template_directory().'/inc/plugin-activation/plugins/threed_cmb2_fw_icon_picker.zip', // The plugin source
            'required'            => true, // If false, the plugin is only 'recommended' instead of required
            'force_activation'        => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'        => '', // If set, overrides default API URL and points to an external URL
        ),

		array(
			'name'        => 'Js Composer',
			'slug'        => 'js-composer',
			'source'             => get_template_directory().'/inc/plugin-activation/plugins/js_composer.zip',
			'force_activation'        => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'required'           => true
		),
		array(
			'name'        => 'Ultimate VC Addon',
			'slug'        => 'ultimate_vc',
			'source'      => get_template_directory().'/inc/plugin-activation/plugins/ultimate_vc.zip',
			'force_activation'        => false,
			'required'    => true
		),
		array(
			'name'        => 'Slider Revolution Responsive WordPress Plugin',
			'slug'        => 'slider-revolution-responsive-wordpress-plugin',
			'source'      => get_template_directory().'/inc/plugin-activation/plugins/revslider.zip',
			'required'    => true
		),
		array(
            'name'            => 'Threed Widget Plugin', // The plugin name
            'slug'            => 'threed-widgets', // The plugin slug (typically the folder name)
            'source'            => get_template_directory().'/inc/plugin-activation/plugins/threed-widgets.zip', // The plugin source
            'required'            => true, // If false, the plugin is only 'recommended' instead of required
            'force_activation'        => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'        => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
	        'name' => 'Envato WordPress Toolkit',
	        'slug' => 'envato-wordpress-toolkit-master',
	        'source' => get_template_directory().'/inc/plugin-activation/plugins/envato-wordpress-toolkit-master.zip',
	        'required' => true,
	        'force_activation' => false,
	        'force_deactivation' => false,
	        'external_url' => '',
	    ),

		array(
			'name'        => 'Contact Form 7',
			'slug'        => 'contact-form-7'
		),

		// For Wordpress Developer
		array(
			'name'        => 'WordPress Importer',
			'slug'        => 'wordpress-importer'
		),




	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'threed' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'threed' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'threed' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'threed' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'threed'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'threed'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'threed'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'threed'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'threed'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'threed' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'threed' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'threed' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'threed' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'threed' ),  // %1$s = plugin name(s).
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'threed' ), // %s = dashboard link.
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'threed' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),

	);

	tgmpa( $plugins, $config );
}
