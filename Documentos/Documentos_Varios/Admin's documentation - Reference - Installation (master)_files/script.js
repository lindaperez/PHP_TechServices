$(window).scroll(function() {
    if ($('section.project-stats').length > 0) {
        var secondSectionTop = $('section.project-stats').offset().top - 51;

        // Homepage odometer statistics
        if ($('nav.navbar-fixed-top').offset().top > 80) {
            var forks = $('.project-stats__count--forks');
            var commits = $('.project-stats__count--commits');
            var contributors = $('.project-stats__count--contributors');
            var coffees = $('.project-stats__count--coffees');

            if (forks.parent().attr('data-state') != 'done') {
                forks.parent().attr('data-state', 'done');

                $('.project-stat img').each(function () {
                    $(this).attr('src', $(this).attr('alt'));
                });

                forks.text(0);
                commits.text(0);
                contributors.text(0);
                coffees.text(0);

                forks.text(forks.attr('data-content'));
                commits.text(commits.attr('data-content'));
                contributors.text(contributors.attr('data-content'));
                coffees.text(coffees.attr('data-content'));
            }
        }

        // Homepage navbar
        if ($('nav.navbar-fixed-top').offset().top > secondSectionTop) {
            $('.header-logo').attr('src', '/bundles/sonatageneral/images/logo.png');
            $('nav.navbar-fixed-top').css('background', '#fff');
            $('nav.navbar-fixed-top a:not(".btn-try-it")').css('color', '#333');
            $('nav.navbar-fixed-top').css('border-bottom', '1px solid #ccc');

            $('nav.navbar-fixed-top ul.dropdown-menu').css('background', '#fff');
            $('nav.navbar-fixed-top ul.dropdown-menu a').css('color', '#333');
            $('nav.navbar-fixed-top ul.dropdown-menu').css('border-bottom', '1px solid #ccc');
        } else {
            $('.header-logo').attr('src', '/bundles/sonatageneral/images/logo-white.png');
            $('nav.navbar-fixed-top').css('background', 'rgba(0,0,0,0.20)');
            $('nav.navbar-fixed-top a:not(".btn-try-it")').css('color', '#fff');
            $('nav.navbar-fixed-top').css('border-bottom', 'none');

            $('nav.navbar-fixed-top ul.dropdown-menu').css('background', 'rgba(0,0,0,0.20)');
            $('nav.navbar-fixed-top ul.dropdown-menu').css('border-bottom', 'none');
            $('nav.navbar-fixed-top ul.dropdown-menu a').css('color', '#fff');
            $('nav.navbar-fixed-top ul.dropdown-menu li a').css('border-top', '1px solid rgba(0, 0, 0, 0.4)');

        }
    }
});

function fadedEls(el, shift) {
    if (el.length === 0) {
        return;
    }

    el.css('opacity', 0);

    switch (shift) {
        case undefined: shift = 0;
        break;
        case 'h': shift = el.eq(0).outerHeight();
        break;
        case 'h/2': shift = el.eq(0).outerHeight() / 2;
        break;
    }

    $(window).resize(function() {
        if (!el.hasClass('ani-processed')) {
            el.eq(0).data('scrollPos', el.eq(0).offset().top - $(window).height() + shift);
        }
    }).scroll(function() {
        if (!el.hasClass('ani-processed')) {
            if ($(window).scrollTop() >= el.eq(0).data('scrollPos')) {
                el.addClass('ani-processed');
                el.each(function(idx) {
                    $(this).delay(idx * 200).animate({
                        opacity : 1
                    }, 1000);
                });
            }
        }
    });
};

(function($) {
    $(function() {
        // Sections height & scrolling
        $(window).resize(function() {
            var sH = $(window).height();
            //$('section.content-8').css('height', sH + 'px');
           // $('section:not(.header-10-sub):not(.content-11)').css('height', sH + 'px');
        });

        // Parallax
        /*$('.content-8, .content-23').each(function() {
            $(this).parallax('50%', 0.3, true);
        });*/

        // Faded elements
        fadedEls($('.bundles-pushes'), 300);
        //fadedEls($('.content-8'), 300);

        /*
        (function(el) {
            el.css('left', '-100%');

            $(window).resize(function() {
                if (!el.hasClass('ani-processed')) {
                    console.log(el);
                    el.data('scrollPos', el.offset().top - $(window).height() + el.outerHeight());
                }
            }).scroll(function() {
                if (!el.hasClass('ani-processed')) {
                    if ($(window).scrollTop() >= el.data('scrollPos')) {
                        el.addClass('ani-processed');
                        el.animate({
                            left : 0
                        }, 500);
                    }
                }
            });
        })($('.content-11 > .container'));
        */

        $(window).resize().scroll();


        /**
         * Founder intentions navigation.
         */
        var $founder = $('.founder__intentions');

        if ($founder.length === 1) {
            var $founderPrev         = $founder.find('.founder__intentions__prev'),
                $founderNext         = $founder.find('.founder__intentions__next'),
                $intentions          = $founder.find('.founder__intention'),
                $intentionsContainer = $founder.find('.founder__intentions__container'),
                intentionsCount      = $intentions.length,
                currentIntention     = 0;

            if (intentionsCount > 1) {
                $intentionsContainer.css('height', (intentionsCount * 100) + '%');
                $intentions.css('height', (100 / intentionsCount) + '%');

                function updateFounder() {
                    $intentionsContainer.css('top', '-' + (100 * currentIntention) + '%');

                    if (currentIntention === 0) {
                        $founderPrev.hide();
                    } else {
                        $founderPrev.show();
                    }

                    if (currentIntention === (intentionsCount - 1)) {
                        $founderNext.hide();
                    } else {
                        $founderNext.show();
                    }
                }

                $founderPrev.on('click', function (e) {
                    e.preventDefault();
                    currentIntention -= 1;
                    updateFounder();
                });

                $founderNext.on('click', function (e) {
                    e.preventDefault();
                    currentIntention += 1;
                    updateFounder();
                });

                updateFounder();
            }
        }

        // Scroll for homepage intro
        if ($('section.project-stats').length > 0) {
            $('section.intro a > i.fa-angle-down.animated').on('click', function (e) {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: $('section.project-stats').offset().top - 50
                }, 'slow');
            });
        }

        // Scroll for bundles components
        $('section.components a > i.fa-angle-down.animated').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $('section.social-bar').offset().top - 50
            }, 'slow');
        });
    });

    $(window).load(function() {
        $('html').addClass('loaded');
        $(window).resize().scroll();
    });
})(jQuery);

