<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    
    <!-- WordPress Head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Header -->
    <header class="site-header">
        <div class="header-container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                Bharti Krishi Foundation
            </a>
            
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                ☰
            </button>
            
            <nav class="main-navigation" id="primary-menu">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#initiatives">Our Initiatives</a></li>
                    <li><a href="#disaster-relief">Disaster Relief</a></li>
                    <li><a href="#transparency">Transparency</a></li>
                    <li><a href="#support">Support Us</a></li>
                    <li><a href="#farmer-portal">Farmer Portal</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNavigation = document.querySelector('.main-navigation');
            
            if (menuToggle && mainNavigation) {
                menuToggle.addEventListener('click', function() {
                    mainNavigation.classList.toggle('active');
                    const isExpanded = mainNavigation.classList.contains('active');
                    menuToggle.setAttribute('aria-expanded', isExpanded);
                });
                
                // Close menu when clicking on a link
                const navLinks = mainNavigation.querySelectorAll('a');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mainNavigation.classList.remove('active');
                        menuToggle.setAttribute('aria-expanded', 'false');
                    });
                });
            }
        });
    </script>
