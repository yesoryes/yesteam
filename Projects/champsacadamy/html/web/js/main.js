// JavaScript Document

$( document ).ready(function() {
/*Index Page*/	

/* For Browser Height*/
	/*var fullHeight = $(window).height();
	$('.home-banner, .normal-home, .more, .another-school, .champs-school, .banner-seps').css ({
		height : fullHeight,
	});*/
	var fullHeight = $(window).height();
	$('.menu').css ({
		height : fullHeight,
	});

/* End Browser Height*/



/*Menu More Button*/
	var more = function() {  
		$('.more a').click(function() {	
		//alert ();  
			$('.menu').animate({right: "0px" }, 1500).css({
				display : 'block',
			});	
			$('body').animate({right: "0"}, 1500); 
			$('.bg, .main-nav ul').slideUp(1500);
			/*$('.more').css ({
				display : 'none',
			});*/
			$('.black-overlay').css({
				display: 'block',
				position: 'absolute',
				'z-index' : '100000'
			});
			
		});		  
		/* Then push them back */	  
		$('.more-close').click(function() {
		   $('.menu').animate({right: "-325px"}, 1500);
		   $('body').animate({right: "0px"  }, 1500); 
		   $('.bg, .main-nav ul').slideDown(1500);
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
	
/*Accordian*/
	(function($, d) {	
		
		$('#horizontal-accordian').liteAccordion({
				onTriggerSlide : function() {
					this.find('figcaption').fadeOut();
				},
				onSlideAnimComplete : function() {
					this.find('figcaption').fadeIn();
				},
				autoPlay : false,
				pauseOnHover : true,
				theme : 'stitch',
				rounded : true,
				enumerateSlides : true,
		})//find('figcaption:first').show();                
		
	})(jQuery, document);
/*End Accordian*/
	
/*Home Page Hover*/	
	//View Hover
	$(".programs p a").hover(function () {
		$(this).addClass("hvr-sweep-to-right");
	});	
	//Read More Hover
	$('.activity div a').hover(function () {
		$(this).addClass('hvr-sweep-to-left');
	})
/*End Home Page Hover*/
	
	
/*Parallex*/
	skrollr.init({
		forceHeight: false,
		smoothScrolling: true,
	});
/*End Parallex*/

/*preload Images*/
	/*function preload(arrayOfImages) {
		$(arrayOfImages).each(function(){
			$('<img/>')[0].src = this;
			// Alternatively you could use:
			// (new Image()).src = this;
		});
	}
	
	// Usage:
		
	preload([
		'img/imageName.jpg',
		'img/anotherOne.jpg',
		'img/blahblahblah.jpg'
	]);*/
/*End Preload images*/

/*End Index Page*/	

  /*  Inner Pages Start */

	/*  Career  Accordion Js*/
    	
	   $('.accordion-container').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('fast');

      //Hide the other panels
      $(".accordion-accontent").not($(this).next()).slideUp('fast');
	 
    }); 
	 
	 
		/*  News and events  Light box  Js*/
	
		$('.lightbox-news').click(function() {
			$('.backdrop-news').animate({'opacity':'0.5'}, 300, 'linear');
			$('.backdrop-news, .box-news').css('display','block')
		}) ; 
		$('.close-box').click(function() {
			close_box()
		}) ;  
		$('.backdrop-news').click(function() {
			close_box()
		});
		
		function close_box() {
			$('.backdrop-news').animate({'opacity':'0'}, 300, 'linear');
			$('.backdrop-news, .box-news').css('display','none')
		}; 
		 
		 
		 /* news and events end */
		 
		  /* Why Champs Start */
		  
		 //Tab for Home IP Whychamps
		  $('#banner_ip_nav a').on('click', function(e){
			e.preventDefault();
		
			if($(this).hasClass('open')) {
			  // do nothing because the link is already open
			} 
			else 
			{
			  var oldcontent = $('#banner_ip_nav a.open').attr('href');
			  var newcontent = $(this).attr('href');
			  
			  $(oldcontent).fadeOut('fast', function(){
				$(newcontent).fadeIn().removeClass('hidden');
				$(oldcontent).addClass('hidden');
			  });      
			  $('#banner_ip_nav a').removeClass('open');
			  $(this).addClass('open');
			}
			
			if($(this).hasClass('active')) {
			  // do nothing because the link is already open
			} 
			else 
			{
			       
			  $('#banner_ip_nav a').removeClass('active');
			  $(this).addClass('active');
			}
		  });
				
		//Tab for Home Inner IP Whychamps
		  $('#whychamps-activities a').on('click', function(e){
			e.preventDefault();
		
			if($(this).hasClass('open')) {
			  // do nothing because the link is already open
			} else {
			  var oldcontent = $('#whychamps-activities a.open').attr('href');
			  var newcontent = $(this).attr('href');
			  
			  $(oldcontent).fadeOut('fast', function(){
				$(newcontent).fadeIn().removeClass('hidden');
				$(oldcontent).addClass('hidden');
			  });      
			  $('#whychamps-activities a').removeClass('open');
			  $(this).addClass('open');
			}
			
			if($(this).hasClass('active')) {
			  // do nothing because the link is already open
			} 
			else 
			{
			       
			  $('#whychamps-activities a').removeClass('active');
			  $(this).addClass('active');
			}
			
		  });	 
		
		
	 
		 
		//Custom Select Box
		;(function( $ ) {

		  // Browser supports HTML5 multiple file?
		  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
		      isIE = /msie/i.test( navigator.userAgent );

		  $.fn.customFile = function() {

		    return this.each(function() {

		      var $file = $(this).addClass('customfile'), // the original file input
		          $wrap = $('<div class="customfile-wrap">'),
				  
		          $input = $('<label>Resume</label> <input type="text" class="customfile-filename" />'),
		          // Button that will be used in non-IE browsers
		          $button = $('<button type="button" class="customfile-upload">Choose file</button>'); 

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
		          $inputs = $wrap.siblings().find('.customfile-filename')
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

		}( jQuery ));

		$('input[type=file]').customFile();


	
});/*End Document Ready*/





