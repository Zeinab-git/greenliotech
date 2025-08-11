<div class="footer_container">
    <div>
        <div class="footer_links">
            <div class="footer_link">
                <h3>دسته بندی های محبوب</h3>
                <?php wp_nav_menu(array('theme_location' => 'footer_page_1')); ?>
            </div>
            <div class="footer_link">
                <h3>حساب کاربری</h3>
                <?php wp_nav_menu(array('theme_location' => 'footer_page_2')); ?>
            </div>
        </div>
        <div class="footer_picture">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/Images/85.png" alt="namad"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/Images/namad.webp" alt="namad"></a>
        </div>
    </div>
    <div class="footer_information">
        <h4>از شنبه تا چهارشنبه ۹ الی ۱۷ </h4>
        <h4> پنجشنبه ۹ الی ۱۳</h4>
    </div>
    <h3>آدرس : تقاطع خیابان حافظ و جمهوری ، پاساژ چارسو ، طبقه دوم ، پلاک 65</h3>
    <div>
        <p>کليه حقوق اين سايت متعلق به لیوتک می‌باشد. | Copyright © 2023 - 2025 Greenliotech.com</p>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>