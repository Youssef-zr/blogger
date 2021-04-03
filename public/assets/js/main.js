$(() => {

    // toggle navigation bar

    $('.brand').on('click', () => {
        $('.navigation').slideToggle(500);
    });

    setTimeout(() => {
        $('#app').fadeOut(700).remove();
        $('body').css({
            overflow:'visible'
        })
    }, 2000);
})