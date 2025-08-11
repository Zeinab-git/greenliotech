<form action="<?php echo home_url('/') ?>" role="search" method="get" class="form_section">

    <input type="search" placeholder="جستجوی محصول، دسته، برند..." value="<?php echo get_search_query(); ?>" class="form_section_input"
        name="s">
    <button type="submit" class="form_section_button"><img
            src="https://icongr.am/fontawesome/search.svg?size=22&color=FFFFFF" alt="serach"></button>

</form>