
define(['jquery',
    'slick'
], function($) {
    return function (config, element) {
        console.log('works')
        $(document).ready(function () {
            $(element).slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1
            });
        });

    };
});
