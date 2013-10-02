$('#left_photos').carouFredSel({
    auto: false,
    prev: '#prev2',
    next: '#next2',
    mousewheel: true,
    width: $('#carContainer').width(),
    swipe: {
        onMouse: true,
        onTouch: true
    }
});

$(".fancybox-thumb").fancybox({
    prevEffect	: 'none',
    nextEffect	: 'none',
    helpers	: {
        title	: {
            type: 'outside'
        },
        thumbs	: {
            width	: 50,
            height	: 50
        }
    }
});
