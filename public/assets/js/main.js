$(() => {

    // toggle navigation bar
    $('.brand').on('click', () => {
        $('.navigation').slideToggle(500);
    });

    setTimeout(() => {
        $('#app').fadeOut(1500);
        $('body').css({
            overflow:'visible'
        })
    }, 1500);
})
