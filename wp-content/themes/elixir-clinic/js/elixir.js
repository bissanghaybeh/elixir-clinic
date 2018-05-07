(function ($) {
    $(document).ready(function () {
        function detectScreen() {
            var w = Math.max(
                document.documentElement.clientWidth,
                window.innerWidth || 0
            )

            var screen = 'desktop';
            if (w < 768) {
                screen = 'mobile';
            } else if (w < 1200) {
                if (w < 992) {
                    screen = 'tablet';
                } else {
                    screen = 'tabDesk';
                }
            }
            return screen;
        }
        var screen = detectScreen();
        var url = $("#brandVideo").attr('src');
        $("#videoModal").on('hide.bs.modal', function() {
            $("#brandVideo").attr('src', '');
        });
        $("#videoModal").on('show.bs.modal', function() {
            $("#brandVideo").attr('src', url);
        });

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
            adaptiveHeight: true,
        });
        $(".videos .slider-nav").slick({
            centerPadding: '25px',
            slidesToShow: 2,
            slidesToScroll: 1,
            nextArrow: '<button class="slick-prev slick-arrow" aria-label="Previous Video" type="button" style="display: block;">Previous Video</button>',
            prevArrow: '<button class="slick-next slick-arrow" aria-label="Next Video" type="button" style="display: block;">Next Video</button>',
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        swipe: true,
                    }
                },
            ],
        });
        $(".gallery-slider.slider-nav").slick({
            centerPadding: '25px',
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        swipe: true,
                    }
                },
            ],
        });
        $('.stories-slider').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        swipe: true,
                        arrows: false,
                    }
                },
            ],
        });
        $(".selectric").selectric();
        $(".country-code select option").each(function(){
           if($(this).val() == '+971') {
               $(this).prepend("<i class='emirates flag'></i>");
           } else {
               $(this).prepend("<i class='england flag'></i>");
           }
           $('.country-code select').selectric('refresh');
        });

        $(".anchors-bar").on("click", "a", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(".anchors-bar li").removeClass("active");
            $(this).closest('li').addClass("active");
            $(".tab-section").hide();
            $(target).show();
             $('html, body').animate({
                scrollTop: $(".services-details").offset().top - 50
            }, 500);
        });
        var $sticky_nav = $(".anchors-bar-wrapper");
        if ($sticky_nav.length) {
            var navPosition = $sticky_nav.offset().top;
            var header_height = $('.site-header').outerHeight(),
                navHeight = $sticky_nav.outerHeight() + 20;
            $(window).scroll(function () {
                var scrollPos = $(window).scrollTop();
                if (scrollPos >= navPosition - header_height) {
                    $sticky_nav.addClass("sticky");
                    $sticky_nav.closest(".services-nav").addClass('sticky');
                } else {
                    $sticky_nav.removeClass("sticky");
                    $sticky_nav.closest(".services-nav").removeClass('sticky');
                }
            });
        }
        $(".sub-services-menu").on("click", "a", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            console.log(target);
             $('html, body').animate({
                scrollTop: $(".sub-services-container " + target).offset().top - 100
            }, 500);
        });
        if ($(".services-list").length > 0) {
        $(window).scroll(function() {
                if ($(this).scrollTop() >= $('.services-list').offset().top - 200) {
                    $(".sub-services-menu").show();
                } else {
                    $(".sub-services-menu").hide();
                }
            });
        }
        $(".menu-opener .fa").on('click',function(){
            console.log("jj");
            $(this).parent('.menu-opener').toggleClass('open');
           $(".menu-container-mobile").toggle();
        });

        $( "#ramadan" ).on( "submit", function(event) {
            event.preventDefault();
            country = $("#country").val();
            var data = ({
                action: "send_ajax",
                city: city,
                country: country,
            });
            $.ajax({
                type: "GET",
                url: "/wp-admin/admin-ajax.php",
                data: data,
                contentType: "application/json; charset=utf-8",
                dataType:    "json",
                success: function(data){
                    if (data.html) {
                        console.log(data);
//                        container.append(data.html);
                    }
                }
            });
        })
    });
})(jQuery);