<?php
/**
 * Post Thumbnail Functions
 * @package kidsa
 * @since 1.0.0
 */

$kidsa = kidsa();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $kidsa->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>