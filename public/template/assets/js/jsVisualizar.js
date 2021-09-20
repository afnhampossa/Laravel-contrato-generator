$(function() {
    var atual_fs, next_fs, prev_fs;



    $('.next').click(function () {
        atual_fs = $(elem).parent();
        next_fs = $(elem).parent().next();

        atual_fs.hide(800);
        next_fs.show(800);
    });
    $('#formulario input[type=submit]').click(function () {
        return false;
    });
});