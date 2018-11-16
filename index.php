<?php get_header();?>
<div class="container">
    <div class="post--wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <div class="post--card">
            <a href="<?php the_permalink();?>">
                <?php the_title();?>
            </a>
        </div>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer();?>