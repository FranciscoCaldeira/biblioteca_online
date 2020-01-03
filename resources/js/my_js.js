/**
 * Google Maps
 */
function initMap() {
    var uluru = {lat: 32.6592, lng: -16.9243};
    var map = new google.maps.Map(document.getElementById('map'), {zoom: 4, center: uluru});
    var marker = new google.maps.Marker({position: uluru, map: map});
}

/*
faq
*/
$( document ).ready(function() {
    $('.faq li .question').click(function () {
        $(this).find('.plus-minus-toggle').toggleClass('collapsed');
        $(this).parent().toggleClass('active');
    });
});