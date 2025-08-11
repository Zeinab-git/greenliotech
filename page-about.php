<?php
/* Template Name : About Page */
get_header();
?>




<div class="container_pageabout">
    <div class="archive_pageabout">
        <h1>درباره لیوتک بیشتر بدانید</h1>
        <div>
            <div><?php echo wpautop(get_field('about_page_text')); ?></div>
            <?php $image = get_field('about_page_image'); ?>
            <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
        </div>
    </div>
</div>

<?php get_footer(); ?>