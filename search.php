<?php get_header(); ?>

<main class="main-content">
    <header class="search-header">
        <h1 class="search-title">🔍 Search Results</h1>
        <p class="search-info">
            <?php if (have_posts()) : ?>
                Found <?php echo $wp_query->found_posts; ?> result<?php echo $wp_query->found_posts != 1 ? 's' : ''; ?> for "<strong><?php echo get_search_query(); ?></strong>"
            <?php else : ?>
                No results found for "<strong><?php echo get_search_query(); ?></strong>"
            <?php endif; ?>
        </p>
        
        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <input type="search" class="search-input" placeholder="Search for..." value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-button">Search</button>
        </form>
    </header>

    <?php if (have_posts()) : ?>
        <div class="search-results">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="result-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="result-content">
                        <header class="result-header">
                            <h2 class="result-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="result-meta">
                                <span class="result-type">
                                    <?php
                                    $post_type = get_post_type();
                                    $post_type_obj = get_post_type_object($post_type);
                                    echo $post_type_obj ? $post_type_obj->labels->singular_name : 'Post';
                                    ?>
                                </span>
                                <span class="result-date">📅 <?php echo get_the_date(); ?></span>
                            </div>
                        </header>
                        
                        <div class="result-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="result-highlight">
                            <?php
                            // Highlight search terms in excerpt
                            $excerpt = get_the_excerpt();
                            $search_terms = get_search_query();
                            $highlighted_excerpt = preg_replace('/(' . preg_quote($search_terms, '/') . ')/i', '<mark>$1</mark>', $excerpt);
                            echo $highlighted_excerpt;
                            ?>
                        </div>
                        
                        <footer class="result-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more">Read Full Article →</a>
                            
                            <?php if (has_category()) : ?>
                                <div class="result-categories">
                                    <?php the_category(', '); ?>
                                </div>
                            <?php endif; ?>
                        </footer>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <?php
        // Pagination
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => '← Previous',
            'next_text' => 'Next →',
        ));
        ?>
        
    <?php else : ?>
        <div class="no-results">
            <div class="no-results-icon">🔍</div>
            <h2>No Results Found</h2>
            <p>Sorry, we couldn't find any content matching your search terms.</p>
            
            <div class="search-suggestions">
                <h3>Search Suggestions:</h3>
                <ul>
                    <li>Check your spelling</li>
                    <li>Try different keywords</li>
                    <li>Use more general terms</li>
                    <li>Try fewer keywords</li>
                </ul>
            </div>
            
            <div class="no-results-actions">
                <a href="<?php echo home_url(); ?>" class="cta-button">Back to Home</a>
                <a href="<?php echo home_url(); ?>#initiatives" class="secondary-button">Browse Our Initiatives</a>
            </div>
        </div>
    <?php endif; ?>
</main>

<style>
.search-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 40px 20px;
    background: var(--white);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.search-title {
    font-size: 2.5rem;
    color: var(--primary-green);
    margin-bottom: 1rem;
}

.search-info {
    font-size: 1.1rem;
    color: var(--gray);
    margin-bottom: 30px;
}

.search-form {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    gap: 10px;
}

.search-input {
    flex: 1;
    padding: 12px 15px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--secondary-green);
}

.search-button {
    background-color: var(--primary-green);
    color: var(--white);
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: var(--secondary-green);
}

.search-results {
    margin-bottom: 40px;
}

.search-result-item {
    background: var(--white);
    border-radius: 10px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: flex;
    gap: 25px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.search-result-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.result-thumbnail {
    flex-shrink: 0;
    width: 150px;
}

.result-thumbnail img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
}

.result-content {
    flex: 1;
}

.result-header {
    margin-bottom: 15px;
}

.result-title {
    font-size: 1.4rem;
    margin-bottom: 10px;
    line-height: 1.3;
}

.result-title a {
    color: var(--primary-green);
    text-decoration: none;
    transition: color 0.3s ease;
}

.result-title a:hover {
    color: var(--accent-brown);
}

.result-meta {
    display: flex;
    gap: 15px;
    font-size: 0.9rem;
    color: var(--gray);
    flex-wrap: wrap;
}

.result-type {
    background: var(--light-green);
    color: var(--primary-green);
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: bold;
}

.result-excerpt {
    color: var(--gray);
    line-height: 1.6;
    margin-bottom: 15px;
}

.result-highlight mark {
    background-color: #fff3cd;
    color: #856404;
    padding: 2px 4px;
    border-radius: 3px;
    font-weight: bold;
}

.result-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.read-more {
    color: var(--primary-green);
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.read-more:hover {
    color: var(--accent-brown);
}

.result-categories {
    font-size: 0.9rem;
}

.result-categories a {
    color: var(--secondary-green);
    text-decoration: none;
    background: var(--light-green);
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

.result-categories a:hover {
    background: var(--secondary-green);
    color: var(--white);
}

/* No Results */
.no-results {
    text-align: center;
    padding: 60px 20px;
    background: var(--white);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.no-results-icon {
    font-size: 4rem;
    margin-bottom: 20px;
}

.no-results h2 {
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-size: 2rem;
}

.no-results p {
    color: var(--gray);
    margin-bottom: 2rem;
    font-size: 1.1rem;
}

.search-suggestions {
    margin-bottom: 30px;
    text-align: left;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.search-suggestions h3 {
    color: var(--primary-green);
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.search-suggestions ul {
    list-style: none;
    padding: 0;
}

.search-suggestions li {
    color: var(--gray);
    margin-bottom: 8px;
    padding-left: 20px;
    position: relative;
}

.search-suggestions li::before {
    content: '•';
    color: var(--accent-brown);
    position: absolute;
    left: 0;
    font-weight: bold;
}

.no-results-actions {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 768px) {
    .search-title {
        font-size: 2rem;
    }
    
    .search-form {
        flex-direction: column;
    }
    
    .search-result-item {
        flex-direction: column;
        gap: 20px;
    }
    
    .result-thumbnail {
        width: 100%;
    }
    
    .result-thumbnail img {
        height: 200px;
    }
    
    .result-footer {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .no-results-actions {
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 480px) {
    .search-header {
        padding: 30px 15px;
    }
    
    .search-title {
        font-size: 1.8rem;
    }
    
    .search-result-item {
        padding: 20px;
    }
    
    .result-meta {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<?php get_footer(); ?>
