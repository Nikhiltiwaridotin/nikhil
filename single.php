<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
            <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                
                <div class="post-meta">
                    <span class="post-date">
                        📅 <?php echo get_the_date(); ?>
                    </span>
                    <span class="post-author">
                        👤 <?php the_author(); ?>
                    </span>
                    <?php if (has_category()) : ?>
                        <span class="post-categories">
                            📂 <?php the_category(', '); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <footer class="post-footer">
                <?php if (has_tag()) : ?>
                    <div class="post-tags">
                        <strong>Tags:</strong> <?php the_tags('', ', '); ?>
                    </div>
                <?php endif; ?>
                
                <div class="post-navigation">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ($prev_post) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo get_permalink($prev_post); ?>">
                                ← <?php echo get_the_title($prev_post); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($next_post) : ?>
                        <div class="nav-next">
                            <a href="<?php echo get_permalink($next_post); ?>">
                                <?php echo get_the_title($next_post); ?> →
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </footer>
        </article>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    <?php endwhile; ?>
</main>

<style>
.single-post {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px 20px;
}

.post-header {
    text-align: center;
    margin-bottom: 40px;
}

.post-title {
    font-size: 2.5rem;
    color: var(--primary-green);
    margin-bottom: 1rem;
    line-height: 1.2;
}

.post-meta {
    color: var(--gray);
    font-size: 0.9rem;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.post-meta span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.post-featured-image {
    margin-bottom: 30px;
    text-align: center;
}

.post-featured-image img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.post-content {
    background: var(--white);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--gray);
}

.post-content h2 {
    color: var(--primary-green);
    margin: 2rem 0 1rem 0;
    font-size: 1.8rem;
}

.post-content h3 {
    color: var(--secondary-green);
    margin: 1.5rem 0 1rem 0;
    font-size: 1.4rem;
}

.post-content p {
    margin-bottom: 1.5rem;
}

.post-content ul,
.post-content ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.post-content li {
    margin-bottom: 0.5rem;
}

.post-content blockquote {
    border-left: 4px solid var(--accent-brown);
    padding-left: 20px;
    margin: 2rem 0;
    font-style: italic;
    color: var(--gray);
}

.post-content a {
    color: var(--primary-green);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.3s ease;
}

.post-content a:hover {
    border-bottom-color: var(--primary-green);
}

.post-footer {
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.post-tags {
    margin-bottom: 30px;
    color: var(--gray);
}

.post-tags a {
    color: var(--primary-green);
    text-decoration: none;
    background: var(--light-green);
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.9rem;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.post-tags a:hover {
    background: var(--secondary-green);
    color: var(--white);
}

.post-navigation {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.nav-previous,
.nav-next {
    flex: 1;
}

.nav-previous a,
.nav-next a {
    display: block;
    padding: 15px 20px;
    background: var(--white);
    color: var(--primary-green);
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.nav-previous a:hover,
.nav-next a:hover {
    background: var(--primary-green);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.nav-next {
    text-align: right;
}

@media (max-width: 768px) {
    .single-post {
        padding: 20px 10px;
    }
    
    .post-title {
        font-size: 2rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .post-content {
        padding: 20px;
        font-size: 1rem;
    }
    
    .post-navigation {
        flex-direction: column;
    }
    
    .nav-next {
        text-align: left;
    }
}
</style>

<?php get_footer(); ?>
