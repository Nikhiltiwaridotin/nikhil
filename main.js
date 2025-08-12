// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initializeNavigation();
    initializeTabs();
    initializeForms();
    initializeScrollEffects();
    initializeAnimations();
    initializeNotificationSystem();
    initializeAOS();
    initializeDonationSystem();
    initializeTransparencyDashboard();
});

// Initialize AOS Animations
function initializeAOS() {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
}

// Navigation System
function initializeNavigation() {
    const hamburger = document.querySelector('.navbar-toggler');
    const navMenu = document.querySelector('.navbar-collapse');
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-link');

    // Mobile menu toggle
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('show');
        });

        // Close mobile menu when clicking on a link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('show');
            });
        });
    }

    // Navbar scroll effect
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // Smooth scrolling for anchor links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 70; // Account for fixed navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Active navigation highlighting
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPos = window.scrollY + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            const navLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                navLinks.forEach(link => link.classList.remove('active'));
                if (navLink) navLink.classList.add('active');
            }
        });
    });
}

// Tab System
function initializeTabs() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to clicked button and corresponding pane
            this.classList.add('active');
            const targetPane = document.getElementById(targetTab);
            if (targetPane) {
                targetPane.classList.add('active');
            }
        });
    });
}

// Form System with Robust Validation
function initializeForms() {
    // Farmer Registration Form
    const farmerRegistrationForm = document.getElementById('farmerRegistrationForm');
    if (farmerRegistrationForm) {
        farmerRegistrationForm.addEventListener('submit', handleFarmerRegistration);
        initializeFormValidation(farmerRegistrationForm);
    }

    // Farmer Login Form
    const farmerLoginForm = document.getElementById('farmerLoginForm');
    if (farmerLoginForm) {
        farmerLoginForm.addEventListener('submit', handleFarmerLogin);
        initializeFormValidation(farmerLoginForm);
    }

    // Tracking Form
    const trackingForm = document.getElementById('trackingForm');
    if (trackingForm) {
        trackingForm.addEventListener('submit', handleTracking);
        initializeFormValidation(trackingForm);
    }

    // Payment Form
    const paymentForm = document.getElementById('paymentForm');
    if (paymentForm) {
        paymentForm.addEventListener('submit', handlePayment);
        initializeFormValidation(paymentForm);
        initializePaymentFormHelpers();
    }

    // Contact Form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
        initializeFormValidation(contactForm);
    }
}

// Form Validation System
function initializeFormValidation(form) {
    const inputs = form.querySelectorAll('input, select, textarea');
    
    inputs.forEach(input => {
        // Real-time validation
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('input', () => clearFieldError(input));
        
        // Special handling for specific field types
        if (input.type === 'tel') {
            input.addEventListener('input', formatPhoneNumber);
        }
        if (input.name === 'aadhar') {
            input.addEventListener('input', formatAadharNumber);
        }
        if (input.name === 'cardNumber') {
            input.addEventListener('input', formatCardNumber);
        }
        if (input.name === 'expiry') {
            input.addEventListener('input', formatExpiryDate);
        }
        if (input.name === 'cvv') {
            input.addEventListener('input', formatCVV);
        }
    });
}

// Field Validation Functions
function validateField(field) {
    const value = field.value.trim();
    const fieldName = field.name;
    let isValid = true;
    let errorMessage = '';

    // Clear previous error
    clearFieldError(field);

    // Required field validation
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'This field is required';
    }

    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address';
        }
    }

    // Phone validation
    if (field.type === 'tel' && value) {
        const phoneRegex = /^[6-9]\d{9}$/;
        if (!phoneRegex.test(value.replace(/\D/g, ''))) {
            isValid = false;
            errorMessage = 'Please enter a valid 10-digit phone number';
        }
    }

    // Aadhar validation
    if (fieldName === 'aadhar' && value) {
        const aadharRegex = /^\d{12}$/;
        if (!aadharRegex.test(value.replace(/\D/g, ''))) {
            isValid = false;
            errorMessage = 'Please enter a valid 12-digit Aadhar number';
        }
    }

    // Password validation
    if (fieldName === 'password' && value) {
        if (value.length < 8) {
            isValid = false;
            errorMessage = 'Password must be at least 8 characters long';
        } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(value)) {
            isValid = false;
            errorMessage = 'Password must contain uppercase, lowercase, and number';
        }
    }

    // Confirm password validation
    if (fieldName === 'confirmPassword' && value) {
        const passwordField = field.form.querySelector('[name="password"]');
        if (passwordField && value !== passwordField.value) {
            isValid = false;
            errorMessage = 'Passwords do not match';
        }
    }

    // Card number validation
    if (fieldName === 'cardNumber' && value) {
        const cardNumber = value.replace(/\D/g, '');
        if (cardNumber.length < 13 || cardNumber.length > 19) {
            isValid = false;
            errorMessage = 'Please enter a valid card number';
        } else if (!luhnCheck(cardNumber)) {
            isValid = false;
            errorMessage = 'Invalid card number';
        }
    }

    // Expiry date validation
    if (fieldName === 'expiry' && value) {
        const [month, year] = value.split('/');
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear() % 100;
        const currentMonth = currentDate.getMonth() + 1;
        
        if (parseInt(month) < 1 || parseInt(month) > 12) {
            isValid = false;
            errorMessage = 'Invalid month';
        } else if (parseInt(year) < currentYear || 
                  (parseInt(year) === currentYear && parseInt(month) < currentMonth)) {
            isValid = false;
            errorMessage = 'Card has expired';
        }
    }

    // CVV validation
    if (fieldName === 'cvv' && value) {
        const cvv = value.replace(/\D/g, '');
        if (cvv.length < 3 || cvv.length > 4) {
            isValid = false;
            errorMessage = 'Please enter a valid CVV';
        }
    }

    // Amount validation
    if (fieldName === 'amount' && value) {
        const amount = parseFloat(value);
        if (isNaN(amount) || amount <= 0) {
            isValid = false;
            errorMessage = 'Please enter a valid amount';
        }
    }

    // Show error if validation failed
    if (!isValid) {
        showFieldError(field, errorMessage);
    }

    return isValid;
}

// Luhn Algorithm for card validation
function luhnCheck(cardNumber) {
    let sum = 0;
    let isEven = false;
    
    for (let i = cardNumber.length - 1; i >= 0; i--) {
        let digit = parseInt(cardNumber[i]);
        
        if (isEven) {
            digit *= 2;
            if (digit > 9) {
                digit -= 9;
            }
        }
        
        sum += digit;
        isEven = !isEven;
    }
    
    return sum % 10 === 0;
}

// Field Error Handling
function showFieldError(field, message) {
    field.classList.add('error');
    const errorSpan = field.parentNode.querySelector('.error-message');
    if (errorSpan) {
        errorSpan.textContent = message;
    }
}

function clearFieldError(field) {
    field.classList.remove('error');
    const errorSpan = field.parentNode.querySelector('.error-message');
    if (errorSpan) {
        errorSpan.textContent = '';
    }
}

// Input Formatting Functions
function formatPhoneNumber(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 10) value = value.slice(0, 10);
    e.target.value = value;
}

function formatAadharNumber(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 12) value = value.slice(0, 12);
    e.target.value = value;
}

function formatCardNumber(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 19) value = value.slice(0, 19);
    value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
    e.target.value = value;
}

function formatExpiryDate(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 4) value = value.slice(0, 4);
    if (value.length >= 2) {
        value = value.slice(0, 2) + '/' + value.slice(2);
    }
    e.target.value = value;
}

function formatCVV(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 4) value = value.slice(0, 4);
    e.target.value = value;
}

// Payment Form Helpers
function initializePaymentFormHelpers() {
    const paymentType = document.getElementById('paymentType');
    const amountField = document.getElementById('paymentAmount');
    
    if (paymentType && amountField) {
        paymentType.addEventListener('change', function() {
            const type = this.value;
            let defaultAmount = '';
            
            switch(type) {
                case 'application_fee':
                    defaultAmount = '100';
                    break;
                case 'processing_fee':
                    defaultAmount = '50';
                    break;
                case 'verification_fee':
                    defaultAmount = '75';
                    break;
                case 'donation':
                    defaultAmount = '500';
                    break;
            }
            
            if (defaultAmount) {
                amountField.value = defaultAmount;
            }
        });
    }
}

// Donation System
function initializeDonationSystem() {
    const donationButtons = document.querySelectorAll('.donation-options .btn');
    const customAmountInput = document.getElementById('customAmount');
    
    donationButtons.forEach(button => {
        button.addEventListener('click', function() {
            const amount = this.getAttribute('data-amount');
            if (customAmountInput) {
                customAmountInput.value = amount;
            }
            
            // Remove active class from all buttons
            donationButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
        });
    });
}

// Transparency Dashboard
function initializeTransparencyDashboard() {
    const counters = document.querySelectorAll('.counter');
    
    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.getAttribute('data-target'));
                animateCounter(target, 0, finalValue, 2000);
                counterObserver.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}

// Form Submission Handlers
async function handleFarmerRegistration(e) {
    e.preventDefault();
    
    if (!validateForm(e.target)) {
        return;
    }
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.querySelector('.btn-text').textContent;
    
    try {
        setButtonLoading(submitBtn, true);
        
        // Simulate API call
        await simulateApiCall(2000);
        
        showNotification('Registration successful! Please check your email for verification.', 'success');
        e.target.reset();
        
    } catch (error) {
        showNotification('Registration failed. Please try again.', 'error');
    } finally {
        setButtonLoading(submitBtn, false, originalText);
    }
}

async function handleFarmerLogin(e) {
    e.preventDefault();
    
    if (!validateForm(e.target)) {
        return;
    }
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.querySelector('.btn-text').textContent;
    
    try {
        setButtonLoading(submitBtn, true);
        
        // Simulate API call
        await simulateApiCall(1500);
        
        showNotification('Login successful! Redirecting to dashboard...', 'success');
        
        // Simulate redirect
        setTimeout(() => {
            showNotification('Welcome to your farmer dashboard!', 'info');
        }, 2000);
        
    } catch (error) {
        showNotification('Login failed. Please check your credentials.', 'error');
    } finally {
        setButtonLoading(submitBtn, false, originalText);
    }
}

async function handleTracking(e) {
    e.preventDefault();
    
    if (!validateForm(e.target)) {
        return;
    }
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.querySelector('.btn-text').textContent;
    const trackingResults = document.getElementById('trackingResults');
    
    try {
        setButtonLoading(submitBtn, true);
        
        // Simulate API call
        await simulateApiCall(1000);
        
        // Show tracking results
        if (trackingResults) {
            trackingResults.style.display = 'block';
            trackingResults.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        
        showNotification('Application status retrieved successfully!', 'success');
        
    } catch (error) {
        showNotification('Unable to retrieve application status. Please try again.', 'error');
    } finally {
        setButtonLoading(submitBtn, false, originalText);
    }
}

async function handlePayment(e) {
    e.preventDefault();
    
    if (!validateForm(e.target)) {
        return;
    }
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.querySelector('.btn-text').textContent;
    
    try {
        setButtonLoading(submitBtn, true);
        
        // Simulate payment processing
        await simulateApiCall(3000);
        
        showNotification('Payment processed successfully! Transaction ID: TXN' + Math.random().toString(36).substr(2, 9).toUpperCase(), 'success');
        e.target.reset();
        
    } catch (error) {
        showNotification('Payment failed. Please check your card details and try again.', 'error');
    } finally {
        setButtonLoading(submitBtn, false, originalText);
    }
}

async function handleContactForm(e) {
    e.preventDefault();
    
    if (!validateForm(e.target)) {
        return;
    }
    
    const submitBtn = e.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.querySelector('.btn-text').textContent;
    
    try {
        setButtonLoading(submitBtn, true);
        
        // Simulate API call
        await simulateApiCall(1500);
        
        showNotification('Thank you for your message! We will get back to you soon.', 'success');
        e.target.reset();
        
    } catch (error) {
        showNotification('Failed to send message. Please try again.', 'error');
    } finally {
        setButtonLoading(submitBtn, false, originalText);
    }
}

// Donation Processing
function processDonation() {
    const customAmount = document.getElementById('customAmount');
    const amount = customAmount ? parseFloat(customAmount.value) : 0;
    
    if (!amount || amount <= 0) {
        showNotification('Please enter a valid donation amount.', 'error');
        return;
    }
    
    showNotification(`Thank you for your donation of ₹${amount}! Redirecting to payment gateway...`, 'success');
    
    // Simulate payment gateway redirect
    setTimeout(() => {
        showNotification('Payment gateway opened in new window.', 'info');
    }, 2000);
}

// Form Validation Helper
function validateForm(form) {
    const inputs = form.querySelectorAll('input, select, textarea');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });
    
    return isValid;
}

// Button Loading State
function setButtonLoading(button, loading, originalText = '') {
    const btnText = button.querySelector('.btn-text');
    const btnLoader = button.querySelector('.btn-loader');
    
    if (loading) {
        button.disabled = true;
        if (btnText) btnText.style.display = 'none';
        if (btnLoader) btnLoader.style.display = 'inline-block';
    } else {
        button.disabled = false;
        if (btnText) {
            btnText.style.display = 'inline';
            if (originalText) btnText.textContent = originalText;
        }
        if (btnLoader) btnLoader.style.display = 'none';
    }
}

// API Simulation
function simulateApiCall(delay) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // Simulate 10% failure rate
            if (Math.random() < 0.1) {
                reject(new Error('Network error'));
            } else {
                resolve();
            }
        }, delay);
    });
}

// Scroll Effects
function initializeScrollEffects() {
    // Parallax effect for hero section
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.initiative-card, .disaster-card, .transparency-card, .portal-card, .contact-item');
    animatedElements.forEach(el => {
        el.classList.add('fade-in');
        observer.observe(el);
    });
}

// Animation System
function initializeAnimations() {
    // Counter animation for statistics
    const statNumbers = document.querySelectorAll('.stat-number');
    
    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.getAttribute('data-target'));
                animateCounter(target, 0, finalValue, 2000);
                counterObserver.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => {
        counterObserver.observe(stat);
    });
}

function animateCounter(element, start, end, duration) {
    const startTime = performance.now();
    
    function updateCounter(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        const current = Math.floor(start + (end - start) * easeOutQuart(progress));
        element.textContent = current.toLocaleString();
        
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        }
    }
    
    requestAnimationFrame(updateCounter);
}

function easeOutQuart(t) {
    return 1 - Math.pow(1 - t, 4);
}

// Notification System
function initializeNotificationSystem() {
    // Create notification container if it doesn't exist
    if (!document.getElementById('notificationContainer')) {
        const container = document.createElement('div');
        container.id = 'notificationContainer';
        container.className = 'notification-container';
        document.body.appendChild(container);
    }
}

function showNotification(message, type = 'info', duration = 5000) {
    const container = document.getElementById('notificationContainer');
    if (!container) return;

    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    
    const icons = {
        success: 'fas fa-check-circle',
        error: 'fas fa-exclamation-circle',
        warning: 'fas fa-exclamation-triangle',
        info: 'fas fa-info-circle'
    };

    const titles = {
        success: 'Success',
        error: 'Error',
        warning: 'Warning',
        info: 'Information'
    };

    notification.innerHTML = `
        <div class="notification-header">
            <span class="notification-title">
                <i class="${icons[type]}"></i>
                ${titles[type]}
            </span>
            <button class="notification-close" onclick="this.parentElement.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="notification-message">${message}</div>
    `;

    container.appendChild(notification);

    // Auto remove after duration
    setTimeout(() => {
        if (notification.parentElement) {
            notification.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 300);
        }
    }, duration);

    // Remove notification when clicked
    notification.addEventListener('click', function(e) {
        if (e.target.classList.contains('notification-close')) {
            this.remove();
        }
    });
}

// Support Functions
function startLiveChat() {
    showNotification('Live chat feature will be available soon!', 'info');
}

function showFAQs() {
    showNotification('FAQ section will be available soon!', 'info');
}

// Error Handling and Protection
window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
    showNotification('An unexpected error occurred. Please refresh the page.', 'error');
});

window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled Promise Rejection:', e.reason);
    showNotification('A network error occurred. Please check your connection.', 'error');
});

// Performance Optimization
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Debounced scroll handlers
const debouncedScrollHandler = debounce(function() {
    // Handle scroll-based effects
}, 16);

window.addEventListener('scroll', debouncedScrollHandler);

// Service Worker Registration (for PWA capabilities)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js')
            .then(function(registration) {
                console.log('ServiceWorker registration successful');
            })
            .catch(function(err) {
                console.log('ServiceWorker registration failed');
            });
    });
}

// Accessibility Enhancements
document.addEventListener('keydown', function(e) {
    // Escape key to close notifications
    if (e.key === 'Escape') {
        const notifications = document.querySelectorAll('.notification');
        notifications.forEach(notification => notification.remove());
    }
    
    // Tab key navigation for custom elements
    if (e.key === 'Tab') {
        const focusableElements = document.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];
        
        if (e.shiftKey && document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
        } else if (!e.shiftKey && document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
        }
    }
});

// Export functions for global access
window.showNotification = showNotification;
window.validateField = validateField;
window.processDonation = processDonation;
window.startLiveChat = startLiveChat;
window.showFAQs = showFAQs;