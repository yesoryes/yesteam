$(document).ready(function() {
	
	/* For Browser Height*/ 
	/*$("header .carousel-inner .item").css({
			'height' : $( window ).height() 
	});*/
	
	 
	
}); 
/*Menu More Button*/
 var more = function() {  
  $('.more, .navbar-toggle').click(function() { 
  //alert ();  
   $('.menu').animate({right: "0px" }, 500).css({
    display : 'block', top: '0',
   }); 
   $('body').animate({right: "0"}, 500); 
   $('.bg, .main-nav ul, .navbar-brand img, nav').slideUp(500);
   /*$('.more').css ({
    display : 'none',
   });*/
   $('.black-overlay').css({
    display: 'block',
   // position: 'absolute',
    'z-index' : '1'
   });
   
  });    
  / Then push them back /   
  $('.more-close, .black-overlay').click(function() {
     $('.menu').animate({right: "-325px"}, 500);
     $('body').animate({right: "0px"  }, 500); 
     $('.bg, .main-nav ul, .navbar-brand img, nav').slideDown(500);	 
     $('.more').css ({
    display : 'block', 
   });
   $('.black-overlay').css({
    display: 'none',
   });
  });
 };
 $(document).ready(more); 
/*Menu More Button*/

var fullHeight = $(window).height();

$('.menu, .black-overlay').css({
	height: fullHeight,
});
/*Menu More Button*/ 
 
 // hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
 

 
/*
	
$(window).load(function()
{
		
	$('#preloader').fadeOut('slow',function(){$(this).remove();}); 
		 
	$.preloadImages = function()
	  {
			  for (var i = 0; i < arguments.length; i++)
			  {
				$("<img />").attr("src", arguments[i]);
	          }
      }

                $.preloadImages("img/4way-color.png", "img/menu_option.png", "img/4way-taxi-color.png","img/acclary-color.png","img/asna-color.png","img/banner-link.png","img/banner-link1024.png","img/banner-mob-link.png","img/paradise-color.png","img/product1-hover.png","img/product2-hover.png","img/product3-hover.png","img/product4-hover.png","img/right-nav.png","img/seskhan-link.png","img/product1-1024-hover.png","img/product2-1024-hover.png","img/product3-1024-hover.png","img/product4-1024-hover.png", "img/service1-hover.png", "img/service2-hover.png", "img/service3-hover.png", "img/service4-hover.png","img/service5-hover.png", "img/service6-hover.png", "img/service7-hover.png", "img/service8-hover.png", "img/page-top-hover.png", "img/service9-hover.png", "img/service10-hover.png", "img/menu_option.png", "img/product-main.jpg', "img/product-main-1024.jpg', "img/google-hover.png", "img/google-menu-hover.png", "img/facebook-hover.png", "img/facebook-menu-hover.png", "img/linked-hover.png", "img/linked-menu-hover.png",  "img/product1-mob-hover.png", "img/product2-mob-hover.png", "img/product3-mob-hover.png", "img/product4-mob-hover.png", "img/youtube-hover.png", "img/youtube-menu-hover.png", "img/web-app-menu-hover.png", "img/mobile-app-hover.png", "img/mobile-game-hover.png"); 
});*/
 

 
 
 
 
/* Prodcut Animation */

$(document).ready(function(e) {
    $('.product-main').hover(
	function() 
	{
		$('figure img').css({ transform: 'scale(1.1)', })
	},
	function() 
	{
		$('figure img').css({ transform: 'scale(1)', })
	}
 )
});


$(document).ready(function() {
    
    function checkWidth() {
        var windowSize = $(window).width(); 
        if (windowSize > 1170) {
             $('.product-main').hover(
				function() {
					$('figure img').css({ transform: 'scale(1.1)', })
				},
				function() {
					$('figure img').css({ transform: 'scale(1)', })
			  });
        }
        else if (windowSize < 1170) {
           
			$('.product-main').hover(
				function() {
					$('figure img').css({ transform: 'scale(1)', })
				},
				function() {
					$('figure img').css({ transform: 'scale(1)', })
			  });
        }
    }

    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});



 

/*about-mgmt section*/ 

$(function() {  
	//Tab
  $('#about-mgmt a').on('click', function(e){
    e.preventDefault();

    if($(this).hasClass('open')) {
      // do nothing because the link is already open
    } else {
      var oldcontent = $('#about-mgmt a.open').attr('href');
      var newcontent = $(this).attr('href');
      
     $(oldcontent).fadeOut(1500, function(){
        $(newcontent).fadeIn(1500).removeClass('hidden');
        $(oldcontent).addClass('hidden');
      });
	        
      $('#about-mgmt a').removeClass('open');
      $(this).addClass('open');
    }
	if($(this).hasClass('active')) {
			  // do nothing because the link is already open
	  } 
	  else 
	  {
			 
		$('#about-mgmt a').removeClass('active');
		$(this).addClass('active');
	  }
  });
});  
$(function() {  
	//Tab
  $('#tab-head-nav a').on('click', function(e){
    e.preventDefault();

    if($(this).hasClass('open')) {
      // do nothing because the link is already open
    } else {
      var oldcontent = $('#tab-head-nav a.open').attr('href');
      var newcontent = $(this).attr('href');
      
      $(oldcontent).fadeOut(500, function(){
        $(newcontent).fadeIn(500).removeClass('hidden');
        $(oldcontent).addClass('hidden');
      });      
      $('#tab-head-nav a').removeClass('open');
      $(this).addClass('open');
    }
	if($(this).hasClass('active')) {
			  // do nothing because the link is already open
			} 
			else 
			{
			       
			  $('#tab-head-nav a').removeClass('active');
			  $(this).addClass('active');
			}
  });
});

 

/* Career Html */
$(document).ready(function () {
    //toggle the component with class accordion_body
    $(".accordion-head").click(function () {
        if ($('.accordion-body').is(':visible')) {
            $(".accordion-body").slideUp(300);
            $(".plusminus").html('<img src="img/plus-sign.png" alt=""/>');
        }
        if ($(this).next(".accordion-body").is(':visible')) {
            $(this).next(".accordion-body").slideUp(300);
            $(this).children(".plusminus").html('<img src="img/plus-sign.png" alt=""/>');
        } else {
            $(this).next(".accordion-body").slideDown(300);
            $(this).children(".plusminus").html('<img src="img/minus-sign.png" alt=""/>');
        }
    });
});
/* Career Upload File */
 ;(function($) {

		  // Browser supports HTML5 multiple file?
		  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
		      isIE = /msie/i.test( navigator.userAgent );

		  $.fn.customFile = function() {

		    return this.each(function() {

		      var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
		          $wrap = $('<div class="file-upload-wrapper">'),
		          $input = $('<input type="text" placeholder="Resume" class="file-upload-input" />'),
		          // Button that will be used in non-IE browsers
		          $button = $('<button type="button" class="file-upload-button">BROWSE</button>'),
		          // Hack for IE
		          $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select a File</label>');

		      // Hide by shifting to the left so we
		      // can still trigger events
		      $file.css({
		        position: 'absolute',
		        left: '-9999px'
		      });

		      $wrap.insertAfter( $file )
		        .append( $file, $input, ( isIE ? $label : $button ) );

		      // Prevent focus
		      $file.attr('tabIndex', -1);
		      $button.attr('tabIndex', -1);

		      $button.click(function () {
		        $file.focus().click(); // Open dialog
		      });

		      $file.change(function() {

		        var files = [], fileArr, filename;

		        // If multiple is supported then extract
		        // all filenames from the file array
		        if ( multipleSupport ) {
		          fileArr = $file[0].files;
		          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
		            files.push( fileArr[i].name );
		          }
		          filename = files.join(', ');

		        // If not supported then just take the value
		        // and remove the path to just show the filename
		        } else {
		          filename = $file.val().split('\\').pop();
		        }

		        $input.val( filename ) // Set the value
		          .attr('title', filename) // Show filename in title tootlip
		          .focus(); // Regain focus

		      });

		      $input.on({
		        blur: function() { $file.trigger('blur'); },
		        keydown: function( e ) {
		          if ( e.which === 13 ) { // Enter
		            if ( !isIE ) { $file.trigger('click'); }
		          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
		            // On some browsers the value is read-only
		            // with this trick we remove the old input and add
		            // a clean clone with all the original events attached
		            $file.replaceWith( $file = $file.clone( true ) );
		            $file.trigger('change');
		            $input.val('');
		          } else if ( e.which === 9 ){ // TAB
		            return;
		          } else { // All other keys
		            return false;
		          }
		        }
		      });

		    });

		  };

		  // Old browser fallback
		  if ( !multipleSupport ) {
		    $( document ).on('change', 'input.customfile', function() {

		      var $this = $(this),
		          // Create a unique ID so we
		          // can attach the label to the input
		          uniqId = 'customfile_'+ (new Date()).getTime(),
		          $wrap = $this.parent(),

		          // Filter empty input
		          $inputs = $wrap.siblings().find('.file-upload-input')
		            .filter(function(){ return !this.value }),

		          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

		      // 1ms timeout so it runs after all other events
		      // that modify the value have triggered
		      setTimeout(function() {
		        // Add a new input
		        if ( $this.val() ) {
		          // Check for empty fields to prevent
		          // creating new inputs when changing files
		          if ( !$inputs.length ) {
		            $wrap.after( $file );
		            $file.customFile();
		          }
		        // Remove and reorganize inputs
		        } else {

		          $inputs.parent().remove();
		          // Move the input so it's always last on the list
		          $wrap.appendTo( $wrap.parent() );
		          $wrap.find('input').focus();
		        }
		      }, 1);

		    });
		  }

}(jQuery));

$('input[type=file]').customFile();

/* Forms */
$(document).ready(function(){
    $(".contact-app").click(function(){
        $(".contact-form").slideDown(1500).css({
		   'display' : 'block',
        });
		
		$(".contact-app").delay(1000).css({
		   //'display' : 'none',
		   'visibility': 'hidden' 
        });
    });
    $(".cancel-btn").click(function(){
		
        $(".contact-form").slideUp(1000).css({
   			//'display' : 'none',
       });
		$(".contact-app").delay(3000).css({
   			//'display' : 'block',
			'visibility': 'visible',
			/*'transition': '5s all'*/
       });
    });
	
	
	  
    //Form
    $( '.input-field' ).focus(function() {
        $( this ).next( 'label' ).addClass('focused');
        $( this ).parent().find( '.focused-border' ).addClass('focused');
    });
    
    $( '.input-field' ).blur(function() {
         if( $(this).val().length === 0 ) {
            $( this ).next( 'label' ).removeClass('focused');
            $( this ).parent().find( '.focused-border' ).removeClass('focused');
         }
    });
	
});

/* Portfolio html*/



$(function() {  
	//Tab
  $('#tab-head-nav a').on('click', function(e){
    e.preventDefault();

    if($(this).hasClass('open')) {
      // do nothing because the link is already open
    } else {
      var oldcontent = $('#tab-head-nav a.open').attr('href');
      var newcontent = $(this).attr('href');
      
      $(oldcontent).fadeOut('fast', function(){
        $(newcontent).fadeIn().removeClass('hidden');
        $(oldcontent).addClass('hidden');
      });      
      $('#tab-head-nav a').removeClass('open');
      $(this).addClass('open');
    }
  });
 
	//Tab
  $('#about-mgmt a').on('click', function(e){
    e.preventDefault();

    if($(this).hasClass('open')) {
      // do nothing because the link is already open
    } else {
      var oldcontent = $('#about-mgmt a.open').attr('href');
      var newcontent = $(this).attr('href');
      
      $(oldcontent).fadeOut('fast', function(){
        $(newcontent).fadeIn().removeClass('hidden');
        $(oldcontent).addClass('hidden');
      });      
      $('#about-mgmt a').removeClass('open');
      $(this).addClass('open');
    }
  });
});
 

/*Portfolio Tab*/

 $('.tab-section').hide();
    $('#tabs a').bind('click', function(e){
        $('#tabs a.current').removeClass('current');
        $('.tab-section:visible').hide();
        $(this.hash).show();
        $(this).addClass('current');
        e.preventDefault();
    }).filter(':first').click();
/*Menu More Button*/ 

/*Effect Overlay*/
$('.effect a').hover( function() {
	
});
