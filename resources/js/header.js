$(function(){

  let header = $('#header')

  header_offset = header.offset();
  header_height = header.height();
  
  $(window).scroll(function () {
  
    if($(window).scrollTop() > header_offset.top + header_height) {
  
      header.addClass('header-scroll');
  
    }else {
  
      header.removeClass('header-scroll');
  
    }
  
  });
  
});