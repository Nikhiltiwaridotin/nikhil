<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <div class="page-content-wrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="page-content-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<style>
.page-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px 20px;
}

.page-header {
    text-align: center;
    margin-bottom: 40px;
}

.page-title {
    font-size: 2.5rem;
    color: var(--primary-green);
    margin-bottom: 1rem;
    position: relative;
}

.page-title::after {
    content: '';
    display: block;
    width: 80px;
    height: 3px;
    background-color: var(--accent-brown);
    margin: 1rem auto;
}

.page-content-wrapper {
    background: var(--white);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.page-featured-image {
    margin-bottom: 30px;
    text-align: center;
}

.page-featured-image img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.page-content-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--gray);
}

.page-content-text h2 {
    color: var(--primary-green);
    margin: 2rem 0 1rem 0;
    font-size: 1.8rem;
}

.page-content-text h3 {
    color: var(--secondary-green);
    margin: 1.5rem 0 1rem 0;
    font-size: 1.4rem;
}

.page-content-text p {
    margin-bottom: 1.5rem;
}

.page-content-text ul,
.page-content-text ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.page-content-text li {
    margin-bottom: 0.5rem;
}

.page-content-text blockquote {
    border-left: 4px solid var(--accent-brown);
    padding-left: 20px;
    margin: 2rem 0;
    font-style: italic;
    color: var(--gray);
}

.page-content-text a {
    color: var(--primary-green);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.3s ease;
}

.page-content-text a:hover {
    border-bottom-color: var(--primary-green);
}

@media (max-width: 768px) {
    .page-content {
        padding: 20px 10px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .page-content-wrapper {
        padding: 20px;
    }
    
    .page-content-text {
        font-size: 1rem;
    }
}
</style>

<?php get_footer(); ?>
