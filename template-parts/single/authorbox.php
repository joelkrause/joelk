<div class="author--box">
    <div class="container">
        <h2>About
            <?php the_author_meta('first_name',1);?>
        </h2>
        <div class="wrap">
            <div class="gravatar">
                <?php echo get_avatar( get_the_author_meta('user_email'), $size = '128'); ?>
            </div>
            <div class="content">
                <?php the_author_meta('description', 1); ?>
                <?php get_template_part('template-parts/sitewide/socialmedia');?>
            </div>
        </div>
    </div>
</div>