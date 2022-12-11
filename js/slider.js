
  var sliderInterval = null;
  var $slider = $('.slider');
  var index = 0;
  sliderInterval = setInterval(function(){
    ++index;
    if(index >= $slider.children().length){
      index = 0;
    }
    changeSlideTo(index);
  },3000);

  function changeSlideTo(index){
    var $next = $slider.children().eq(index);
    var $current = $slider.children('.active');
    var $prev = $slider.children('.prev');
    if($prev.length == 0){
      $prev = $slider.children().last();
    }

    $next.addClass('active');
    $current.removeClass('active').addClass('prev');
    $prev.removeClass('prev');
    
    $('.pager .active').removeClass('active');
    $('.pager li').eq(index).addClass('active');
  }
  
  $('.pager li').click(function(e){
    e.preventDefault();
    clearInterval(sliderInterval);
    changeSlideTo($(this).data('index'));
  });