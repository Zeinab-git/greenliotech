<?php
/* Template Name : Contact Page */
get_header();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    
    wp_mail('zmzeinabi13110@gmail.com', 'پیام از فرم تماس', $message);

    echo '<p style="color:green;">پیام شما با موفقیت ارسال شد!</p>';
}
?>

<div class="container_pagecontact">
    <form method="POST" class="form_contact">
        <h1>ارتباط با ما</h1>
        <div class="form_input">
            <input type="text" name="name" placeholder="نام">
            <input type="text" placeholder="نام خانوادگی">
            <input type="email" name="email" placeholder="ایمیل">
            <input type="text" placeholder="نام شرکت">
        </div>
        <textarea name="message" id="Comments" placeholder="توضیحات"></textarea>
        <button>ارسال</button>
    </form>


    <div class="information">
        <div> آدرس :<?php echo get_field('contact-page_address'); ?></div>
        <div>تلفن : <?php echo get_field('contact-page_phone'); ?> </div>
        <div>تلگرام : <?php echo get_field('contact-page_telegram'); ?></div>
    </div>
</div>



<?php get_footer(); ?>