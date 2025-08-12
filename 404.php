<?php get_header(); ?>

<main class="main-content">
    <div class="error-404">
        <div class="error-content">
            <div class="error-icon">🌾</div>
            <h1 class="error-title">404 - Page Not Found</h1>
            <p class="error-description">
                Oops! It looks like this page has wandered off into the fields. 
                The content you're looking for might have been moved, deleted, or never existed.
            </p>
            
            <div class="error-actions">
                <a href="<?php echo home_url(); ?>" class="cta-button">Back to Home</a>
                <a href="<?php echo home_url(); ?>#contact" class="secondary-button">Contact Us</a>
            </div>
            
            <div class="error-suggestions">
                <h3>Looking for something specific?</h3>
                <div class="suggestions-grid">
                    <div class="suggestion-card">
                        <div class="suggestion-icon">📋</div>
                        <h4>Our Initiatives</h4>
                        <p>Learn about the government schemes we help deliver to farmers.</p>
                        <a href="<?php echo home_url(); ?>#initiatives">View Initiatives</a>
                    </div>
                    
                    <div class="suggestion-card">
                        <div class="suggestion-icon">🤝</div>
                        <h4>Get Involved</h4>
                        <p>Find out how you can support our mission to empower farmers.</p>
                        <a href="<?php echo home_url(); ?>#get-involved">Get Involved</a>
                    </div>
                    
                    <div class="suggestion-card">
                        <div class="suggestion-icon">📞</div>
                        <h4>Contact Us</h4>
                        <p>Get in touch with our team for any questions or support.</p>
                        <a href="<?php echo home_url(); ?>#contact">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.error-404 {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
}

.error-content {
    text-align: center;
    max-width: 800px;
    background: var(--white);
    padding: 60px 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.error-icon {
    font-size: 5rem;
    margin-bottom: 20px;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.error-title {
    font-size: 3rem;
    color: var(--primary-green);
    margin-bottom: 20px;
    font-weight: bold;
}

.error-description {
    font-size: 1.2rem;
    color: var(--gray);
    line-height: 1.6;
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.error-actions {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.secondary-button {
    display: inline-block;
    background-color: transparent;
    color: var(--primary-green);
    padding: 15px 30px;
    text-decoration: none;
    border: 2px solid var(--primary-green);
    border-radius: 5px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.secondary-button:hover {
    background-color: var(--primary-green);
    color: var(--white);
}

.error-suggestions {
    border-top: 1px solid #eee;
    padding-top: 40px;
}

.error-suggestions h3 {
    color: var(--primary-green);
    margin-bottom: 30px;
    font-size: 1.5rem;
}

.suggestions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.suggestion-card {
    background: var(--light-green);
    padding: 30px 20px;
    border-radius: 10px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.suggestion-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.suggestion-icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.suggestion-card h4 {
    color: var(--primary-green);
    margin-bottom: 10px;
    font-size: 1.2rem;
}

.suggestion-card p {
    color: var(--gray);
    margin-bottom: 15px;
    font-size: 0.9rem;
    line-height: 1.5;
}

.suggestion-card a {
    color: var(--accent-brown);
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.suggestion-card a:hover {
    color: var(--dark-brown);
}

/* Responsive Design */
@media (max-width: 768px) {
    .error-content {
        padding: 40px 20px;
    }
    
    .error-title {
        font-size: 2.5rem;
    }
    
    .error-description {
        font-size: 1.1rem;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .suggestions-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width: 480px) {
    .error-404 {
        padding: 20px 10px;
    }
    
    .error-content {
        padding: 30px 15px;
    }
    
    .error-title {
        font-size: 2rem;
    }
    
    .error-icon {
        font-size: 4rem;
    }
    
    .error-description {
        font-size: 1rem;
    }
}
</style>

<?php get_footer(); ?>
