<?php
/**
 * Bharti Krishi Foundation Theme Functions
 * 
 * @package Bharti_Krishi_Trust
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function bharti_krishi_trust_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('style.css');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bharti-krishi-trust'),
        'footer' => __('Footer Menu', 'bharti-krishi-trust'),
    ));
}
add_action('after_setup_theme', 'bharti_krishi_trust_setup');

/**
 * Enqueue scripts and styles
 */
function bharti_krishi_trust_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('bharti-krishi-trust-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts (optional - using system fonts for now)
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
    
    // Enqueue main JavaScript file
    wp_enqueue_script('bharti-krishi-trust-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('bharti_krishi_trust-script', 'bharti_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('bharti_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'bharti_krishi_trust_scripts');

/**
 * Register widget areas
 */
function bharti_krishi_trust_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'bharti-krishi-trust'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'bharti-krishi-trust'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'bharti-krishi-trust'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here.', 'bharti-krishi-trust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bharti_krishi_trust_widgets_init');

/**
 * Custom excerpt length
 */
function bharti_krishi_trust_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'bharti_krishi_trust_excerpt_length');

/**
 * Custom excerpt more
 */
function bharti_krishi_trust_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'bharti_krishi_trust_excerpt_more');

/**
 * Add custom image sizes
 */
function bharti_krishi_trust_image_sizes() {
    add_image_size('hero-image', 1200, 600, true);
    add_image_size('about-image', 600, 400, true);
    add_image_size('initiative-thumb', 400, 300, true);
}
add_action('after_setup_theme', 'bharti_krishi_trust_image_sizes');

/**
 * Contact form handler
 */
function bharti_krishi_trust_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'bharti_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill in all required fields.');
    }
    
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
    }
    
    // Email headers
    $to = get_option('admin_email');
    $subject_line = 'New Contact Form Submission: ' . $subject;
    
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message";
    
    $headers = array(
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
        'Content-Type: text/plain; charset=UTF-8'
    );
    
    // Send email
    $sent = wp_mail($to, $subject_line, $body, $headers);
    
    if ($sent) {
        wp_send_json_success('Thank you for your message. We will get back to you soon!');
    } else {
        wp_send_json_error('Sorry, there was an error sending your message. Please try again.');
    }
}
add_action('wp_ajax_contact_form', 'bharti_krishi_trust_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'bharti_krishi_trust_contact_form');

/**
 * Add customizer options
 */
function bharti_krishi_trust_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title' => __('Contact Information', 'bharti-krishi-trust'),
        'priority' => 30,
    ));
    
    // Address
    $wp_customize->add_setting('contact_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'bharti-krishi-trust'),
        'section' => 'contact_info',
        'type' => 'textarea',
    ));
    
    // Phone
    $wp_customize->add_setting('contact_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone Number', 'bharti-krishi-trust'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('contact_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email Address', 'bharti-krishi-trust'),
        'section' => 'contact_info',
        'type' => 'email',
    ));
    
    // Social Media Section
    $wp_customize->add_section('social_media', array(
        'title' => __('Social Media Links', 'bharti-krishi-trust'),
        'priority' => 35,
    ));
    
    $social_platforms = array('facebook', 'twitter', 'instagram', 'linkedin', 'youtube');
    
    foreach ($social_platforms as $platform) {
        $wp_customize->add_setting('social_' . $platform, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control('social_' . $platform, array(
            'label' => ucfirst($platform) . ' URL',
            'section' => 'social_media',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'bharti_krishi_trust_customize_register');

/**
 * Security enhancements
 */
function bharti_krishi_trust_security() {
    // Remove WordPress version from head
    remove_action('wp_head', 'wp_generator');
    
    // Disable XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    
    // Hide login errors
    add_filter('login_errors', function() {
        return 'Something went wrong!';
    });
}
add_action('init', 'bharti_krishi_trust_security');

/**
 * Add custom post types for initiatives and testimonials
 */
function bharti_krishi_trust_post_types() {
    // Initiatives Post Type
    register_post_type('initiatives', array(
        'labels' => array(
            'name' => 'Initiatives',
            'singular_name' => 'Initiative',
            'add_new' => 'Add New Initiative',
            'add_new_item' => 'Add New Initiative',
            'edit_item' => 'Edit Initiative',
            'new_item' => 'New Initiative',
            'view_item' => 'View Initiative',
            'search_items' => 'Search Initiatives',
            'not_found' => 'No initiatives found',
            'not_found_in_trash' => 'No initiatives found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-site',
        'rewrite' => array('slug' => 'initiatives')
    ));
    
    // Testimonials Post Type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Add New Testimonial',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found',
            'not_found_in_trash' => 'No testimonials found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'testimonials')
    ));
}
add_action('init', 'bharti_krishi_trust_post_types');

/**
 * Theme activation hook
 */
function bharti_krishi_trust_activation() {
    // Flush rewrite rules for custom post types
    flush_rewrite_rules();
    
    // Set default options
    if (!get_option('contact_address')) {
        update_option('contact_address', 'Bharti Krishi Trust\n[Your Address Here]\n[City, State - PIN Code]');
    }
    
    if (!get_option('contact_phone')) {
        update_option('contact_phone', '+91 [Your Phone Number]');
    }
    
    if (!get_option('contact_email')) {
        update_option('contact_email', 'info@bhartikrishitrust.org');
    }
}
register_activation_hook(__FILE__, 'bharti_krishi_trust_activation');
