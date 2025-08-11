<?php get_header(); ?>


<div class="page_container">
    <?php if (have_posts()):
        while (have_posts()):
            ?>
            <div class="page_content">
                <?php
                the_post();
                the_content();
                ?>
            </div>
            <?php
        endwhile;
    endif; ?>
    <?php get_footer(); ?>
</div>