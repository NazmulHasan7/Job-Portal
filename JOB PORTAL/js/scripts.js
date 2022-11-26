/*---------------------------------------------------------------------------------------------
  Skip Link Focus Fix
----------------------------------------------------------------------------------------------*/
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();


/*---------------------------------------------------------------------------------------------
  Scroll to top
----------------------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
    $(window).scroll(function(){
        if ($(this).scrollTop() < 400) {
            $('.smoothup') .fadeOut();
        } else {
            $('.smoothup') .fadeIn();
        }
    });
    $('.smoothup').on('click', function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
        });
});

/*---------------------------------------------------------------------------------------------
  Popup
----------------------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
    $(".profile-pic").click(function(){
        $(".popup-image").show();
        $("#menubar").removeClass('sticky-top');
        $("#footer").removeClass('sticky-top');
        $("#footer").removeClass('fixed-bottom');
    })
    $("#close-btn").click(function(){
        $(".popup-image").hide();
        $("#menubar").addClass('sticky-top');
        $("#footer").addClass('sticky-top');
        $("#footer").addClass('fixed-bottom');
    })
    $("#signin").click(function(){
        $("#login-form").show();
        $("#menubar").removeClass('sticky-top');
    })
    $("#signout").click(function(){
        $("#logout-msg").show();
    })
    $("#login-close-btn").click(function(){
        $("#login-form").hide();
        $("#menubar").addClass('sticky-top');
    })
    $("#logout-close-btn").click(function(){
        $("#logout-msg").hide();
    })
    $("#contact").click(function(){
        $("#contact-form").show();
        $("#menubar").removeClass('sticky-top');
        $("#footer").removeClass('sticky-top');
        $("#footer").removeClass('fixed-bottom');
    })
    $("#contact-close-btn").click(function(){
        $("#contact-form").hide();
        $("#menubar").addClass('sticky-top');
        $("#footer").addClass('sticky-top');
        $("#footer").addClass('fixed-bottom');
    })
    $("#msg-btn").click(function(){
        $("#popup-contact-message").hide();
    })
    $("#submit-info").click(function(){
        $(".popup-msg").show();
    })
    $(".menu li").on('click', function(){
        $(".menu li.active").removeClass('active');
        $(this).addClass('active');
    })
    $(".open-btn").on('click', function(){
        $(".sidebar").addClass('active');
        $(".close-sidebar-btn").show();
    })
    $(".close-sidebar-btn").on('click', function(){
        $(".sidebar").removeClass('active');
        $(".close-sidebar-btn").hide();
    })
});