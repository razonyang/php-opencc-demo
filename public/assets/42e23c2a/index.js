$(document).ready(function () {
    convert();
});

function convert() {
    outputEle.val('Converting');
    $.post('/convert', {
        config: $('#config').val(),
        input: $('#input').val(),
        _csrf: $('meta[name="csrf"]').attr('content'),
    }, function (resp) {
        $('#output').val(resp.output);
    }, 'json');
}