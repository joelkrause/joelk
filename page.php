<?php get_header();?>
<div class="page--heading">
    <div class="wrapper">
        <h1 class="page--title">
            <?php the_title();?>
        </h1>
    </div>
</div>
<div class="wrapper">
    <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        endif;
    ?>
</div>
<?php get_footer();?>