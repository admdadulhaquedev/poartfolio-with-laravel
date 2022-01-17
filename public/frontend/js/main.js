/* -----------------------------------------------
					Js Main
--------------------------------------------------

    Template Name: Baha - Personal Portfolio Template
    Author: Malyarchuk
    Copyright: 2019

--------------------------------------------------

Table of Content

	1. Preloader
	2. Sound Start
	3. Isotope Portfolio Setup
	4. Blogs Masonry Setup
	5. Active Current Link
	6. Mobile Toggle Click Setup
	7. Testimonials OwlCarousel
	8. Chart Setup
	9. Portfolio Tilt Setup
	10. Portfolio Image Link
	11. Portfolio Video Link
	12. Blog Video Link
	13. Validate Contact Form
	14. Google Map

----------------------------------- */

$(window).on('load', function () {

    /* -----------------------------------
    			1. Preloader
    ----------------------------------- */
    $("#preloader").delay(1000).addClass('loaded');

    /* -----------------------------------
    		3. Isotope Portfolio Setup
    ----------------------------------- */

});






$(document).ready(function () {
    "use strict";

    /* -----------------------------------
    	6. Mobile Toggle Click Setup
    ----------------------------------- */


    /* -----------------------------------
    	6. Protfolio Items Setup
    ----------------------------------- */
    $('.portfolio-items').isotope({
        itemSelector: '.item',
    });

    // filter items on button click
    $('.portfolio-filter').on('click', 'li', function () {
        var filterValue = $(this).attr('data-filter');
        $('.portfolio-items').isotope({
            filter: filterValue
        });
        $('.portfolio-filter li').removeClass('active');
        $(this).addClass('active');
    });


    /* -----------------------------------
        13. Validate Contact Form
    ----------------------------------- */
    if ($("#contact-form").length) {
        $("#contact-form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },

                email: "required",

            },

            messages: {
                name: "Please enter your name",
                email: "Please enter your email address"
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "/mail.php",
                    data: $(form).serialize(),
                    success: function () {
                        $("#loader").hide();
                        $("#success").slideDown("slow");
                        setTimeout(function () {
                            $("#success").slideUp("slow");
                        }, 3000);
                        form.reset();
                    },
                    error: function () {
                        $("#loader").hide();
                        $("#error").slideDown("slow");
                        setTimeout(function () {
                            $("#error").slideUp("slow");
                        }, 3000);
                    }
                });
                return false;
            }

        });
    }


});