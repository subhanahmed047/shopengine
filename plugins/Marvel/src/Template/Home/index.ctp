<?php

$this->start('css');
    echo $this->Html->css(['owl.carousel.css', 'owl.theme.css', 'owl.transition.css']);
$this->end();

$this->start('script');
    echo $this->Html->script(['owl.carousel.js']);
$this->end();

$this->start('slider');
    echo $this->element('slider');
$this->end();
echo $this->element('index/latest-products');
?>


<script>
    $(document).ready(function () {

        $(".slideshow").owlCarousel({
            items: 6,
            autoPlay: 6000,
            singleItem: true,
            navigation: true,
            responsive: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            pagination: true
        });

        $(".carousel").owlCarousel({
            items: 6,
            autoPlay: 3000,
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            pagination: true
        });

        $("#back-top").hide();

        $("#back-top a").click(function (e) {
            e.preventDefault();
            $("body, html").animate({
                scrollTop: 0
            }, 300);
        });

        $(window).scroll(function () {

            var nav = $("#sticky");

            if ($(this).scrollTop() > 145) {
                nav.addClass("fixed-header");
            } else {
                nav.removeClass("fixed-header");
            }

            if ($(this).scrollTop() > 100) {
                $("#back-top").fadeIn();
            } else {
                $("#back-top").fadeOut();
            }
        });

    });

</script>
