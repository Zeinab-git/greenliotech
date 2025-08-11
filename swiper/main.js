// Modal Cart
let addToCart = document.querySelectorAll('.product_type_simple');

addToCart.forEach(function (item) {
    item.addEventListener("click", function () {
        const modalCart = document.querySelector('.modal_cart');

        modalCart.classList.remove('fade_out');

        modalCart.style.visibility = 'visible';
        setTimeout(function () {
            modalCart.classList.add('fade_out');
            modalCart.style.visibility = 'hidden';

        }, 10000);
    });
});




// Swiper Craousel
document.addEventListener('DOMContentLoaded', function () {
    function initSwiper(selector, nextClass, prevClass, paginationClass) {
        new Swiper(selector, {
            loop: true,
            slidesPerView: 4,
            slidesPerGroup: 4,
            spaceBetween: 45,
            speed: 1000,
            autoplay: false,
            pagination: {
                el: paginationClass,
                clickable: true
            },
            navigation: {
                nextEl: nextClass,
                prevEl: prevClass
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    slidesPerGroup: 1
                },
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 2
                },
                1024: {
                    slidesPerView: 3,
                    slidesPerGroup: 3
                },
                1280: {
                    slidesPerView: 4,
                    slidesPerGroup: 4
                }
            }
        });
    }

    initSwiper('.swiper-accessoriesphone', '.accessoriesphone-next', '.accessoriesphone-prev', '.accessoriesphone-page');
    initSwiper('.swiper-watch', '.watch-next', '.watch-prev', '.watch-page');
    initSwiper('.swiper-headPhone', '.headPhone-next', '.headPhone-prev', '.headPhone-page');
    initSwiper('.swiper-parts', '.parts-next', '.parts-prev', '.parts-page');
    initSwiper('.swiper-tools', '.tools-next', '.tools-prev', '.tools-page');
    initSwiper('.swiper-bag', '.bag-next', '.bag-prev', '.bag-page');
});



// Menu Hamburger
let menuImage = document.querySelector('.menuIcon');
let crossImage = document.querySelector('.crossimage');
let hamburgerList = document.querySelector('.menu_hamporger_list');

menuImage.addEventListener('click', function () {
    hamburgerList.style.display = 'flex';
});

crossImage.addEventListener('click', function () {
    hamburgerList.style.display = 'none';
});



// Search Box Modal
let crossImageModal = document.querySelector(".crossimagemodal");
let modalPgae = document.querySelector(".modalpage");
let searchIcon = document.querySelector(".searchIcon")


crossImageModal.addEventListener("click", function () {
    modalPgae.style.display = 'none'
});

searchIcon.addEventListener("click", function () {
    modalPgae.style.display = 'flex'
});



// Scroll 
let navContainer = document.querySelector(".nav_container");

window.addEventListener("scroll", function () {

    if (this.window.scrollY > 190) {
        navContainer.classList.add('scrolled');
        navContainer.style.display = 'flex';
    } else {
        navContainer.classList.remove('scrolled');
        navContainer.style.display = 'none';
    };
});



// Gallery
document.addEventListener('DOMContentLoaded', function () {
    const mainImage = document.getElementById('mainProductImage');
    const thumbs = document.querySelectorAll('.thumb-image');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function () {
            // تغییر تصویر اصلی
            mainImage.src = this.dataset.full;

            // تغییر کلاس active
            thumbs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
});


// Sub Menu
document.addEventListener('DOMContentLoaded', () => {
    // Desctop Header
    const desctopHeader = document.querySelector('#menu-header');
    const desctopHeader1 = document.querySelector('#menu-header-1');
    const menuItemD = desctopHeader.querySelectorAll('.menu-item');
    const menuItemD1 = desctopHeader1.querySelectorAll('.menu-item');

    menuItemD.forEach(item => {
        const link = item.querySelector(':scope > a'); // فقط لینک مستقیم داخل همون آیتم
        const subMenu = item.querySelector(':scope > .sub-menu'); // فقط زیرمنو مستقیم
        const imagItem = item.querySelector(':scope >.menu-icon');

        // فقط وقتی زیرمنو وجود داره این رفتار رو اجرا کن
        if (!item.closest('.sub-menu')) {
            let clickTimeout;

            link.addEventListener('click', (e) => {
                // فقط وقتی روی خود لینک کلیک میشه این رفتار اعمال شه

                e.preventDefault();

                if (clickTimeout) {
                    clearTimeout(clickTimeout);
                    clickTimeout = null;
                    window.location.href = link.href;
                } else {
                    clickTimeout = setTimeout(() => {
                        clickTimeout = null;

                        document.querySelectorAll('.sub-menu').forEach(function (item) {
                            if (item !== subMenu) {
                                item.style.display = 'none';
                            };
                        });

                        subMenu.style.display = subMenu.style.display === 'grid' ? 'none' : 'grid';
                        subMenu.style.opacity = subMenu.style.opacity === 1 ? 0 : 1;
                        imagItem.style.transition = 'all 250ms ease-in-out';
                        imagItem.style.transform = imagItem.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
                    }, 300);
                }

            });
        }
    });

    menuItemD1.forEach(item => {
        const link = item.querySelector(':scope > a'); // فقط لینک مستقیم داخل همون آیتم
        const subMenu = item.querySelector(':scope > .sub-menu'); // فقط زیرمنو مستقیم
        const imagItem = item.querySelector(':scope >.menu-icon');

        // فقط وقتی زیرمنو وجود داره این رفتار رو اجرا کن
        if (!item.closest('.sub-menu')) {
            let clickTimeout;

            link.addEventListener('click', (e) => {
                // فقط وقتی روی خود لینک کلیک میشه این رفتار اعمال شه

                e.preventDefault();

                if (clickTimeout) {
                    clearTimeout(clickTimeout);
                    clickTimeout = null;
                    window.location.href = link.href;
                } else {
                    clickTimeout = setTimeout(() => {
                        clickTimeout = null;

                        document.querySelectorAll('.sub-menu').forEach(function (item) {
                            if (item !== subMenu) {
                                item.style.display = 'none';
                            };
                        });

                        subMenu.style.display = subMenu.style.display === 'grid' ? 'none' : 'grid';
                        subMenu.style.opacity = subMenu.style.opacity === 1 ? 0 : 1;
                        imagItem.style.transition = 'all 250ms ease-in-out';
                        imagItem.style.transform = imagItem.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
                    }, 300);
                }

            });
        }
    });


    // Mobile Header
    const mobileHeader = document.querySelector('#menu-menubar');
    const menuItemP = mobileHeader.querySelectorAll('.menu-item');

    menuItemP.forEach(item => {
        const link = item.querySelector(':scope > a'); // فقط لینک مستقیم داخل همون آیتم
        const subMenu = item.querySelector(':scope > .sub-menu'); // فقط زیرمنو مستقیم

        // فقط وقتی زیرمنو وجود داره این رفتار رو اجرا کن
        if (!item.closest('.sub-menu')) {
            let clickTimeout;

            link.addEventListener('click', (e) => {
                // فقط وقتی روی خود لینک کلیک میشه این رفتار اعمال شه

                e.preventDefault();

                if (clickTimeout) {
                    clearTimeout(clickTimeout);
                    clickTimeout = null;
                    window.location.href = link.href;
                } else {
                    clickTimeout = setTimeout(() => {
                        clickTimeout = null;

                        document.querySelectorAll('.sub-menu').forEach(function (item) {
                            if (item !== subMenu) {
                                item.style.display = 'none';
                            };
                        });

                        subMenu.style.display = subMenu.style.display === 'flex' ? 'none' : 'flex';
                        subMenu.style.opacity = subMenu.style.opacity === 1 ? 0 : 1;
                        subMenu.style.transition = 'all 0.3s ease';

                    }, 300);
                }

            });
        }
    });
});


// Add Favorite
document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('click', function (e) {
        if (e.target.closest('.add-to-favorite')) {
            e.preventDefault();
            const btn = e.target.closest('.add-to-favorite');
            const productId = btn.dataset.productId;
            const img = btn.querySelector('img');
            const defaultSrc = img.dataset.defaultSrc;
            const activeSrc = img.dataset.activeSrc;
            const isCurrentlyActive = img.classList.contains('active');

            // تغییر وضعیت به صورت موقت
            img.classList.toggle('active', !isCurrentlyActive);
            img.src = !isCurrentlyActive ? activeSrc : defaultSrc;

            fetch(myAjax.ajaxurl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: new URLSearchParams({
                    action: "toggle_favorite",
                    product_id: productId,
                }),
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // اگر حذف از صفحه علاقه‌مندی‌ها بود، محصول را از DOM حذف کنیم
                        if (data.action === 'removed' && document.body.classList.contains('favorites-page')) {
                            const productElement = btn.closest('[data-product-id="' + productId + '"]');
                            if (productElement) {
                                productElement.style.transition = 'all 0.3s ease';
                                productElement.style.opacity = '0';
                                setTimeout(() => {
                                    productElement.remove();
                                    // اگر لیست خالی شد، پیام نمایش دهید
                                    if (document.querySelectorAll('.favorites-list .product').length === 0) {
                                        document.querySelector('.favorites-list').innerHTML = '<p class="empty-favorites">لیست علاقه‌مندی‌های شما خالی است.</p>';
                                    }
                                }, 300);
                            }
                        }
                    }
                })
        }
    });
});



// Effects On Icons
document.querySelectorAll('.icon-clickable').forEach(icon => {
    icon.addEventListener('click', function () {
        icon.classList.remove('icon-animate');  // ریست برای تکرار
        void icon.offsetWidth; // ترفند ریست CSS animation
        icon.classList.add('icon-animate');
    });
});



// Login Style Handle
let accountPart = document.querySelector('.second');

if (isLogged) {
    accountPart.style.borderRight = '2px solid var(--themesite_3)';
    accountPart.style.paddingRight = '15px';
}
