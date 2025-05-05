(function($) {
    "use strict";
	
    $(".tp-menu-bar").on("click", function () {
		$(".tpoffcanvas").addClass("opened");
		$(".body-overlay").addClass("apply");
	});
	$(".close-btn").on("click", function () {
		$(".tpoffcanvas").removeClass("opened");
		$(".body-overlay").removeClass("apply");
	});
	$(".body-overlay").on("click", function () {
		$(".tpoffcanvas").removeClass("opened");
		$(".body-overlay").removeClass("apply");
	});
	
    $(function () {
        $('#theme-serach-box_Inner').removeClass('toggled');
        $('.theme-search-custom-iconn').on('click', function (e) {
            e.stopPropagation();
            $('#theme-serach-box_Inner').toggleClass('toggled');
            $("#popup-search").focus();
        });
        $('#theme-serach-box_Inner input').on('click', function (e) {
            e.stopPropagation();
        });
        $('#theme-serach-box_Inner, body').on('click', function () {
            $('#theme-serach-box_Inner').removeClass('toggled');
        });
    });
	
    $(window).ready(function () {
        //$("#preloader").delay(100).fadeOut("fade");
        $("#preloader").fadeOut();
    });


    /*----------------------------------------
        Scroll to top
    ----------------------------------------*/

    function BackToTop() {
        $('.scrolltotop').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $(document).scroll(function () {
        var y = $(this).scrollTop();
        if (y > 600) {
            $('.scrolltotop').fadeIn();
        } else {
            $('.scrolltotop').fadeOut();
        }
    });

    $(document).scroll(function () {
        var m = $(this).scrollTop();
        if (m > 400) {
            $('.chat-popup').fadeIn();
        } else {
            $('.chat-popup').fadeOut();
        }
    });
}
BackToTop();

jQuery(document).ready(function($) {
    $('#commentform').on('submit', function(event) {
        var valid = true;

        // Reset previous error messages
        $('.error-message').remove();

        // Validate author
        var author = $('#author');
        if (author.length && author.val().trim() === '') {
            author.parent().append('<div class="error-message" style="color: red;">Name is required.</div>');
            valid = false;
        }

        // Validate email
        var email = $('#email');
        if (email.length && email.val().trim() === '') {
            email.parent().append('<div class="error-message" style="color: red;">Email is required.</div>');
            valid = false;
        } else if (email.length && !validateEmail(email.val().trim())) {
            email.parent().append('<div class="error-message" style="color: red;">Please enter a valid email address.</div>');
            valid = false;
        }

        // Validate comment
        var comment = $('#comment');
        if (comment.length && comment.val().trim() === '') {
            comment.parent().append('<div class="error-message" style="color: red;">Comment is required.</div>');
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission
        }
    });

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\\.,;:\s@"]+\.)+[^<>()[\]\\.,;:\s@"]{2,})$/i;
        return re.test(String(email).toLowerCase());
    }
});


        var siteMenuClone = function () {

            $('.theme-navigation-wrap').each(function () {
                var $this = $(this);
                $this.clone().attr('class', 'site-nav-wrap').appendTo('.canvas-nav-menu-wrapper');
            });

            setTimeout(function () {

                var counter = 0;
                $('.mobile-canvas-content .has-children').each(function () {
                    var $this = $(this);

                    $this.prepend('<span class="arrow-collapse collapsed">');

                    $this.find('.arrow-collapse').attr({
                        'data-bs-toggle': 'collapse',
                        'data-bs-target': '#collapseItem' + counter,
                    });

                    $this.find('> ul').attr({
                        'class': 'collapse',
                        'id': 'collapseItem' + counter,
                    });

                    counter++;

                });

            }, 1000);


        };
        siteMenuClone();



	
})(jQuery);