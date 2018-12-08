$(window).on('load', function () {
    $('.preloader').addClass('loaded');
})

$(document).ready(function () {
    $('#open--nav').on('click', function () {
        $('.site--nav').addClass('open');
    });
    $('#close--nav').on('click', function () {
        $('.site--nav').removeClass('open');
    });
    $('a:not(a[href*="#"])').on('click', function (event) {
        var thetarget = this.getAttribute('target')
        if (thetarget != "_blank") {
            var thehref = this.getAttribute('href')
            event.preventDefault();
            $('.preloader').removeClass('loaded');
            setTimeout(function () {
                window.location = thehref
            }, 500);
        }
    });

    // Convert SVG IMG's to Inline
    $(function () {
        activate('img[src*=".svg"]');

        function activate(string) {
            $(string).each(function () {
                var $img = $(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                $.get(imgURL, function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');

                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }

                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');

                    // Replace image with new SVG
                    $img.replaceWith($svg);

                }, 'xml');
            });
        }
    });
});