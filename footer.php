    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#initiatives">Our Initiatives</a></li>
                        <li><a href="#disaster-relief">Disaster Relief</a></li>
                        <li><a href="#transparency">Transparency</a></li>
                        <li><a href="#support">Support Us</a></li>
                        <li><a href="#farmer-portal">Farmer Portal</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Government Schemes</h3>
                    <ul>
                        <li><a href="#initiatives">PM-KISAN Scheme</a></li>
                        <li><a href="#initiatives">PM Fasal Bima Yojana</a></li>
                        <li><a href="#initiatives">Soil Health Card</a></li>
                        <li><a href="#initiatives">PMKSY</a></li>
                        <li><a href="#initiatives">Agricultural Infrastructure Fund</a></li>
                        <li><a href="#initiatives">PM Kisan Maan Dhan</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Support & Help</h3>
                    <ul>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#disaster-relief">Emergency Support</a></li>
                        <li><a href="#farmer-portal">Farmer Registration</a></li>
                        <li><a href="#farmer-portal">Track Application</a></li>
                        <li><a href="#support">Make a Donation</a></li>
                        <li><a href="#support">Volunteer</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p>📍 Bharti Krishi Foundation<br>
                    [Your Address Here]<br>
                    [City, State - PIN Code]</p>
                    <p>📞 +91 [Your Phone Number]</p>
                    <p>✉️ info@bhartikrishifoundation.org</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Bharti Krishi Foundation. All rights reserved.</p>
                <p>Empowering Farmers, Building Communities, Transforming Agriculture</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.addEventListener('DOMContentLoaded', function() {
            const anchorLinks = document.querySelectorAll('a[href^="#"]');
            anchorLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        const headerHeight = document.querySelector('.site-header').offsetHeight;
                        const targetPosition = targetElement.offsetTop - headerHeight - 20;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>
