<?php get_header();?>
<div class="page--heading">
    <div class="wrapper">
        <h1 class="page--title">
            <?php the_title();?>
        </h1>
        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
        <div class="date--posted">Posted on
            <?php the_time('F jS, Y'); ?>
        </div>
        <div class="author">Written by
            <?php the_author_meta('display_name', 1); ?>
        </div>
    </div>
</div>
<?php get_footer();?>