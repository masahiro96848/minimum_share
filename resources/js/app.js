require('./bootstrap');

// $(function () {

//   // フロートヘッダーメニュー
//   var targetHeight = $('.js-float-menu-target').height();
//   $($window).on('scroll', function(){
//     $('.js-float-menu').toggleClass('float-active', $(this).scrollTop() > targetHeight);
//   });

//   // spメニュー
//   $('js-toggle-sp-menu').on('click', function(){
//     $(this).toggleClass('active');
//     $('.js-toggle-sp-menu-target').toggleClass('active');
//   });
// });


$('.p-menu--button').on('click', function() {
  if( $(this).hasClass('active')){
    $(this).removeClass('active');
    $('.p-menu--wrap').addClass('close').removeClass('open');
  }else {
    $(this).addClass('active');
    $('.p-menu--wrap').addClass('open').removeClass('close');
  }
});