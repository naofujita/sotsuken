bubbly({
    colorStart: '#fff5ee',
    colorStop: '#fff5ee',
    blur: 1,
    compose: 'source-over',
    bubbleFunc:() => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
  });


  $(function () {
    $(window).scroll(function () {
      const windowHeight = $(window).height();
      const scroll = $(window).scrollTop();
  
      $('.element').each(function () {
        const targetPosition = $(this).offset().top;
        if (scroll > targetPosition - windowHeight + 100) {
          $(this).addClass("is-fadein");
        }
      });
    });
  });