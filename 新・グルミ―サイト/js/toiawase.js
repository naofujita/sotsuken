bubbly({
  colorStart: '#ffffff',
  colorStop: '#ffffff',
  blur: 1,
  compose: 'source-over',
  bubbleFunc:() => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
});


$(function(){
  //読み込みが完了したら実行する
  $(window).on('load',function(){
    //ローディングアニメーションをフェードアウト
    $('.loader').delay(600).fadeOut(600);
    //背景色をフェードアウト
    $('.loader-bg').delay(900).fadeOut(800);
});

  //ページの読み込みが完了してなくても5秒後にアニメーションを非表示にする
  setTimeout(function(){
    $('.loader-bg').fadeOut(600);
  },5000);
});