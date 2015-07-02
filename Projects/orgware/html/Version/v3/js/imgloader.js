// JavaScript Document
$(window).load( function(){
    /* Preload code goes here */

$.preloadImages = function() {
  for (var i = 0; i < arguments.length; i++) {
    $("<img />").attr("src", arguments[i]);
  }
}

$.preloadImages("img/4way-color.png", "img/menu_option.png", "img/4way-taxi-color.png","img/acclary-color.png","img/asna-color.png","img/banner-link.png","img/banner-link1024.png","img/banner-mob-link.png","img/paradise-color.png","img/product1-hover.png","img/product2-hover.png","img/product3-hover.png","img/product4-hover.png","img/right-nav.png","img/seskhan-link.png","img/product1-1024.png","img/product2-1024.png","img/product3-1024.png","img/product4-1024.png"); 
});