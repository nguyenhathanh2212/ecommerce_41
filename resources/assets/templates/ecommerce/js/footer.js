jQuery(document).ready(function() {
    jQuery('.tp-banner').revolution(
    {
        delay:9000,
        startwidth:1170,
        startheight:530,
        hideThumbs:10,
        navigationType:"bullet",                            
        navigationStyle:"preview1",
        hideArrowsOnMobile:"on",
        touchenabled:"on",
        onHoverStop:"on",
        spinner:"spinner4"
    });
});
$(document).ready(function() {
    /* <![CDATA[ */     
    var mega_menu = '0';
    
    /* ]]> */
    var dthen1 = new Date("12/25/16 11:59:00 PM");
    start = "08/04/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if(CountStepper>0)
        ddiff= new Date((dnow1)-(dthen1));
    else
        ddiff = new Date((dthen1)-(dnow1));
        gsecs1 = Math.floor(ddiff.valueOf()/1000);
        var iid1 = "countbox_1";
        CountBack_slider(gsecs1,"countbox_1", 1);
});
$(document).ready(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
    });
});
