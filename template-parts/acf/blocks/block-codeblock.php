<?php
/**
 * Block Name: Code Block
 *
 * This is the template that displays the testimonial block.
 */

// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];
$language = get_field('language');
$code = get_field('code');

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<div id="<?php echo $id; ?>" class="<?php echo $id;?> <?php echo $align_class; ?>">
    <?php echo $language;?>
    <?php echo $code;?>
</div>