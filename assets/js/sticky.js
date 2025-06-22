$(document).ready(function(){

    var stickyElement = $(".sticky"),
        stickyClass = "sticky-pin",
        stickyPos = stickyElement.offset().top, //Distance from the top of the window.
        stickyHeight;



    ///Create a negative margin to prevent content 'jumps':
    stickyElement.after('<div class="jumps-prevent"></div>');
    function jumpsPrevent() {
        stickyHeight = stickyElement.innerHeight();
        if($(".sticky").find(".sub-header")){
            let h = parseInt($(".sub-header").innerHeight());
            if(h > 0 ){
                stickyHeight = stickyHeight +   h;
            }

        }
        stickyElement.css({"margin-bottom":"-" + stickyHeight + "px"});
        stickyElement.next().css({"padding-top": + stickyHeight + "px"});
    };
    jumpsPrevent(); //Run.

    //Function trigger:
    $(window).resize(function(){
        jumpsPrevent();
    });

    //Sticker function:
    function stickerFn() {
        var winTop = $(this).scrollTop();
        //Check element position:
        winTop >= stickyPos ?
            stickyElement.addClass(stickyClass):
            stickyElement.removeClass(stickyClass) //Boolean class switcher.
    };
    stickerFn(); //Run.

    //Function trigger:
    $(window).scroll(function(){
        stickerFn();
    });

});