'use strict';
console.log('ok');

$(function() {

    var $window = $(window);
    //Efekt paralaksy
    $('section[data-type="background"]').each(function() {
        var $bgobj = $(this);
        $(window).scroll(function() {
            //yPos ma wartość ujemną ponieważ ekran idzie do góry kiedy scrolujemy

            var yPos = -($window.scrollTop()) / $bgobj.data('speed');

            var coords = '50% ' + yPos + 'px';

            $bgobj.css({
                backgroundPosition: coords
            });
        });
    })



    $.getJSON("./baza.json", {
            dataType: 'json'
        })
        .done(function(data) {
            var database = JSON.parse(JSON.stringify(data));
            $.each(database, function(index, element) {


                var li = $('<li>', {
                    class: 'book'
                });
                var h3 = $('<h3>').text('Tytuł: ' + element.tytul);
                var h4 = $('<h4>').text('Autor: ' + element.autor);
                var h5 = $('<h5>').text('Zniżka: ' + element.znizka);

                li.append(h3);
                li.append(h4);
                li.append(h5);

                $('.col-sm-8.myClass').append(li);

            })
        })
})
