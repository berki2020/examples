$(document).ready(function () {
    if ($(".bxslider").length > 0 && $(".bxslider .banner").length > 1) {
        let slider = $(".bxslider").bxSlider({
            auto:true,
            pause:3000,
            onSlideAfter: function () {
                pause:3000,
                slider.startAuto();
            }
        });
    } else {
        $(".bxslider").bxSlider().stopAuto();
    }
});