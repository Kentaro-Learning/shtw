$(function() {


  // 画像がクリックされた時の処理です。
  $('img.thumbnail').on('click', function() {
    if (!$(this).is('.checked')) {
      // チェックが入っていない画像をクリックした場合、チェックを入れます。
      $(this).addClass('checked');
        if( $this.find( '.disabled_checkbox' ).prop( 'checked' ) ){
            $this.addClass( 'checked' );
        } else {
            $this.removeClass( 'checked' );

        }
    } else {
      // チェックが入っている画像をクリックした場合、チェックを外します。
      $(this).removeClass('checked')
    }
  });
});