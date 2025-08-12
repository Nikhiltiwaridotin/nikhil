<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bhartiya Krishi Foundation - Empowering Farmers, Building India</title>
    <meta name="description" content="Bhartiya Krishi Foundation directly delivers government schemes to farmers, provides disaster relief, and ensures transparent donation management for agricultural development.">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="fas fa-seedling"></i>
                <span>Bhartiya Krishi Foundation</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#initiatives">Our Initiatives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#disaster-relief">Disaster Relief</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#transparency">Transparency</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#donate">Donate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#farmer-portal" target="_blank">Farmer Portal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- API call --> 

    <!-- index.html -->
<form id="registerForm">
  <input name="name" placeholder="Name" required />
  <input name="email" placeholder="Email" required />
  <input name="password" type="password" placeholder="Password" required />
  <button type="submit">Register</button>
</form>
<div id="msg"></div>

<script>
document.getElementById('registerForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const name = e.target.name.value;
  const email = e.target.email.value;
  const password = e.target.password.value;

  const res = await fetch('http://localhost:5000/api/auth/register', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ name, email, password })
  });

  const data = await res.json();
  document.getElementById('msg').innerText = data.msg || data.error || 'Error';
});
</script>

    <!-- login.html -->
<form id="loginForm">
  <input name="email" placeholder="Email" required />
  <input name="password" type="password" placeholder="Password" required />
  <button type="submit">Login</button>
</form>
<div id="msg"></div>

<script>
document.getElementById('loginForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const email = e.target.email.value;
  const password = e.target.password.value;

  const res = await fetch('http://localhost:5000/api/auth/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, password })
  });

  const data = await res.json();
  if (data.token) {
    document.getElementById('msg').innerText = 'Login Success!';
    // Token ko localStorage me bhi save kar sakte hain
    // localStorage.setItem('token', data.token);
  } else {
    document.getElementById('msg').innerText = data.msg || 'Login Failed';
  }
});
</script>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold text-white mb-4">Empowering Farmers, Building India</h1>
                        <p class="lead text-white mb-4">Bhartiya Krishi Foundation serves as a transparent mediator between government schemes and farmers, providing disaster relief, and ensuring direct benefit delivery to eliminate intermediaries.</p>
                        <div class="hero-buttons">
                            <a href="#about" class="btn btn-primary btn-lg me-3">Learn More</a>
                            <a href="#farmer-portal" class="btn btn-outline-light btn-lg" target="_blank">Farmer Portal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image">
                        <div class="image-placeholder">
                            <i class="fas fa-seedling"></i>
                            <p>High-quality image of farmers and agriculture</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">About Us</h2>
                    <p class="section-subtitle">Empowering farmers through transparent government scheme delivery and disaster relief</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="about-content">
                        <h3 class="text-primary mb-4">Our Mission</h3>
                        <p class="mb-4">To serve as a transparent mediator between government schemes and farmers, ensuring direct delivery of benefits while providing comprehensive disaster relief and support during farming crises.</p>
                        
                        <h3 class="text-primary mb-4">Our Vision</h3>
                        <p class="mb-4">A prosperous agricultural sector where every farmer has direct access to government benefits, disaster relief, and support systems, leading to sustainable farming practices and improved livelihoods.</p>
                        
                        <h3 class="text-primary mb-4">Our Role as Mediator</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="role-card">
                                    <i class="fas fa-handshake text-primary"></i>
                                    <h5>Government Partnership</h5>
                                    <p>Direct tie-ups with government departments for scheme delivery</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="role-card">
                                    <i class="fas fa-users text-primary"></i>
                                    <h5>Farmer Support</h5>
                                    <p>Comprehensive assistance for small and large farmers</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="role-card">
                                    <i class="fas fa-shield-alt text-primary"></i>
                                    <h5>Disaster Relief</h5>
                                    <p>Immediate support during fires, floods, and farming crises</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="role-card">
                                    <i class="fas fa-chart-line text-primary"></i>
                                    <h5>Transparency</h5>
                                    <p>Real-time tracking for government and farmer accountability</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="about-image">
                        <div class="image-placeholder">
                            <i class="fas fa-users"></i>
                            <p>Team photo or organization image</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Initiatives Section -->
    <section id="initiatives" class="section bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Initiatives</h2>
                    <p class="section-subtitle">Comprehensive support for farmers through government schemes and direct assistance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="initiative-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h3>PM-KISAN Direct Delivery</h3>
                        <p>Direct income support of ₹6,000 per year to eligible farmer families with transparent tracking</p>
                        <div class="stats">
                            <div class="stat">
                                <span class="stat-number" data-target="50000">0</span>
                                <span class="stat-label">Farmers Benefited</span>
                            </div>
                        </div>
                        <a href="#farmer-portal" class="btn btn-outline-primary mt-3" target="_blank">Apply Now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="initiative-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3>Free Seed Distribution</h3>
                        <p>Government-provided seeds delivered directly to farmers with quality assurance</p>
                        <div class="stats">
                            <div class="stat">
                                <span class="stat-number" data-target="75000">0</span>
                                <span class="stat-label">Seed Packets Distributed</span>
                            </div>
                        </div>
                        <a href="#farmer-portal" class="btn btn-outline-primary mt-3" target="_blank">Get Seeds</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="initiative-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-tractor"></i>
                        </div>
                        <h3>Equipment Support</h3>
                        <p>Modern farming equipment and tools provided through government schemes</p>
                        <div class="stats">
                            <div class="stat">
                                <span class="stat-number" data-target="25000">0</span>
                                <span class="stat-label">Equipment Distributed</span>
                            </div>
                        </div>
                        <a href="#farmer-portal" class="btn btn-outline-primary mt-3" target="_blank">Apply for Equipment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Disaster Relief Section -->
    <section id="disaster-relief" class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Disaster Relief & Crisis Support</h2>
                    <p class="section-subtitle">Immediate assistance for farmers during natural disasters and farming crises</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="disaster-card">
                        <div class="disaster-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <h4>Fire Relief Support</h4>
                        <p>Immediate financial assistance and support for farmers affected by crop fires</p>
                        <ul>
                            <li>Emergency financial aid</li>
                            <li>Crop insurance claim assistance</li>
                            <li>Rehabilitation support</li>
                        </ul>
                        <a href="#farmer-portal" class="btn btn-danger" target="_blank">Apply for Fire Relief</a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-left">
                    <div class="disaster-card">
                        <div class="disaster-icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <h4>Flood Relief Support</h4>
                        <p>Comprehensive assistance for farmers affected by floods and water damage</p>
                        <ul>
                            <li>Emergency rescue operations</li>
                            <li>Crop damage assessment</li>
                            <li>Reconstruction support</li>
                        </ul>
                        <a href="#farmer-portal" class="btn btn-info" target="_blank">Apply for Flood Relief</a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="disaster-card">
                        <div class="disaster-icon">
                            <i class="fas fa-bug"></i>
                        </div>
                        <h4>Pest & Disease Control</h4>
                        <p>Support for farmers facing pest infestations and crop diseases</p>
                        <ul>
                            <li>Expert consultation</li>
                            <li>Pesticide distribution</li>
                            <li>Prevention strategies</li>
                        </ul>
                        <a href="#farmer-portal" class="btn btn-warning" target="_blank">Get Pest Control Help</a>
                    </div>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-left">
                    <div class="disaster-card">
                        <div class="disaster-icon">
                            <i class="fas fa-cloud-sun"></i>
                        </div>
                        <h4>Weather Crisis Support</h4>
                        <p>Assistance during drought, excessive rain, and weather-related crop damage</p>
                        <ul>
                            <li>Weather monitoring</li>
                            <li>Alternative farming methods</li>
                            <li>Financial compensation</li>
                        </ul>
                        <a href="#farmer-portal" class="btn btn-secondary" target="_blank">Apply for Weather Relief</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transparency Dashboard Section -->
    <section id="transparency" class="section bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Transparency Dashboard</h2>
                    <p class="section-subtitle">Real-time tracking of government schemes, donations, and farmer benefits</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="transparency-card text-center">
                        <div class="transparency-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="counter" data-target="150000">0</h3>
                        <p>Total Farmers Registered</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="transparency-card text-center">
                        <div class="transparency-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h3 class="counter" data-target="450000000">0</h3>
                        <p>Total Benefits Distributed (₹)</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="transparency-card text-center">
                        <div class="transparency-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h3 class="counter" data-target="25000000">0</h3>
                        <p>Total Donations Received (₹)</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="transparency-card text-center">
                        <div class="transparency-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="counter" data-target="95">0</h3>
                        <p>Success Rate (%)</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="#farmer-portal" class="btn btn-primary btn-lg me-3" target="_blank">View Detailed Reports</a>
                    <a href="#farmer-portal" class="btn btn-outline-primary btn-lg" target="_blank">Track Your Application</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Section -->
    <section id="donate" class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Support Our Mission</h2>
                    <p class="section-subtitle">Your donation helps us provide better support to farmers and expand our reach</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="donation-card" data-aos="fade-up">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Why Donate?</h4>
                                <ul class="donation-benefits">
                                    <li><i class="fas fa-check text-success"></i> Direct farmer support</li>
                                    <li><i class="fas fa-check text-success"></i> Disaster relief operations</li>
                                    <li><i class="fas fa-check text-success"></i> Government scheme mediation</li>
                                    <li><i class="fas fa-check text-success"></i> Transparency and accountability</li>
                                    <li><i class="fas fa-check text-success"></i> Technology infrastructure</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Donation Options</h4>
                                <div class="donation-options">
                                    <button class="btn btn-outline-primary mb-2 w-100" data-amount="500">₹500 - Seed Support</button>
                                    <button class="btn btn-outline-primary mb-2 w-100" data-amount="1000">₹1,000 - Equipment Fund</button>
                                    <button class="btn btn-outline-primary mb-2 w-100" data-amount="2500">₹2,500 - Disaster Relief</button>
                                    <button class="btn btn-outline-primary mb-2 w-100" data-amount="5000">₹5,000 - Farmer Education</button>
                                    <button class="btn btn-outline-primary mb-2 w-100" data-amount="10000">₹10,000 - Technology Fund</button>
                                </div>
                                <div class="custom-amount mt-3">
                                    <label for="customAmount">Custom Amount (₹)</label>
                                    <input type="number" id="customAmount" class="form-control" placeholder="Enter amount">
                                </div>
                                <button class="btn btn-primary w-100 mt-3" onclick="processDonation()">Donate Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Farmer Portal Section -->
    <section id="farmer-portal" class="section bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Farmer Portal</h2>
                    <p class="section-subtitle">Access government schemes, track applications, and get support</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="portal-card text-center">
                        <div class="portal-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h4>Farmer Registration</h4>
                        <p>Register to access government schemes and track your applications</p>
                        <a href="farmer-portal.html#registration" class="btn btn-primary" target="_blank">Register Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="portal-card text-center">
                        <div class="portal-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h4>Farmer Login</h4>
                        <p>Access your account to manage applications and track benefits</p>
                        <a href="farmer-portal.html#login" class="btn btn-primary" target="_blank">Login</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="portal-card text-center">
                        <div class="portal-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Track Application</h4>
                        <p>Check the status of your government scheme applications</p>
                        <a href="farmer-portal.html#tracking" class="btn btn-primary" target="_blank">Track Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="portal-card text-center">
                        <div class="portal-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h4>Payment Gateway</h4>
                        <p>Secure payment processing for scheme applications and fees</p>
                        <a href="farmer-portal.html#payment" class="btn btn-primary" target="_blank">Make Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Contact Us</h2>
                    <p class="section-subtitle">Get in touch with us for any queries or support</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Address</h4>
                                <p>123 Agriculture Street<br>New Delhi, Delhi 110001<br>India</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Phone</h4>
                                <p>+91 11 2345 6789<br>+91 98765 43210</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email</h4>
                                <p>info@bhartiyakrishifoundation.org<br>support@bhartiyakrishifoundation.org</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Working Hours</h4>
                                <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="contact-form-container">
                        <form id="contactForm" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contactName">Name *</label>
                                        <input type="text" id="contactName" name="name" class="form-control" required>
                                        <span class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contactEmail">Email *</label>
                                        <input type="email" id="contactEmail" name="email" class="form-control" required>
                                        <span class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactSubject">Subject *</label>
                                <input type="text" id="contactSubject" name="subject" class="form-control" required>
                                <span class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Message *</label>
                                <textarea id="contactMessage" name="message" rows="5" class="form-control" required></textarea>
                                <span class="error-message"></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-full">
                                <span class="btn-text">Send Message</span>
                                <i class="fas fa-spinner fa-spin btn-loader" style="display: none;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <div class="footer-logo">
                            <i class="fas fa-seedling"></i>
                            <span>Bhartiya Krishi Foundation</span>
                        </div>
                        <p>Empowering farmers through transparent government scheme delivery, disaster relief, and direct benefit distribution.</p>
                        <div class="social-links">
                            <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#initiatives">Our Initiatives</a></li>
                            <li><a href="#disaster-relief">Disaster Relief</a></li>
                            <li><a href="#transparency">Transparency</a></li>
                            <li><a href="#donate">Donate</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h4>Government Schemes</h4>
                        <ul class="footer-links">
                            <li><a href="#farmer-portal" target="_blank">PM-KISAN</a></li>
                            <li><a href="#farmer-portal" target="_blank">PM-FME</a></li>
                            <li><a href="#farmer-portal" target="_blank">PMKSY</a></li>
                            <li><a href="#farmer-portal" target="_blank">PMFBY</a></li>
                            <li><a href="#farmer-portal" target="_blank">KCC</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h4>Support</h4>
                        <ul class="footer-links">
                            <li><a href="#farmer-portal" target="_blank">Help Center</a></li>
                            <li><a href="#farmer-portal" target="_blank">FAQs</a></li>
                            <li><a href="#farmer-portal" target="_blank">Documentation</a></li>
                            <li><a href="#farmer-portal" target="_blank">Privacy Policy</a></li>
                            <li><a href="#farmer-portal" target="_blank">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-12 text-center">
                        <p>&copy; 2024 Bhartiya Krishi Foundation. All rights reserved.</p>
                        <p>Registered under Section 8 of Companies Act, 2013</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Notification Container -->
    <div id="notificationContainer" class="notification-container"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>
