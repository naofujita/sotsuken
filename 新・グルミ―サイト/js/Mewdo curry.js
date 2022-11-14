bubbly({
    colorStart: '#ffffff',
    colorStop: '#ffffff',
    blur: 1,
    compose: 'source-over',
    bubbleFunc:() => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
  });