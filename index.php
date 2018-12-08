<?php get_header();?>
<div class="container">
    <div class="home--intro">
        <strong>Hey! &#x1F44B; I'm Joel.</strong>
        <p>I'm a web developer at Studio Chriate where I code pixel perfect WordPress websites.</p>
    </div>
    <div class="latest--posts">Latest Posts</div>
    <div class="post--wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/post-loop');
        endwhile; endif; ?>
        <?php
        global $wp_query; // you can remove this line if everything works for you
        
        // don't display the button if there are not enough posts
        if (  $wp_query->max_num_pages > 1 )
            echo '<div class="misha_loadmore">Show More Posts...</div>'; // you can use <a> as well
        ?>
    </div>
</div>
<?php get_footer();?>