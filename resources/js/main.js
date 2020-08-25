// ハンバーガーメニュー
$('.p-menu--button').on('click', function() {
  if( $(this).hasClass('active')){
    $(this).removeClass('active');
    $('.p-menu--wrap').addClass('close').removeClass('open');
  }else {
    $(this).addClass('active');
    $('.p-menu--wrap').addClass('open').removeClass('close');
  }
});


// ログアウト処理
  // document.getElementById('logout').addEventListener('click', function(event) {
  //   event.preventDefault();
  //    document.getElementById('logout-form').submit();
  //  });
  