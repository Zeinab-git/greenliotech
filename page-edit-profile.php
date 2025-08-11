<?php
/* Template Name : Edit Profile Page */
acf_form_head();
get_header();

?>

<div class="editprofile_container">
    <h1>ویرایش پروفایل</h1>

    <?php
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();

        acf_form(array(
            'post_id' => 'user_' . $user_id,
            'field_groups' => array(304),
            'submit_value' => 'ذخیره تغییرات',
            'form' => true,
            'html_before_fields' => '',
            'html_after_fields' => ''
        ));
    } else {
        echo '<p>برای تغییر پروفایل لطفا وارد شوید.</p>';
    }
    ?>
</div>

<?php get_footer(); ?>