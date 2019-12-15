/*
    Name: YoutubeVimeoPopUp
    Description: jQuery plugin to display YouTube or Vimeo video in PopUp, responsive and retina, easy to use.
*/

(function ( $ ) {
 
    $.fn.ApVideoPopUp = function(options) {

        var ApVideoPopUpOptions = $.extend({
                autoplay: 1
        }, options );

        $(this).on('click', function (e) {

            var youtubeLink = $(this).attr("href");

            if( youtubeLink.match(/(youtube.com)/) ){
                var split_c = "v=";
                var split_n = 1;
            }

            if( youtubeLink.match(/(youtu.be)/) || youtubeLink.match(/(vimeo.com\/)+[0-9]/) ){
                var split_c = "/";
                var split_n = 3;
            }

            if( youtubeLink.match(/(vimeo.com\/)+[a-zA-Z]/) ){
                var split_c = "/";
                var split_n = 5;
            }

            var getYouTubeVideoID = youtubeLink.split(split_c)[split_n];

            var cleanVideoID = getYouTubeVideoID.replace(/(&)+(.*)/, "");

            if( youtubeLink.match(/(youtu.be)/) || youtubeLink.match(/(youtube.com)/) ){
                var videoEmbedLink = "https://www.youtube.com/embed/"+cleanVideoID+"?autoplay="+ApVideoPopUpOptions.autoplay+"";
            }

            if( youtubeLink.match(/(vimeo.com\/)+[0-9]/) || youtubeLink.match(/(vimeo.com\/)+[a-zA-Z]/) ){
                var videoEmbedLink = "https://player.vimeo.com/video/"+cleanVideoID+"?autoplay="+ApVideoPopUpOptions.autoplay+"";
            }

            $("body").append('<div class="ApVideoPopUp-Wrap ApVideoPopUp-animation"><div class="ApVideoPopUp-Content"><span class="ApVideoPopUp-Close"></span><iframe src="'+videoEmbedLink+'" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div>');

            if( $('.ApVideoPopUp-Wrap').hasClass('ApVideoPopUp-animation') ){
                setTimeout(function() {
                    $('.ApVideoPopUp-Wrap').removeClass("ApVideoPopUp-animation");
                }, 600);
            }

            $(".ApVideoPopUp-Wrap, .ApVideoPopUp-Close").click(function(){
                $(".ApVideoPopUp-Wrap").addClass("ApVideoPopUp-Hide").delay(515).queue(function() { $(this).remove(); });
            });

            e.preventDefault();

        });

        $(document).keyup(function(e) {

            if ( e.keyCode == 27 ){
                $('.ApVideoPopUp-Wrap, .ApVideoPopUp-Close').click();
            }

        });

    };
 
}( jQuery ));