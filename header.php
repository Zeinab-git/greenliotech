<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://qmpq.org/xfn/11">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div>
        <div class="nav_search">
            <div class="menu_hamporger_list">
                <?php wp_nav_menu(array('theme_location' => 'hamburger_menu')); ?>
                <img src="https://icongr.am/clarity/remove.svg?size=32&color=ffffff" alt="cross" class="crossimage">
            </div>

            <div class="Icons">
                <img src="https://icongr.am/clarity/bars.svg?size=40&color=currentColor" alt="menu" class="menuIcon">
                <?php $image = get_field('logo_picture', 18); ?>
                <img src="<?php echo esc_url($image['url']) ?>" alt="logo" class="nav_logo">
            </div>

            <div class="search"><?php get_search_form(); ?></div>

            <div class="modalpage">
                <img src="https://icongr.am/clarity/remove.svg?size=32&color=ffffff" alt="cross"
                    class="crossimagemodal">
                <?php get_search_form(); ?>
            </div>


            <div class="loginaccount">
                <div class="accountpart">
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="icon-clickable"><img
                            src="<?php echo get_template_directory_uri(); ?>/Images/icons8-account-50.png"
                            alt="namad"></a>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="icon-clickable"><img
                            src="<?php echo get_template_directory_uri(); ?>/Images/icons8-shopping-cart-64.png"
                            alt="namad"></a>
                    <a href="/favorites/" class="icon-clickable"><img
                            src="<?php echo get_template_directory_uri(); ?>/Images/icons8-heart-50.png"
                            alt="namad"></a>
                </div>
                <div class="nav_button">
                    <img src="https://icongr.am/fontawesome/search.svg?size=22&color=023020" alt="serach"
                        class="searchIcon">
                    <?php if (!is_user_logged_in()): ?>
                        <button class="nav_button_child_1">
                            <a href="<?php echo wc_get_page_permalink('myaccount') ?>" class="nav_button_link_1">ورود | ثبت
                                نام</a>
                        </button>
                    <?php else: ?>
                        <div class="heyUser">
                            <?php $current_user = wp_get_current_user(); ?>
                            <h3>سلام <?php echo $current_user->display_name ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php wp_nav_menu(array('theme_location' => 'header_page')); ?>
    </div>

    <div class="nav_container">
        <?php wp_nav_menu(array('theme_location' => 'header_page')); ?>
        <div class="nav_button">
            <img src="https://icongr.am/fontawesome/search.svg?size=22&color=023020" alt="serach" class="searchIcon">
            <?php if (!is_user_logged_in()): ?>
                <button class="nav_button_child_1 changeColor">
                    <a href="<?php echo wc_get_page_permalink('myaccount') ?>" class="nav_button_link_1">ورود | ثبت نام</a>
                </button>
            <?php else: ?>
                <div class="accountpart second">
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="icon-clickable"><img
                            src="<?php echo get_template_directory_uri(); ?>/Images/icons8-account-50.png" alt="namad"></a>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="icon-clickable"><img
                            src="<?php echo get_template_directory_uri(); ?>/Images/icons8-shopping-cart-64.png"
                            alt="namad"></a>
                    <a href="/favorites/" class="icon-clickable"><img
                            src="<?php echo get_template_directory_uri(); ?>/Images/icons8-heart-50.png" alt="namad"></a>
                </div>
            <?php endif; ?>
        </div>
    </div>



<script>
    const isLogged = <?php echo is_user_logged_in() ? 'true' : 'false' ; ?>
</script>