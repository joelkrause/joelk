<?php $posts = query_posts($query_string); if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php previous_post_link(); ?><?php next_post_link(); ?>

<?php endwhile; endif; ?>