<?php

get_header();

?>


<div class="result_of_serach">

    <h1>نتایج جستجو برای: "<?php echo get_search_query(); ?>"</h1>

    <div class="main_box">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            's' => get_search_query()
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                ?>

                <div class="main_box_child"></div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="undiefind_serach">هیچی پیدا نشد 😢</p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>