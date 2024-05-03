$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('#l-header').addClass('sticky');
    } else {
        $('#l-header').removeClass('newCstickylass');
    }
});