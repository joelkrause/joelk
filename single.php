<?php get_header();?>
<div class="page--heading">
    <div class="wrapper">
        <div class="tags">
            <?php
            $post_tags = get_the_tags();
            if ($post_tags) {
              foreach($post_tags as $tag) {
                echo '<span class="post--tag ' . $tag->slug . '">#' . $tag->name . '</span>';
              }
            }
            ?>
        </div>
        <div class="title--wrapper">
            <h1 class="page--title">
                <?php the_title();?>
            </h1>
        </div>
        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '76'); ?>
        <div class="date--posted">Posted on
            <?php the_time('F jS, Y'); ?>
        </div>
        <div class="author">Written by
            <?php the_author_meta('display_name', 1); ?>
        </div>
    </div>
</div>
<div class="container">
    <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        endif;
    ?>
</div>
<?php get_template_part('template-parts/single/comments');?>
<?php get_template_part('template-parts/single/authorbox');?>
<?php get_template_part('template-parts/single/post-nav');?>
<?php get_footer();?>