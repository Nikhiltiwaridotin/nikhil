# Bharti Krishi Foundation WordPress Theme

A custom WordPress theme designed specifically for Bharti Krishi Foundation - an NGO focused on agricultural development and farmer welfare. This theme features a clean, modern design with earthy tones that reflect the agricultural focus of the organization.

## 🌾 Features

### Design & Layout
- **Earthy Color Scheme**: Green and brown tones reflecting agriculture
- **Mobile-Responsive**: Fully responsive design that works on all devices
- **Clean & Modern**: Professional layout with excellent user experience
- **Fast Loading**: Optimized for performance and speed

### Content Sections
- **Hero Section**: Eye-catching introduction with dual call-to-action buttons
- **About Us**: Mission, Vision, and Role as Mediator with four key areas
- **Our Initiatives**: Showcase of government schemes with counters and action buttons
- **Disaster Relief**: Emergency support for fire, flood, pest control, and weather crises
- **Transparency Dashboard**: Live counters showing impact metrics
- **Support Our Mission**: Donation options with preset amounts and volunteer opportunities
- **Farmer Portal**: Registration, login, application tracking, and payment gateway
- **Contact Form**: Interactive contact form with validation

### WordPress Features
- **Custom Post Types**: Initiatives and Testimonials
- **Customizer Options**: Easy customization of contact info and social media
- **SEO Optimized**: Built with search engine optimization in mind
- **Security Enhanced**: Includes security best practices
- **Translation Ready**: Prepared for internationalization

## 📁 File Structure

```
bharti-krishi-foundation/
├── style.css              # Main stylesheet with theme information
├── index.php              # Main template file with all sections
├── header.php             # Header template with updated navigation
├── footer.php             # Footer template with comprehensive links
├── functions.php          # Theme functions and features
├── page.php               # Static page template
├── single.php             # Individual post template
├── archive.php            # Archive and category pages
├── search.php             # Search results template
├── 404.php                # 404 error page
├── js/
│   └── main.js            # JavaScript functionality with animations
├── images/                # Theme images (create this folder)
└── README.md              # This file
```

## 🚀 Installation

### Method 1: Upload via WordPress Admin
1. Download the theme files
2. Create a ZIP file containing all theme files
3. Go to WordPress Admin → Appearance → Themes
4. Click "Add New" → "Upload Theme"
5. Choose your ZIP file and click "Install Now"
6. Activate the theme

### Method 2: FTP Upload
1. Extract the theme files
2. Upload the `bharti-krishi-foundation` folder to `/wp-content/themes/`
3. Go to WordPress Admin → Appearance → Themes
4. Activate "Bharti Krishi Foundation"

## ⚙️ Configuration

### 1. Customizer Settings
After activation, go to **Appearance → Customize** to configure:

#### Contact Information
- Organization address
- Phone numbers
- Email addresses
- Working hours

#### Social Media Links
- Facebook
- Twitter
- Instagram
- LinkedIn
- YouTube

### 2. Menu Setup
1. Go to **Appearance → Menus**
2. Create a new menu
3. Add pages: Home, About Us, Our Initiatives, Disaster Relief, Transparency, Support Us, Farmer Portal, Contact
4. Assign to "Primary Menu" location

### 3. Custom Post Types
The theme includes two custom post types:

#### Initiatives
- Add new initiatives under **Initiatives** in the admin menu
- Include title, description, and featured image
- Displayed in the "Our Initiatives" section

#### Testimonials
- Add farmer testimonials under **Testimonials** in the admin menu
- Include testimonial text and author name
- Displayed in the "Success Stories" section

### 4. Images
Create an `images` folder in your theme directory and add:
- `hero-bg.jpg` - Hero section background image
- `farmers.jpg` - About section image
- `favicon.ico` - Website favicon

## 🎨 Customization

### Colors
The theme uses CSS custom properties for easy color customization:

```css
:root {
    --primary-green: #2d5a27;
    --secondary-green: #4a7c59;
    --accent-brown: #8b4513;
    --light-green: #e8f5e8;
    --dark-brown: #5d4037;
    --white: #ffffff;
    --gray: #666666;
    --light-gray: #f5f5f5;
}
```

### Content Updates
1. **Homepage Content**: Edit the main page in WordPress admin
2. **Contact Information**: Update via Customizer
3. **Social Media**: Update via Customizer
4. **Images**: Replace images in the `images` folder

## 📱 Mobile Responsiveness

The theme is fully responsive and includes:
- Mobile-first design approach
- Collapsible navigation menu
- Optimized touch targets
- Responsive images and grids
- Mobile-optimized forms

## 🔧 Technical Features

### Performance
- Optimized CSS and JavaScript
- Lazy loading for images
- Minimal HTTP requests
- Efficient code structure

### Security
- WordPress security best practices
- Input sanitization and validation
- Nonce verification for forms
- XSS protection

### SEO
- Semantic HTML structure
- Meta tags and descriptions
- Schema markup ready
- Clean URL structure

## 📞 Support

For support and customization requests:
- Email: [Your Support Email]
- Website: [Your Website URL]
- Documentation: [Your Documentation URL]

## 📄 License

This theme is created specifically for Bharti Krishi Trust. Please ensure you have proper licensing for any third-party assets used.

## 🔄 Updates

### Version 1.0
- Initial release
- Complete theme structure
- Mobile responsive design
- Custom post types
- Contact form functionality
- SEO optimization

## 📋 Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern web browser
- Recommended: SSL certificate for security

## 🎯 Recommended Plugins

While not required, these plugins enhance the theme:

1. **Yoast SEO** - Advanced SEO optimization
2. **Contact Form 7** - Enhanced contact forms
3. **WP Rocket** - Caching and performance
4. **Wordfence Security** - Enhanced security
5. **UpdraftPlus** - Backup solution

## 🌟 Credits

- **Design**: Custom design for Bharti Krishi Trust
- **Development**: Custom WordPress theme development
- **Icons**: Emoji icons for visual elements
- **Fonts**: System fonts for optimal performance

---

**Bharti Krishi Trust** - Empowering farmers through direct delivery of government schemes and agricultural development initiatives.
