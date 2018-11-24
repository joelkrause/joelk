<?php get_header();?>
<div class="container">
    <div class="post--wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <div class="post--card">
            <a href="<?php the_permalink();?>">
                <div class="title">
                    <?php the_title();?>
                </div>
                <div class="date">
                    <?php the_time('F jS, Y'); ?>
                </div>
                <div class="excerpt">
                    <?php the_excerpt();?>
                </div>
            </a>
        </div>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer();?>