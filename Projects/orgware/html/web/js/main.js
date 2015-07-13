 
/*Menu More Button*/
 var more = function() {  
  $('.more, .navbar-toggle').click(function() { 
  //alert ();  
   $('.menu').animate({right: "0px" }, 500).css({
    display : 'block', top: '0',
   }); 
   $('body').animate({right: "0"}, 500); 
   $('.bg, .main-nav ul, .navbar-brand img').slideUp(500);
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
  $('.more-close').click(function() {
     $('.menu').animate({right: "-325px"}, 500);
     $('body').animate({right: "0px"  }, 500); 
     $('.bg, .main-nav ul, .navbar-brand img').slideDown(500);	 
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
	
	
	
	  
	
$(window).load(function()
{
		
	$('#preloader').fadeOut('slow',function(){$(this).remove();}); 
		 /* Preload code goes here */
	$.preloadImages = function()
	  {
			  for (var i = 0; i < arguments.length; i++)
			  {
				$("<img />").attr("src", arguments[i]);
	          }
      }

                $.preloadImages("img/4way-color.png", "img/menu_option.png", "img/4way-taxi-color.png","img/acclary-color.png","img/asna-color.png","img/banner-link.png","img/banner-link1024.png","img/banner-mob-link.png","img/paradise-color.png","img/product1-hover.png","img/product2-hover.png","img/product3-hover.png","img/product4-hover.png","img/right-nav.png","img/seskhan-link.png","img/product1-1024-hover.png","img/product2-1024-hover.png","img/product3-1024-hover.png","img/product4-1024-hover.png", "img/service1-hover.png", "img/service2-hover.png", "img/service3-hover.png", "img/service4-hover.png","img/service5-hover.png", "img/service6-hover.png", "img/service7-hover.png", "img/service8-hover.png", "img/page-top-hover.png", "img/service9-hover.png", "img/service10-hover.png", "img/menu_option.png", "img/product-main.jpg", "img/product-main-1024.jpg", "img/twitter-hover.png", "img/twitter-menu-hover.png", "img/google-hover.png", "img/google-menu-hover.png", "img/facebook-hover.png", "img/facebook-menu-hover.png", "img/linked-hover.png", "img/linked-menu-hover.png",  "img/product1-mob-hover.png", "img/product2-mob-hover.png", "img/product3-mob-hover.png", "img/product4-mob-hover.png"); 
});
 
 // JavaScript Document
 
 
 
 
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
    $('.accordion-toggle').on('click', function(event){
    	event.preventDefault();
    	// create accordion variables
    	var accordion = $(this);
    	var accordionaccontent = $(this).next().slideToggle('fast');;
    	var accordionToggleIcon = $(this).children('.toggle-icon');
		
    	 $(".accordion-accontent").not($(this).next()).slideUp('fast');
    	// toggle accordion link open class
    	accordion.toggleClass("open");
    	// toggle accordion accontent
     
    	// change plus/minus icon
    	if (accordion.hasClass("open")) {
    		accordionToggleIcon.html("<i class='fa fa-minus-circle'></i>");
    	} else {
    		accordionToggleIcon.html("<i class='fa fa-plus-circle'></i>");
    	}
    });
});

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
