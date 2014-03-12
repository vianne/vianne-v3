$(function(){

  // smooth scroll
  $.localScroll();

  // 背景画像
  if($('#page-home').length()){
    $('body').prepend('<img src="./assets/img/bg-home.jpg" width="100%" height="100%" id="js-homebg">');
  }
  $(function() {
    setSize();
    //リサイズしたら実行
    $(window).resize(function(){
       setSize();
    });
  });

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

// Set Size
function setSize() {
  //画像サイズ指定
  var imgW = 1200;
  var imgH = 1000;
  //ウィンドウサイズ取得
  var winW = $(window).width();
  var winH = $(window).height();
  var scaleW = winW / imgW;
  var scaleH = winH / imgH;
  var fixScale = Math.max(scaleW, scaleH);
  var setW = imgW * fixScale;
  var setH = imgH * fixScale;
  var moveX = Math.floor((winW - setW) / 2);
  var moveY = Math.floor((winH - setH) / 2);

  $('#js-homebg').css({
    'width': setW,
    'height': setH,
    'left' : moveX,
    'top' : moveY
  });
}