<?php

/**
 * Function which lists the plugins to be activated by the TGM Plugin activation plugin
 */
function customwebsite_required_plugins() {
	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => __('Unattach', 'customwebsite'), // The plugin name.
			'slug'               => 'unattach', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'               => __('Under Construction', 'customwebsite'),
			'slug'               => 'underconstruction',
			'required'           => false,
		),
		array(
			'name'               => __('Google Analyticator', 'customwebsite'),
			'slug'               => 'google-analyticator',
			'required'           => false,
		),
		array(
			'name'               => __('Google Sitemap Generator', 'customwebsite'),
			'slug'               => 'google-sitemap-generator',
			'required'           => false,
		),
		array(
			'name'               => __('Auto Thickbox Plus', 'customwebiste'),
			'slug'               => 'auto-thickbox-plus',
			'required'           => false,
		),
		array(
			'name'               => __('IWP Client', 'customwebsite'),
			'slug'               => 'iwp-client',
			'required'           => false,
		),
		array(
			'name'               => __('Custom Permalinks', 'customwebsite'),
			'slug'               => 'custom-permalinks',
			'required'           => false,
		),
		array(
			'name'               => __('TinyMCE Advanced', 'customwebsite'),
			'slug'               => 'tinymce-advanced',
			'required'           => false,
		),
		array(
			'name'               => __('TinyMCE Widget', 'customwebsite'),
			'slug'               => 'black-studio-tinymce-widget',
			'required'           => false,
		),
		array(
			'name'               => __('Q-Translate Slug', 'customwebsite'),
			'slug'               => 'qtranslate-slug',
			'required'           => false,
		),
		array(
			'name'               => __('Q-Translate', 'customwebsite'),
			'slug'               => 'qtranslate',
			'required'           => false,
			'source'			 => 'https://github.com/qTranslate-Team/qtranslate-x.git',
		),
		array(
			'name'               => __('Formidable Forms Pro', 'customwebsite'),
			'slug'               => 'formidable',
			'source'			 => get_template_directory_uri() . '/plugins/formidable-1.07.09.zip',
			'required'           => false,
		),
		array(
			'name'               => __('Formidable Forms Mailchimp', 'customwebsite'),
			'slug'               => 'formidable-mailchimp',
			'source'			 => get_template_directory_uri() . '/plugins/formidable-mailchimp-1.02.01.zip',
			'required'           => false,
		),
		array(
			'name'               => __('Formidable Forms Paypal', 'customwebsite'),
			'slug'               => 'formidable-paypal',
			'source'			 => get_template_directory_uri() . '/plugins/formidable-paypal-2.03.02.zip',
			'required'           => false,
		),
		array(
			'name'               => __('Formidable Forms Registration', 'customwebsite'),
			'slug'               => 'formidable-registration',
			'source'			 => get_template_directory_uri() . '/plugins/formidable-registration-1.10.zip',
			'required'           => false,
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
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'customwebsite_required_plugins'); 
