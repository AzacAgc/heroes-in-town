$('.card-panel').append('<button class="waves-effect btn-flat close right"><i class="material-icons">close</i></button>');

$('body').on('click', '.card-panel .close', function() {
    $(this).parent().fadeOut(300, function() {
        $(this).remove();
    });
});