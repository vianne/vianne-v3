$(function(){

  // smooth scroll
  $.localScroll();

  // fix png
  if(window.COMMON.ieV == 'ie6'){
    DD_belatedPNG.fix('ul.pickup li');
  }

  // cookieにより分岐
  /*if($.cookie('nichiren') == 1){
    $('.js-logo, .js-copy').css({'display':'block'});
  }else{
    $('.js-logo').fadeIn(1500);
    $('.js-copy').delay(1500).fadeIn(1500);
  }*/

  //cookie書き込み
  /*$.cookie("nichiren", 1, {
    path: '/',
    expires: 1440
  });*/


})