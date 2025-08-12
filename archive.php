<?php get_header(); ?>

<main class="main-content">
    <header class="archive-header">
        <?php if (is_category()) : ?>
            <h1 class="archive-title">📂 Category: <?php single_cat_title(); ?></h1>
            <?php if (category_description()) : ?>
                <div class="archive-description"><?php echo category_description(); ?></div>
            <?php endif; ?>
        <?php elseif (is_tag()) : ?>
            <h1 class="archive-title">🏷️ Tag: <?php single_tag_title(); ?></h1>
            <?php if (tag_description()) : ?>
                <div class="archive-description"><?php echo tag_description(); ?></div>
            <?php endif; ?>
        <?php elseif (is_author()) : ?>
            <h1 class="archive-title">👤 Author: <?php the_author(); ?></h1>
        <?php elseif (is_date()) : ?>
            <h1 class="archive-title">📅 Archive: <?php echo get_the_date('F Y'); ?></h1>
        <?php else : ?>
            <h1 class="archive-title">📝 Blog Posts</h1>
        <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="posts-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <header class="post-header">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="post-meta">
                                <span class="post-date">📅 <?php echo get_the_date(); ?></span>
                                <span class="post-author">👤 <?php the_author(); ?></span>
                            </div>
                        </header>
                        
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <footer class="post-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                            
                            <?php if (has_category()) : ?>
                                <div class="post-categories">
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
        <div class="no-posts">
            <h2>No posts found</h2>
            <p>Sorry, no posts matched your criteria.</p>
            <a href="<?php echo home_url(); ?>" class="cta-button">Back to Home</a>
        </div>
    <?php endif; ?>
</main>

<style>
.archive-header {
    text-align: center;
    margin-bottom: 40px;
    padding: 40px 20px;
    background: var(--white);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.archive-title {
    font-size: 2.5rem;
    color: var(--primary-green);
    margin-bottom: 1rem;
}

.archive-description {
    font-size: 1.1rem;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.post-card {
    background: var(--white);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.post-thumbnail {
    position: relative;
    overflow: hidden;
}

.post-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-card:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-content {
    padding: 25px;
}

.post-header {
    margin-bottom: 15px;
}

.post-title {
    font-size: 1.3rem;
    margin-bottom: 10px;
    line-height: 1.3;
}

.post-title a {
    color: var(--primary-green);
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-title a:hover {
    color: var(--accent-brown);
}

.post-meta {
    font-size: 0.9rem;
    color: var(--gray);
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.post-meta span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.post-excerpt {
    color: var(--gray);
    line-height: 1.6;
    margin-bottom: 20px;
}

.post-footer {
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

.post-categories {
    font-size: 0.9rem;
}

.post-categories a {
    color: var(--secondary-green);
    text-decoration: none;
    background: var(--light-green);
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    transition: background-color 0.3s ease;
}

.post-categories a:hover {
    background: var(--secondary-green);
    color: var(--white);
}

/* Pagination */
.wp-pagenavi {
    text-align: center;
    margin: 40px 0;
}

.wp-pagenavi a,
.wp-pagenavi span {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background: var(--white);
    color: var(--primary-green);
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.wp-pagenavi a:hover,
.wp-pagenavi span.current {
    background: var(--primary-green);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

/* No posts found */
.no-posts {
    text-align: center;
    padding: 60px 20px;
    background: var(--white);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.no-posts h2 {
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-size: 2rem;
}

.no-posts p {
    color: var(--gray);
    margin-bottom: 2rem;
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .archive-title {
        font-size: 2rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .post-content {
        padding: 20px;
    }
    
    .post-footer {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .wp-pagenavi a,
    .wp-pagenavi span {
        padding: 8px 12px;
        margin: 0 3px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .archive-header {
        padding: 30px 15px;
    }
    
    .archive-title {
        font-size: 1.8rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 8px;
    }
}
</style>

<?php get_footer(); ?>
