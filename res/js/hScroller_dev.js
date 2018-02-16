

(function ($, w, d, undefined) {

    var HScroller = function (options, ele) {

        var elem = ele;

        var scrollTimer = null, scrollCounter = 0;
        var settings = {};
        
        var prevCol = 0;
        
        var $wrapper;
        if ($(elem).is('div.h-slider-carousal'))
            $wrapper = $(elem);
        else if ($(elem).has('div.h-slider-carousal'))
            $wrapper = $(elem).find('.h-slider-carousal');

        var $container = $wrapper.find('ul.item-carousal');

        var items = $container.children('li');
        
        this.init = function () {

            settings = $.extend(true, {}, $.fn.hScroller.defaults, (typeof options === 'object') ? options : {});
            prevCol = settings.viewPortCols;

            setLayout();

            $($wrapper).on("mouseenter", function () {
                toggle();
            });
            $($wrapper).on("mouseleave", function () {
                toggle();
            });
            $(window).on('resize', function () {
                if ($(window).innerWidth() <= 320)
                    settings.viewPortCols = settings.respViewPortCols.w320;
                else if ($(window).innerWidth() <= 768)
                    settings.viewPortCols = settings.respViewPortCols.w768;
                else if ($(window).innerWidth() <= 992)
                    settings.viewPortCols = settings.respViewPortCols.w992;
                else if ($(window).innerWidth() <= 1220)
                    settings.viewPortCols = settings.respViewPortCols.w1200;
                else
                    settings.viewPortCols = prevCol;
                reset();
            });

            play();
        };

        var setLayout = function () {
            
            if (settings.scrollDirection === 'left')
            {
                $(items[0]).addClass('in-view');
            } else
            {
                $(items[items.length - 1]).addClass('in-view');
            }
            var newIWidth = $($wrapper).innerWidth() / settings.viewPortCols;

            $(items).each(function () {
                $(this).css({
                    minWidth: newIWidth
                });
            });
        };

        this.call = function (func) {

            switch (func)
            {
                case "play":
                    play();
                    break;
                case "pause":
                    pause();
                    break;
                case "toggle":
                    toggle();
                    break;
                case "reset":
                    reset();
                    break;
                case "scrollLeft":
                    scrollLeft();
                    break;
                case "scrollRight":
                    scrollRight();
                    break;
                default:
                    console.log('no such function');
            }
        };

        var reset = function () {
            toggle();
            setLayout();
            $($wrapper).scrollLeft(0);
            toggle();
        };

        var play = function ()
        {

            settings.autoScroll = true;
            scrollTimer =
                    setInterval(function () {
                        (settings.scrollDirection === 'left') ? scrollLeft() : scrollRight();
                    }, settings.autoScrollInterval);
        };
        var pause = function ()
        {
//                var self = this;
            settings.autoScroll = false;
            clearInterval(scrollTimer);
        };
        var toggle = function ()
        {

            if (settings.autoScroll)
            {
                pause();
//                    console.log('pause');
            } else
            {
                play();
//                    console.log('play');
            }
        };
        var scrollLeft = function () {

            var ele = items;
//            console.log(scrollCounter);
            if ($(ele[ele.length - 1]).hasClass('in-view'))
            {
                scrollCounter = 0;

                $(ele).siblings('.in-view').removeClass('in-view');
                for (var i = 0; i < settings.viewPortCols; i++)
                {
                    $(ele[i]).addClass('in-view');
                }
                if (settings.queueScroll)
                {

                    $($wrapper).animate({
                        scrollLeft: 0
                    }, settings.animationDuration);
                }
//                            console.log('left ' + scrollCounter + " 1");
            } else {
                $($wrapper).animate({
                    scrollLeft: $wrapper.scrollLeft() + settings.scrollCols * $(ele).outerWidth()
                }, settings.animationDuration);

                $(ele).siblings('.in-view').removeClass('in-view');
                for (var i = scrollCounter; i < settings.viewPortCols + scrollCounter; i++)
                {
                    $(ele[i]).addClass('in-view');
                }

//                            console.log('left ' + scrollCounter + " 2");
            }
            scrollCounter += settings.scrollCols;
        };
        var scrollRight = function () {  //STILL HAS PROBLEM

            var ele = items;
            if ($(ele[0]).hasClass('in-view'))
            {
                scrollCounter = ele.length - settings.viewPortCols;

                $(ele).siblings('.in-view').removeClass('in-view');
                for (var i = ele.length - 1; i > ele.length - settings.viewPortCols - 1; i--)//check
                {
                    $(ele[i]).addClass('in-view');
                }
                if (settings.queueScroll)
                {

                    $($wrapper).animate({
                        scrollLeft: $($wrapper).scrollLeft() + (ele.length - settings.viewPortCols + 1) * $(ele).outerWidth()
                    }, settings.animationDuration);
                }
//                            console.log('right ' + scrollCounter + " 1");
            } else {
                $($wrapper).animate({
                    scrollLeft: $wrapper.scrollLeft() - settings.scrollCols * $(ele).outerWidth()
                }, settings.animationDuration);

                $(ele).siblings('.in-view').removeClass('in-view');
                for (var i = ele.length - scrollCounter + settings.viewPortCols - 2; i > scrollCounter - settings.viewPortCols + 2; i--)
                {
                    $(ele[i]).addClass('in-view');
                }

//                            console.log('right ' + scrollCounter + " 2");
            }
            scrollCounter -= settings.scrollCols;
        };
        return this;
    };

    $.fn.hScroller = function (options) {

        return this.each(function () {

            var hScroll = new HScroller(options, this);

            hScroll.init();

        });
    };
    $.fn.hScroller.defaults = {
        animationDuration: 500,
        autoScrollInterval: 2000,
        viewPortCols: 6,
        respViewPortCols: {w1200:4, w992: 3, w768: 2, w320: 1},
        scrollDirection: 'left',
        scrollCols: 1,
        queueScroll: true,
        autoScroll: true
    };

}(jQuery, window, document));