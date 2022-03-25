$(document).ready(function () {
    "use strict";

    // fixed header
    // $(window).scroll(function () {
    //  let scroll = $(window).scrollTop();

    //  if (scroll >= 2) {
    //    $("header .navbar.main-nav").addClass("fixed");
    //  } else {
    //    $("header .navbar.main-nav").removeClass("fixed");
    //  }
    // });

    //dropdown dropkick select
    $(".select").dropkick({
        mobile: true
    });

    // // toast notification
    // let toastTrigger = $('.fav-btn');
    // let toastAdding = $('#addFavToast');
    // let toastRemoving = $('#removeFavToast');
    // toastTrigger.on('click', function () {
    //     $(this).toggleClass("added").find("i").toggleClass("bi-heart bi-heart-fill")

    //     if (toastTrigger && $(this).hasClass("added")) {
    //         let toast = new bootstrap.Toast(toastAdding)
    //         toast.show();
    //     } else {
    //         let toast = new bootstrap.Toast(toastRemoving)
    //         toast.show();
    //     }
    // });

    //validate form
    (function () {
        let forms = document.querySelectorAll('.needs-validation')

        //Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })();

    //main slider owl
    $('.main-slider-carousel').owlCarousel({
        center: true,
        loop: true,
        margin: 2,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        rtl: true,
        dots: false,
        lazyLoad: true,
        navText: ["<i class='bi bi-arrow-left'></i>", "<i class='bi bi-arrow-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },

            992: {
                items: 3,
            }
        }
    });

    //lazyload images
    $("img").Lazy({
        scrollDirection: "vertical",
        effect: "fadeIn",
        visibleOnly: false,
    });

    //to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 500) {
            $("#toTop").fadeIn(100);
        } else {
            $("#toTop").fadeOut(100);
        }
    });

    // $("#search-input").on("keyup blur", function () {
    //     var value = this.value.toLowerCase().trim();
    //     $(".category-outer").show().filter(function () {
    //         console.log($(this).text().toLowerCase().trim().indexOf(value));
    //         return $(this).text().toLowerCase().trim().indexOf(value) == -1;
    //     }).hide();
    // });

    $('#search-input').on('input keyup', function () {
        //get value just typed into textbox -- see .toLowerCase()
        var val = this.value.toLowerCase();
        //find all .user-profile divs
        $('.categories').find('.category-outer').filter(function () {
            //find those that should be visible
            return $(this).data('title').toLowerCase().indexOf(val) > -1;
        }).show(100).end().filter(':visible').filter(function () {
            //filter only those for which typed value 'val' does not match the `data-title` value
            return $(this).data('title').toLowerCase().indexOf(val) === -1;
        }).fadeOut(100);

        // $('.categories .category-outer').each(function () {
        //     if ($(this).css("display") == "none") {
        //         $(".categories .nothing").show()
        //     } else if ($(this).css("display") == "block") {
        //         $(".categories .nothing").hide()
        //     }
        // });
    });
});
