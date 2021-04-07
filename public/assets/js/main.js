$(() => {

    // toggle navigation bar
    $('.brand').on('click', () => {
        $('.navigation').slideToggle(500);
    });

    setTimeout(() => {
        $('#app').fadeOut(700);
        $('body').css({
            overflow:'visible'
        })
    }, 700);
})
