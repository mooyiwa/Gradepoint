$(document).ready(function() {
    $('.featurette').nivoSlider({
        effect:'fade', //Specify sets like: 'fold,fade,sliceDown'
        slices:7,
        animSpeed:1200, //Slide transition speed
        pauseTime:7000,
        startSlide:2, //Set starting Slide (0 index)
        directionNav:false, //Next & Prev
        directionNavHide:true, //Only show on hover
        controlNav:false, //1,2,3...
        controlNavThumbs:false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav:true, //Use left & right arrows
        pauseOnHover:true, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0.8, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded
    });
});