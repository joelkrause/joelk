<div class="post--card">
    <a href="<?php the_permalink();?>">
        <div class="title">
            <?php the_title();?>
        </div>
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
        <div class="date">
            <?php the_time('F jS, Y'); ?>
        </div>
    </a>
</div>